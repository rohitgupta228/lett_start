<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;
use Flash;

class PagesController extends Controller
{

    public function support()
    {
        return view('support');
    }

    public function terms()
    {
        return view('terms');
    }

    public function contactUs()
    {
        return view('contact_us');
    }

    public function faq()
    {
        return view('faq');
    }

    public function privacyPolicy()
    {
        return view('privacy_policy');
    }

    public function license()
    {
        return view('license');
    }

    public function submitContactUs(Request $request)
    {
        $data = $request->except(['_token']);
        $messages = [
            'required' => 'This field is required',
            'email' => 'Please enter valid email',
        ];
        $rules = [
            'validation-fname' => 'required|string|max:255',
            'validation-lname' => 'required|string|max:255',
            'validation-email' => 'required|string|email|max:255',
            'validation-comments' => 'required|string|max:255',
        ];
        Validator::make($data, $rules, $messages)->validate();
        $firstname = $data['validation-fname'];
        $lastname = $data['validation-lname'];
        $email = $data['validation-email'];
        $subject = $data['validation-subject'];
        $comments = $data['validation-comments'];
        $e_body = "<p style='margin-bottom: 15px'>You have been contacted by <b>$firstname $lastname</b> via email, subject is <b>$subject</b> and email is <b>$email</b>. Please find the below details:-</p>";

        $e_body .= "<p><b>Name</b>: $firstname $lastname</p>";
        $e_body .= "<p><b>Subject</b>: $subject</p>";
        $e_body .= "<p><b>Email</b>: $email</p>";
        $e_body .= "<p><b>Message</b>: $comments</p>";

        $bcc = "";
        $body = wordwrap($e_body, 70);
        Mail::send([], [], function ($message) use ($data, $body) {
            $message->to('info@lettstartdesign.com')
                    ->subject($data['validation-subject'])
                    ->setBody($body, 'text/html');
        });
        Flash::success("We have received your query. Our contact person will get back to you soon.");
        return redirect(route('contact'));
    }

}
