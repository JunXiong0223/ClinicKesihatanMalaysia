<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAuthController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function login()
    {
        return view('user.home');
    }

    public function show($user)
    {
        if($user == "")
        {
            abort(404);
        }

        return view('user.profile',[
            'profiles' => Auth::user()
        ]);
    }

    public function appointment()
    {
        $appointments = DB::table('appointments')
                        -> join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
                        -> join('health_services', 'appointments.service_id', '=', 'health_services.id')
                        -> join('time_slots', 'appointments.attend_time', '=', 'time_slots.id')
                        -> where('user_id', Auth::user()->id)
                        -> select('appointments.*', 'clinics.name as clinic_name', 'clinics.address', 'health_services.ServiceName', 'time_slots.ServiceTime')
                        -> get();

        return view('user.appointment', [
            'appointments' =>  $appointments,
        ]);
    }

    public function handleLogin(Request $req)
    {
        if(Auth::attempt(
            $req->only(['email', 'password'])
        ))
        {
            return redirect()->back();
        }

        return redirect()
            ->back()
            ->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()
            ->route('user.home');
    }

    public function store(Request $req)
    {
        $req -> validate([
            'email' => 'required',
            'password' => 'required',
            'name' => 'required'
        ]);


        $user = new user();

        $user->name = strip_tags($req->input('name'));

        $user->email = strip_tags($req->input('email'));
        
        $user->password = strip_tags(Hash::make($req->input('password')));

        $user->save();

        return redirect()->route('user.home');
    }
}