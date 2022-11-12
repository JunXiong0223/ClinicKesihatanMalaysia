<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Staff;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = DB::table('appointments')
                        -> join('users', 'appointments.user_id', '=', 'users.id')
                        -> join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
                        -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                        -> join('time_slots', 'appointments.attend_time', '=', 'time_slots.id')
                        -> select('appointments.*', 'users.name as user_name', 'users.email as user_email', 'clinics.name as clinic_name', 'health_services.ServiceName', 'time_slots.ServiceTime')
                        -> where('appointments.attend_date', '>=' ,date('Y-m-d'))
                        -> orderByRaw('appointments.attend_date ASC', 'time_slots.ServiceTime ASC')
                        -> get();

        return view('admin.appointmentManage', [
            'appointments' => $appointments,
        ]);
    }

    public function store(Request $req)
    {
        $req->validate([
            'clinic_id' => 'required',
            'service_id' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
        ]);

        $appointment = new Appointment();

        $appointment-> user_id = Auth::user()->id;

        $appointment-> clinic_id = $req-> input('clinic_id');

        $appointment-> service_id = $req-> input('service_id');

        $appointment-> attend_date = $req-> input('appointment_date');

        $appointment-> attend_time = $req-> input('appointment_time');

        //Check clinic seleceted for doctor to serve
        $selected_staff;
        $checks = DB::table('appointments')
                -> join('clinic_have_staff', 'appointments.staff_id', '=', 'clinic_have_staff.staff_id')
                -> where('appointments.clinic_id', $req-> input('clinic_id'))
                -> where('appointments.attend_date', $req-> input('appointment_date'))
                -> where('appointments.attend_time', $req-> input('appointment_time'))
                -> pluck('appointments.staff_id')
                -> toArray();
        
        if (count($checks) == 0) {
            $staff = DB::table('clinic_have_staff')
                    -> join('staff', 'clinic_have_staff.staff_id', 'staff.id')
                    -> where('clinic_have_staff.clinic_id', '=', $req-> input('clinic_id'))
                    -> first();

            //check does jave staff for clinic 
            if ($staff == null) {
                return redirect()->back()->with('failed', 'There is not available doctor for selected data and time.');
            }        

            $selected_staff = $staff->id;
        }
        else 
        {
            $staffs = DB::table('clinic_have_staff')
                    -> where('clinic_id', $req-> input('clinic_id'))
                    -> pluck('staff_id')
                    -> toArray();

            $staff = array_diff($staffs, $checks);
            
            reset($staff);
            $key = key($staff);
            //dd($key);

            if ($key == null) {
                return redirect()->back()->with('failed', 'There is not available doctor for selected data and time.');
            }

            $selected_staff = $staff[$key];

        }

        //dd($selected_staff);

        $appointment-> staff_id = $selected_staff;

        $appointment-> attendance = false;

        $appointment-> status = "NA";

        $appointment-> is_deleted = 0;

        $appointment->save();

        return redirect()->back()->with('success', 'Your appointment is successful been make');
    }

    public function viewAppointment()
    {
        $upcoming_appointments = DB::table('appointments')
                        -> join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
                        -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                        -> join('time_slots', 'appointments.attend_time', '=', 'time_slots.id')
                        -> join('staff', 'appointments.staff_id', '=', 'staff.id')
                        -> where('appointments.attendance', 0)
                        -> where('appointments.status', 'NA')
                        -> where('user_id', Auth::user()->id)
                        -> select('appointments.*', 'clinics.name as clinic_name', 'clinics.address', 'health_services.ServiceName', 'time_slots.ServiceTime', 'staff.name')
                        -> orderBy('appointments.attend_date', 'asc')
                        -> take(20)
                        -> get();

        $attend_appointments = DB::table('appointments')
                        -> join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
                        -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                        -> join('time_slots', 'appointments.attend_time', '=', 'time_slots.id')
                        -> join('staff', 'appointments.staff_id', '=', 'staff.id')
                        -> where('appointments.attendance', 1)
                        -> where('user_id', Auth::user()->id)
                        -> select('appointments.*', 'clinics.name as clinic_name', 'clinics.address', 'health_services.ServiceName', 'time_slots.ServiceTime', 'staff.name')
                        -> orderBy('appointments.attend_date', 'desc')
                        -> take(20)
                        -> get();    

        $cancel_appointments = DB::table('appointments')
                        -> join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
                        -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                        -> join('time_slots', 'appointments.attend_time', '=', 'time_slots.id')
                        -> join('staff', 'appointments.staff_id', '=', 'staff.id')
                        -> where('appointments.status', 'Cancel')
                        -> where('user_id', Auth::user()->id)
                        -> select('appointments.*', 'clinics.name as clinic_name', 'clinics.address', 'health_services.ServiceName', 'time_slots.ServiceTime', 'staff.name')
                        -> orderBy('appointments.attend_date', 'desc')
                        -> take(20)
                        -> get();
        //dd($cancel_appointments);
        return view('user.appointment', [
            'upcoming_appointments' => $upcoming_appointments,
            'attend_appointments' => $attend_appointments ,
            'cancel_appointments' => $cancel_appointments,
            'timeslots' => TimeSlot::all(),
        ]);
    }

    public function cancelAppointment(Request $req)
    {
        //dd($req->input('appointmentId'));
        $appointment = Appointment::findOrFail($req->input('appointmentId'));

        $appointment-> status = "Cancel";

        $appointment->save();

        return redirect()->back()->with('success', 'Your appointment has been cancel');
    }

    public function updateAppointment(Request $req)
    {
        $appointment = Appointment::findOrFail($req->input('appointmentId'));

        $appointment-> attend_date = $req-> input('appointment_date');

        $appointment-> attend_time = $req-> input('appointment_time');
        
        $selected_staff;
        $checks = DB::table('appointments')
                -> join('clinic_have_staff', 'appointments.staff_id', '=', 'clinic_have_staff.staff_id')
                -> where('appointments.clinic_id', $appointment-> clinic_id)
                -> where('appointments.attend_date', $req-> input('appointment_date'))
                -> where('appointments.attend_time', $req-> input('appointment_time'))
                -> pluck('appointments.staff_id')
                -> toArray();
        
        if (count($checks) == 0) {
            $staff = DB::table('clinic_have_staff')
                    -> join('staff', 'clinic_have_staff.staff_id', 'staff.id')
                    -> where('clinic_have_staff.clinic_id', '=', $appointment-> clinic_id)
                    -> first();
            
            $selected_staff = $staff->id;
        }
        else 
        {
            $staffs = DB::table('clinic_have_staff')
                    -> where('clinic_id', $appointment-> clinic_id)
                    -> pluck('staff_id')
                    -> toArray();

            $staff = array_diff($staffs, $checks);
            
            reset($staff);
            $key = key($staff);

            $selected_staff = $staff[$key];

        }

        $appointment-> staff_id = $selected_staff;

        if ($appointment-> save()) {
            return redirect()->back()->with('success', 'Your new appointment has been updated');
        }

        return abort(404);
    }
}
