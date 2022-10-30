<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailer;

class MailerController extends Controller
{
    // =============== [ Email ] ===================
    public function registerSuccess($req) {
        $data = [
            'subject' => 'Success Register an Account',
            'user' => strip_tags($req->input('name')),
            'body' => 'You have successful register an accout.',
        ];
        //dd($req);
        try {
            Mail::to(strip_tags($req->input('email')), strip_tags($req->input('name')))->send(new Mailer($data));
            return redirect()->back()->with('succes', 'Mail has send');
            
        } catch (Exception $ex) {
            return redirect()->back()->with('failed', 'Mail has send fail');
        }
    }
 
 
    // ========== [ Compose Email ] ================
    public function composeEmail(Request $request) {
        $data = [
            'subject' => 'Send Mail',
            'body' => 'Hi there, testing send mail',
        ];
        //dd($data);
        try {
            Mail::to('jackjunexing@gmail.com', 'JX')->send(new Mailer($data));
            return redirect()->back()->with('succes', 'Mail has send');
            
        } catch (Exception $ex) {
            return redirect()->back()->with('failed', 'Mail has send fail');
        }
    }
}
