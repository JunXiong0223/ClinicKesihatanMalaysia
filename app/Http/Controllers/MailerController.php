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
}
