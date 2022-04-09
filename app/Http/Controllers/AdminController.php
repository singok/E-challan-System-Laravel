<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetMail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // display login page
    function login()
    {
        return view('auths.login');
    }

    // administrator check
    function check(Request $request)
    {
        // validate
        $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:5 | max:15'
         ]);

         // check
         $userInfo = Admin::firstWhere('email', $request->email);
         if($userInfo) {
            // password check
            if(Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('userid', $userInfo->id);
                return redirect()->route('admin.dashboard');
            } else {
                return back()->with('failure', "You have entered incorrect password !");
            }
         } else {
             return back()->with('failure', "Couldn't recognized the email !");
         }
    }

    // administrator logout
    function logout()
    {
        if(session()->has('userid')) {
            session()->pull('userid');
            return redirect()->route('adminlogin');
        }
    }

    // input email
    function giveEmail()
    {
        return view('auths.emailInput');
    }

    // get a password reset link
    function getLink(Request $request)
    {
        // validate
        $request->validate([
            'email' => 'required | email'
        ]);

        // email exists or not
        $user = Admin::firstWhere('email', $request->email);

        if($user) {

            // code generate
            $code = Str::random(200);

            if(ResetPassword::firstWhere('email', $user->email)) {
                return back()->with('failure', "We have already sent you a link. Please check your email !");
            } else {
                ResetPassword::create([
                    'email' => $user->email,
                    'code' => $code
                ]);

                Mail::to($request->email)->send(new ResetMail($user->email, $code));
                return back()->with('success', "We have sent you a link. Please check your email !");
            }
        } else {
            return back()->with('failure', "Couldn't recognized the email !");
        }
    }

    // get password_reset form
    function getResetForm(Request $request)
    {

        $request->session()->put('email', $request->email);
        $code = $request->token;

        $info = ResetPassword::where('email', session('email'))->where('code', $code)->get(['code']);

        if($info) {
            return view('auths.updateForm');
        } else {
            echo "<h2>Sorry, We couldn't find your details</h2>";
        }
    }

    // update password
    function update(Request $request)
    {
        // validate
        $request->validate([
            'pass1' => 'required | min:5 | max:15',
            'pass2' => 'required | same:pass1'
        ]);

        // hashing
        $newPass = Hash::make($request['pass1']);

        // update new password
        $user = Admin::firstWhere('email', session('email'));
        $user->password = $newPass;
        $user->save();

        if($user) {
            // Remove tokens from reset_password table
            ResetPassword::where('email', session('email'))->delete();

            // session destroy
            session()->pull('email');

            return back()->with('success', 'You have successfully updated your password ! You can close this window.');
        } else {
            return back()->with('failure', 'Something went wrong !');
        }
    }

    // settings display
    function showSetting()
    {
        $data = DB::table('admin')->where('id', session('userid'))->first();
        return view('pages.dashboard-setting', ['dataInfo' => $data]);
    }

    // settings update
    function updateAdminSetting(Request $request)
    {
        // validate
        $request->validate([
            'adminName' => 'required',
            'adminEmail' => 'required | email',
            'password1' => 'required',
            'password2' => 'required | same:password1'
        ]);

        // update detail
        $data = Admin::where('id', session('userid'))->first();
        $data->fullname = $request->adminName;
        $data->email = $request->adminEmail;
        $data->password = Hash::make($request->password1);
        $feedback = $data->save();

        if($feedback) {
            return back()->with('success', 'Details has been updated successfully !');
        } else {
            return back()->with('success', "Couldn't be able to update details !");
        }
    }
}
