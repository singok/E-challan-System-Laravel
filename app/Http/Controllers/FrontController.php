<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TrafficRules;

class FrontController extends Controller
{
    // display rule page
    function rulePage() 
    {
        $data = DB::table('trafficrules')->select('rule_no','rule_description')->SimplePaginate(5);
        return view('front.rules', ['dataInfo' => $data]);
    }

    // display verification page
    function verificationPage()
    {
        return view('front.verification');
    }

    // display traffic login page
    function trafficLogin()
    {
        return view('front.traffic-login');
    }

    // display admin login page
    function adminLogin()
    {
        return view('front.admin-login');
    }

    // display admin forget page
    function adminForget()
    {
        return view('front.admin-forgetpassword');
    }

    // display traffic forget page
    function trafficForget()
    {
        return view('front.traffic-forgetpassword');
    }
}
