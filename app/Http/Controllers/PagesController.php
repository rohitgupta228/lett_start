<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Affiliate;
use Illuminate\Support\Facades\Route;
use Mail;
use Flash;

class PagesController extends Controller
{
    public function getMetaData()
    {
        $path = storage_path() . "/meta.json";
        $metaData =  json_decode(file_get_contents($path), true);
        $key =  \Request::route()->getName();
        $title = $metaData[$key]['title'];
        $description = $metaData[$key]['description'];
        return [$title, $description];
    }


    public function support()
    {
        $metaData = $this->getMetaData();
        return view('support', compact('metaData'));
    }

    public function terms()
    {
        $metaData = $this->getMetaData();
        return view('terms', compact('metaData'));
    }

    public function affiliate()
    {
        $user = Auth::user();
        $metaData = $this->getMetaData();
        return view('affiliates', compact('metaData', 'user'));
    }

    
    public function aboutUs()
    {
        $metaData = $this->getMetaData();
        return view('about_us', compact('metaData'));
    }

    public function contactUs()
    {
        $metaData = $this->getMetaData();
        return view('contact_us', compact('metaData'));
    }

    public function faq()
    {
        $metaData = $this->getMetaData();
        return view('faq', compact('metaData'));
    }

    public function privacyPolicy()
    {
        $metaData = $this->getMetaData();
        return view('privacy_policy', compact('metaData'));
    }

    public function license()
    {
        $metaData = $this->getMetaData();
        return view('license', compact('metaData'));
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

    public function submitSupport(Request $request)
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
            'validation-themename' => 'required|string|max:255',
            'validation-website' => 'required|string|max:255',
            'validation-message' => 'required|string|max:255',
        ];
        Validator::make($data, $rules, $messages)->validate();
        $firstname = $data['validation-fname'];
        $lastname = $data['validation-lname'];
        $email = $data['validation-email'];
        $themename = $data['validation-themename'];
        $website = $data['validation-website'];
        $message = $data['validation-message'];
        $order_details = $data['validation-order-details'];
        $enquiry = $data['validation-enquiry'];
        $subject = 'support';
        $e_body = "<p style='margin-bottom: 15px'>You have been contacted by <b>$firstname $lastname</b> via email, subject is <b>$subject</b> and email is <b>$email</b>. Please find the below details:-</p>";

        $e_body .= "<p><b>Name</b>: $firstname $lastname</p>";
        $e_body .= "<p><b>Subject</b>: $subject</p>";
        $e_body .= "<p><b>Email</b>: $email</p>";
        $e_body .= "<p><b>Theme Name</b>: $themename</p>";
        $e_body .= "<p><b>Website</b>: $website</p>";
        $e_body .= "<p><b>Order Details</b>: $order_details</p>";
        $e_body .= "<p><b>Enquiry</b>: $enquiry</p>";
        $e_body .= "<p><b>Message</b>: $message</p>";
        $bcc = "support@lettstartdesign.com";
        $body = wordwrap($e_body, 70);

        $body = htmlspecialchars_decode($body);
        Mail::send([], [], function ($message) use ($data, $body) {
            $message->to('support@lettstartdesign.com')
                    ->subject('support')
                    ->setBody($body, 'text/html');
        });
        Flash::success("We have received your query. Our contact person will get back to you soon.");
        return redirect(route('support'));
    }

    public function submitAffiliate(Request $request)
    {
        try {
            $requestData = $request->except(['_token']);
            $user = Auth::user();
            $messages = [
                'required' => 'This field is required',
                'email' => 'Please enter valid email',
            ];
            $rules = [
                'validation-fname' => 'required|string|max:255',
                'validation-lname' => 'required|string|max:255',
                'validation-email' => 'required|string|email|max:255',
                'validation-promote' => 'required|string|max:255',
                'validation-url' => 'required|string|max:255',
            ];
            Validator::make($requestData, $rules, $messages)->validate();
            $data = [
                'user_id' => $user->id,
                'payment_email' => $requestData['validation-email'],
                'promote_us' => $requestData['validation-promote'],
                'website_url' => $requestData['validation-url'],
            ];
            $affiliateData = Affiliate::where('user_id', $user->id)->first();
            if ($affiliateData)
                $affiliateData->update($data);
            else {
                $data['affiliate_code'] = str_random(15);
                Affiliate::create($data);
            }
            $userDetails = $user->userDetails()->update(['first_name' => $requestData['validation-fname'], 'last_name' => $requestData['validation-lname']]);
            Flash::success("Your referal link will be shared on your email once it will be approved by admin");
        } catch (\Exception $exc) {
            if ($exc->getCode() == 23000)
                Flash::danger("This email has already been taken. Please enter unique email");
        }
        return redirect()->back()->withInput($request->all());
    }

}
