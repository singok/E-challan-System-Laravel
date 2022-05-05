<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PaymentNotification;
use App\Models\Admin;

use Twilio\Rest\Client;
use Carbon\Carbon;

class PaymentController extends Controller
{
    // payment page display
    function displayPayment()
    {
        return view('front.payment');
    }

    // mark notifications as read
    function markRead()
    {
        $user = Admin::find(1);
        $user->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    // Make payment and send notifications to (Admin and User)
    function paymentMake(Request $request)
    {
        // validate
        $request->validate([
            'invoiceID' => 'required',
            'drivingLicense' => 'required',
            'phone' => 'required | max:10',
            'remarks' => 'required',
            'cardNumber' => 'required | max:16',
            'expiryDate' => 'required',
            'cvvCode' => 'required',
            'fullName' => 'required',
            'fineAmount' => 'required | min:3'
        ]);

        $name = $request->fullName;
        $license = $request->drivingLicense;
        $amount = $request->fineAmount;
        $remarks = $request->remarks;
        $phone = $request->phone;
        try {

            // send SMS to user
            $client = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
            $client->messages->create('+977'.$phone, [
                'from' => env('TWILIO_FROM'),
                'body' => 'Dear '.$name.' (License No.'.$license.'). Your Account has been debited by NPR '.$amount.' on '.Carbon::now()->format('d-M-Y').', Remarks: '.$remarks.'. E-CHALLAN'
            ]);

            // send notification to Administrator
            Admin::find(1)->notify(new PaymentNotification($name, $license, $amount));
            return back()->with('success', "Thank you for your successful payment !");

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
