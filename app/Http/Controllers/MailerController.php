<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailer;
use Illuminate\Support\Facades\DB;

class MailerController extends Controller
{
    // =============== [ Email ] ===================
    public function registerSuccess($req) {
        $data = [
            'subject' => 'Success Register an Account',
            'user' => strip_tags($req->input('name')),
            'body' => 'You have successful register an accout.',
        ];
        
        try {
            Mail::to(strip_tags($req->input('email')), strip_tags($req->input('name')))->send(new Mailer($data));
            return redirect()->back()->with('success', 'Mail has send');
            
        } catch (Exception $ex) {
            return redirect()->back()->with('failed', 'Mail has send fail');
        }
    }
 
 
    // ========== [ Compose Email ] ================
    public function composeEmail(Request $req) {
        $data = [
            'subject' => strip_tags($req->input('subject')),
            'user' => strip_tags($req->input('userName')),
            'body' => strip_tags($req->input('content')),
        ];
        //dd(strip_tags($req->input('userName')));
        try {
            Mail::to(strip_tags($req->input('userEmail')), strip_tags($req->input('userName')))->send(new Mailer($data));
            return redirect()->back()->with('success', 'Mail has send');
            
        } catch (Exception $ex) {
            return redirect()->back()->with('failed', 'Mail has send fail');
        }
    }

    public function reminder()
    {
        $date = date('Y-m-d', strtotime(' +2 day'));

        $emails = DB::table('appointments')
                -> join('users', 'appointments.user_id', '=', 'users.id')
                -> where('appointments.attend_date', '=', $date)
                -> select('users.email', 'users.name')
                -> get();

        //dd($emails);   
        
        if ($emails != null) {
            foreach ($emails as $email ) {

                $data = [
                    'subject' => 'Reminder to Attend your Health Care Service at '.$date,
                    'user' => $email->name,
                    'body' => 'Your appointment of health care at '.$date,
                ];

                Mail::to($email->email, $email->name)->send(new Mailer($data));
                //dd($email->email);
            }
        }

        return redirect()->back();
        //dd(date('Y-m-d', strtotime(' +2 day')));
    }
}
