<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Staff;

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
        
        $pies = DB::table('appointments')
                        -> join('health_services', 'appointments.service_id', '=', 'health_services.id') 
                        -> select('health_services.ServiceName', DB::raw('count(*) as val'))
                        -> where('appointments.staff_id', '=' ,Auth::guard('staff')->user()->id)
                        -> where('appointments.attend_date', '=',date('Y-m-d'))
                        -> groupBy('health_services.id')
                        -> get();
        //dd( $cancel);

        return view('staff.home',[
            'appointments' => $appointments,
            'attendance' =>$attendance,
            'cancel' => $cancel,
            'pies' => $pies
        ]);
    }

    public function login()
    {
        return view('staff.login');
    }

    public function resetpassword(Request $req)
    {
        $staff = Staff::findOrFail(Auth::guard('staff')->user()->id);
        //dd($staff);

        if ($req->input('password') != $req->input('re-password')) {
            return redirect()->back()->with('failed', 'Password not match');
        }
        
        $staff->password = Hash::make($req->input('password'));

        $staff->save();

        return redirect()->back()->with('success', 'Password has successful update');

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
