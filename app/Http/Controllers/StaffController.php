<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Staff;
use App\Models\Clinic;
use App\Models\Appointment;
use App\Models\ClinicHaveStaff;
use App\Models\HealthNote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        return view('admin.accountManage',[
            'clinics' => Clinic::all(),
        ]);
    }

    public function store(Request $req)
    {
        $req->validate([
            'staffName' => 'required',
            'staffEmail' => 'required',
            'staffPassword' => 'required'
        ]);

        $staff = new Staff();
        $staff-> name = $req->input('staffName');
        $staff-> email = $req->input('staffEmail');
        $staff-> password = Hash::make($req->input('staffPassword'));

        $staff->save();

        $staff->refresh();

        $staff_id = DB::table('staff')
                    -> where('email', $req->input('staffEmail'))
                    -> select('id')
                    -> get(1);
        
        foreach($staff_id as $x)
        {
            $staff_id = $x->id;
        }

        $clinic_staff = new ClinicHaveStaff();
        $clinic_staff->staff_id = $staff_id;
        $clinic_staff->clinic_id = $req->input('clinic_id');
        $clinic_staff->save();

        return redirect()->route('admin.staffList');
    }

    public function staffList()
    {
        $staffs = DB::table('clinic_have_staff')
                -> join('staff', 'clinic_have_staff.staff_id', 'staff.id')
                -> join('clinics', 'clinic_have_staff.clinic_id', 'clinics.id')
                -> select('clinics.name as clinic_name', 'staff.*')
                -> get();

        return view('admin.accountList', [
            'staffs' => $staffs,
            'clinics' => Clinic::all()
        ]);
    }

    public function schedule()
    {
        //dd(Auth::guard('staff')->user()->id);

        //dd(Auth::user());

        $appointments = DB::table('appointments')
                        -> join('users', 'appointments.user_id', '=', 'users.id')
                        -> join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
                        -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                        -> join('time_slots', 'appointments.attend_time', '=', 'time_slots.id')
                        -> where('appointments.staff_id', '=' ,Auth::guard('staff')->user()->id)
                        -> where('appointments.attend_date', '=' ,date('Y-m-d'))
                        -> select('appointments.*', 'users.name as user_name', 'users.id as user_id', 'clinics.name as clinic_name', 'health_services.ServiceName', 'time_slots.ServiceTime')
                        -> orderByRaw('appointments.attend_date ASC')
                        -> get();
        
        //dd($appointments);

        return view('staff.appointmentManage', [
            'appointments' => $appointments,
            'notes' => null,
        ]);
    }

    public function update(Request $req)
    {
        $appointment = Appointment::findOrFail($req->input('appointment_id'));

        if ($req->input('attend') != null) {
            $appointment->attendance = $req->input('attend');
        }
        
        if ($req->input('status') != null) {
            $appointment->status = $req->input('status');
        }
        
        $appointment->save();

        //update the user health note
        $note = new HealthNote();

        if ($req->input('note') != null) {
            $note->user_id = $appointment->user_id;
            $note->staff_id = Auth::guard('staff')->user()->id;
            $note->appointment_id = $req->input('appointment_id');
            $note->note = $req->input('note');
            $note->is_deleted = 0;

            $note->save();
        }
        
        return redirect()->back();
    }

    public function staffUpdate(Request $req)
    {
        //dd(Staff::findOrFail($req->input('staff_id')));
        $staff = Staff::findOrFail($req->input('staff_id'));
        $clinic_staff = DB::table('clinic_have_staff')
                        -> where('staff_id', '=', $req->input('staff_id'))
                        -> update(['clinic_id' => $req->input('ClinicUpdate')]);

        // Check input valid
        if($req->input('NameUpdate') != null)
        {
            $staff->name = $req->input('NameUpdate');
        }
        
        if($staff->save() && $clinic_staff == 1)
        {
            return redirect()->back();
        }

        return abort(404);
    }

    public function health_note($id)
    {
        //dd($id);

        $user = Appointment::findOrFail($id);

        //dd($user->user_id);

        //$note = HealthNote::where('user_id', $user->user_id)->get();

        $note = DB::table('health_notes')
                -> join('users', 'health_notes.user_id', '=', 'users.id')
                -> join('staff', 'health_notes.staff_id', '=', 'staff.id')
                -> join('appointments', 'health_notes.appointment_id', '=', 'appointments.id')
                -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                -> join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
                -> where('health_notes.user_id', $user->user_id)
                -> select('health_notes.note as note', 'users.name as user', 'staff.name as staff', 'clinics.name as clinic', 'appointments.attend_date', 'health_services.ServiceName')
                -> get();

        //dd($note);

        // return view('staff.appointmentHealthNote', [
        //     'notes' => $note,
        // ]);

        return redirect()->back()->with('notes', $note);
    }

    public function info($id)
    {
        $user = Appointment::findOrFail($id);

        //dd($user->user_id);

        $infos = User::where('id', $user->user_id)->get();
        

        //dd($note);

        return redirect()->back()->with(['infos' => $infos]);
    }
}
