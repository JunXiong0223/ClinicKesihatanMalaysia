<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Staff;
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
                        -> select('appointments.*', 'users.name as user_name', 'clinics.name as clinic_name', 'health_services.ServiceName', 'time_slots.ServiceTime')
                        -> orderByRaw('appointments.attend_date ASC')
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
}
