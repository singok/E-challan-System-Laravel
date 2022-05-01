<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class InvoiceController extends Controller
{
    // download invoice PDF
    function generatePDF(Request $request)
    {
        $header = $data = DB::table('challan')->select('fname','mname','lname','gender','address','province','district','email','phone','occupation','driving_license',)->where('driving_license', $request->driving_license)->first();
        $data = DB::table('challan')->select('health_condition','disability','model','category','engine_no','color','power','passenger_no','place','time','police_brit','fine_reason','fine_amount','traffic_name','created_at')->where('driving_license', $request->driving_license)->get();
        
        $total = 0;
        foreach($data as $val) {
            $total = $total + (int) $val->fine_amount;
        }

        // pdf filename
        $filename = $header->fname.$header->mname.$header->lname.'_'.$header->driving_license.'.pdf';
        
        $pdf = PDF::loadView('front.invoice', ['heading' => $header, 'dataInfo' => $data, 'total_amount' => $total]);
         
        return $pdf->download($filename);
        
    }
}
