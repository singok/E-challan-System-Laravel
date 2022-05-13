<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contactus;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // display page
    function displayPage()
    {
        return view('front.contact');
    }

    // contact submit
    function submitDetails(Request $request)
    {
        // validate
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | max:10',
            'message' => 'required'
        ]);

        
        // email exists or not
        $user = Admin::select('email')->first();

        if($user) {

            Mail::to($user->email)->send(new Contactus($request->name, $request->email, $request->phone, $request->message));
            return back()->with('success', "We have sent you a link. Please check your email !");
            
        } else {
            return back()->with('failure', "Couldn't send the email !");
        }
    }
}
