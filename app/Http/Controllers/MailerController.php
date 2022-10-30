<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailer;

class MailerController extends Controller
{
    // =============== [ Email ] ===================
    public function email() {
        return view("email");
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
