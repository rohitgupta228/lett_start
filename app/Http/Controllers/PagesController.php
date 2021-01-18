<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

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

}
