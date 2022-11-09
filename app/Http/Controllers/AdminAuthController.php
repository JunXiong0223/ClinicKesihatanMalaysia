<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use App\Models\Staff;
use App\Models\Clinic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function index()
    {
        $countUser = User::all()->count();
        $countStaff = Staff::all()->count();
        $countClinic = Clinic::all()->count();
        $appointment = DB::table('appointments')
                        -> where('appointments.attend_date', '=' ,date('Y-m-d'))
                        -> count();

        $attendance = DB::table('appointments')
                        -> where('appointments.attend_date', '=' ,date('Y-m-d'))
                        -> where('appointments.attendance', '=', 1)
                        -> count();

        $cancel = DB::table('appointments')
                        -> where('appointments.attend_date', '=' ,date('Y-m-d'))
                        -> where('appointments.status', '=', 'Cancel')
                        -> count();                
                        
        $pies = DB::table('appointments')
                -> join('health_services', 'appointments.service_id', '=', 'health_services.id') 
                -> select('health_services.ServiceName', DB::raw('count(*) as val'))
                -> whereRaw('MONTH(appointments.attend_date) =?' ,date('m') - 1)
                -> groupBy('health_services.id')
                -> get();
                // $month = DB::table('appointments')
                // -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                // -> whereRaw('MONTH(appointments.attend_date) =?' ,date('m') - 1)
                // -> count(); 

        $lines = DB::table('appointments')
                -> join('health_services', 'appointments.service_id', '=', 'health_services.id') 
                -> select('health_services.ServiceName', DB::raw('count(*) as val'))
                //-> whereRaw('MONTH(appointments.attend_date) =?' ,date('m') - 1)
                -> whereRaw('MONTH(appointments.attend_date) =?' ,date('m'))
                -> groupBy('health_services.id')
                -> get();        
                
        //dd($line);
        return view('admin.home',[
            'user' => $countUser,
            'staff' => $countStaff,
            'clinic' => $countClinic,
            'appointment' => $appointment,
            'attendance' => $attendance,
            'cancel' => $cancel,
            'pies' => $pies,
            'lines' => $lines
        ]);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::guard('admin')
               ->attempt($req->only(['email', 'password'])))
        {
            return redirect()
                ->route('admin.home');
        }

        return redirect()
            ->back()
            ->with('error', 'Invalid Credentials');
    }

    public function resetpassword(Request $req)
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        //dd($admin);

        if ($req->input('password') != $req->input('re-password')) {
            return redirect()->back()->with('failed', 'Password not match');
        }
        
        $admin->password = Hash::make($req->input('password'));

        $admin->save();

        return redirect()->back()->with('success', 'Password has successful update');

    }

    public function logout()
    {
        Auth::guard('admin')
            ->logout();

        return redirect()
            ->route('admin.login');
    }
}
