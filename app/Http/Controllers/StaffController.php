<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;
use App\Models\Appointment;
use App\Models\ClinicHaveStaff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        return view('admin.accountManage');
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
        $clinic_staff->save();

        return redirect()->route('admin.staffList');
    }

    public function staffList()
    {
        return view('admin.accountList', ['staffs' => Staff::all()]);
    }

    public function schedule()
    {
        //dd(Auth::guard('staff')->user()->id);

        //dd(Auth::user());

        $appointments = DB::table('appointments')
                        -> join('users', 'appointments.staff_id', '=', 'users.id')
                        -> join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
                        -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                        -> join('time_slots', 'appointments.attend_time', '=', 'time_slots.id')
                        -> where('appointments.staff_id', Auth::guard('staff')->user()->id)
                        -> select('appointments.*', 'users.name as user_name', 'users.id as user_id', 'clinics.name as clinic_name', 'health_services.ServiceName', 'time_slots.ServiceTime')
                        -> orderByRaw('appointments.attend_date ASC')
                        -> get();

        return view('staff.appointmentManage', [
            'appointments' => $appointments,
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

        return redirect()->back();
    }

}
