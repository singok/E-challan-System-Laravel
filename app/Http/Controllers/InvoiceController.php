<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    // display invoice details
    function displayInvoice(Request $request)
    {
        $data = DB::table('challan')->where('driving_license', $request->driving_license)->get();
        
        return view('front.invoice');
    }
}
