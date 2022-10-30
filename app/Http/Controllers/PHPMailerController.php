<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerController extends Controller
{
    // =============== [ Email ] ===================
    public function email() {
        return view("email");
    }
 
 
    // ========== [ Compose Email ] ================
    public function composeEmail(Request $request) {
        require base_path("vendor/autoload.php");

        //dd(require base_path("vendor/autoload.php"));
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
 
        try {
 
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP(true);
            $mail->Host = "smtp.gmail.com";             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = "enterprisewebdev1640@gmail.com";   //  sender username
            $mail->Password = "upedmrklavtclayf";       // sender password
            $mail->SMTPSecure = "tls";                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465
            
            $mail->isHTML(true);                // Set email content format to HTML
            // $mail->setFrom('sender@example.com', 'SenderName');
            // $mail->addAddress($request->emailRecipient);
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);
 
            // $mail->addReplyTo('sender@example.com', 'SenderReplyName');
 
            // if(isset($_FILES['emailAttachments'])) {
            //     for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
            //         $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
            //     }
            // }
            $mail->AddAddress("jackjunexing@gmail.com", "JX"); //receive user email , user name
            $mail->SetFrom("HeathCareCentre@gmail.com", "HealthCareCentre"); // set sender email
            $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer send Jun Xiong for FYP";
            $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class send Jun Xiong.</b>";
            
 
            //$mail->Subject = $request->emailSubject;
            //$mail->Body    = $request->emailBody;
            $mail->Body    = $content;
            //$mail->MsgHTML($content); 

            
 
            // $mail->AltBody = plain text version of email body;
            
            if( !$mail->send() ) {
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
            
            else {
                return back()->with("success", "Email has been sent.");
            }
 
        } catch (Exception $e) {
             return back()->with('error','Message could not be sent.');
        }
    }
}
