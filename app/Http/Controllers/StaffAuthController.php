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
                        -> where('appointments.staff_id', '=' ,Auth::guard('staff')->user()->id)
                        -> where('appointments.attend_date', '=' ,date('Y-m-d'))
                        -> count();

        $attendance = DB::table('appointments')
                        -> where('appointments.staff_id', '=' ,Auth::guard('staff')->user()->id)
                        -> where('appointments.attend_date', '=' ,date('Y-m-d'))
                        -> where('appointments.attendance', '=', 1)
                        -> count(); 
        
        $cancel = DB::table('appointments')
                        -> where('appointments.staff_id', '=' ,Auth::guard('staff')->user()->id)
                        -> where('appointments.attend_date', '=' ,date('Y-m-d'))
                        -> where('appointments.status', '=', 'Cancel')
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
