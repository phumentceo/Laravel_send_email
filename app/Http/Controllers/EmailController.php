<?php

namespace App\Http\Controllers;

use App\Mail\SeedEmail;
use App\Models\Subs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function index(){
        return view('contanct');
    }
    public function sendEmail(Request $request){
        //save to db
        $subs = new Subs();
        $subs->user_id = 1;
        $subs->email = $request->email;
        $subs->save();

        //send email
        // $toEmail = $request->email;
        $subject = 'Email Subscription Confirmation';
        // $message = 'Thank you for subscribing to our newsletter. You will receive updates as soon as we post new articles.';

        // $send = Mail::to($toEmail)->send(new SeedEmail($message,$subject));

        $mailData = [
            'subject' => "Email Subscription Confirmation",
            'subs' => $subs,
        ];




        $send = Mail::to($subs->email)->send(new SeedEmail($mailData));


        return back()->with('success','Subsbrict successful.');


    }
}
