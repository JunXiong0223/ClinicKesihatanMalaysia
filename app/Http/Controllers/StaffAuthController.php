<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StaffAuthController extends Controller
{
    public function index()
    {
        $appointments = DB::table('appointments')
                        -> join('users', 'appointments.user_id', '=', 'users.id')
                        -> join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
                        -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                        -> join('time_slots', 'appointments.attend_time', '=', 'time_slots.id')
                        -> where('appointments.staff_id', '=' ,Auth::guard('staff')->user()->id)
                        -> select('appointments.*', 'users.name as user_name', 'users.id as user_id', 'clinics.name as clinic_name', 'health_services.ServiceName', 'time_slots.ServiceTime')
                        -> orderByRaw('appointments.attend_date ASC')
                        -> count();

        $attendance = DB::table('appointments')
                        -> join('users', 'appointments.user_id', '=', 'users.id')
                        -> join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
                        -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                        -> join('time_slots', 'appointments.attend_time', '=', 'time_slots.id')
                        -> where('appointments.staff_id', '=' ,Auth::guard('staff')->user()->id)
                        -> where('appointments.attendance', '=', 'true')
                        -> select('appointments.*', 'users.name as user_name', 'users.id as user_id', 'clinics.name as clinic_name', 'health_services.ServiceName', 'time_slots.ServiceTime')
                        -> orderByRaw('appointments.attend_date ASC')
                        -> count(); 
        
        $cancel = DB::table('appointments')
                        -> join('users', 'appointments.user_id', '=', 'users.id')
                        -> join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
                        -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                        -> join('time_slots', 'appointments.attend_time', '=', 'time_slots.id')
                        -> where('appointments.staff_id', '=' ,Auth::guard('staff')->user()->id)
                        -> where('appointments.status', '=', 'Cancel')
                        -> select('appointments.*', 'users.name as user_name', 'users.id as user_id', 'clinics.name as clinic_name', 'health_services.ServiceName', 'time_slots.ServiceTime')
                        -> orderByRaw('appointments.attend_date ASC')
                        -> count(); 
                    
        //dd( $cancel);

        return view('staff.home',[
            'appointments' => $appointments,
            'attendance' =>$attendance,
            'cancel' => $cancel
        ]);
    }

    public function login()
    {
        return view('staff.login');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::guard('staff')
               ->attempt($req->only(['email', 'password'])))
        {
            return redirect()
                ->route('staff.home');
        }

        return redirect()
            ->back()
            ->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('staff')
            ->logout();

        return redirect()
            ->route('staff.login');
    }
}
