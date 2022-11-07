<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MailerController;

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

        if ($user->save()) {
            (new MailerController)->registerSuccess($req);
        }

        return redirect()->route('user.home');
    }

    public function resetpassword(Request $req)
    {
        $user = User::findOrFail(Auth::user()->id);
        //dd($user);

        if ($req->input('newpassword') != $req->input('repassword')) {
            return redirect()->back()->with('failed', 'Password not match');
        }
        
        $user->password = Hash::make($req->input('newpassword'));

        $user->save();

        return redirect()->route('user.home')->with('success', 'Password has successful update');

    }

}
