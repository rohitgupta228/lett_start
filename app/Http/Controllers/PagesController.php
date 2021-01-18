<?php

namespace App\Http\Controllers;


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

}
