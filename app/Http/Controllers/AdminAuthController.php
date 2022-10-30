<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
                        
        //dd($attend_date);
        return view('admin.home',[
            'user' => $countUser,
            'staff' => $countStaff,
            'clinic' => $countClinic,
            'appointment' => $appointment,
            'attendance' => $attendance,
            'cancel' => $cancel

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

    public function logout()
    {
        Auth::guard('admin')
            ->logout();

        return redirect()
            ->route('admin.login');
    }
}
