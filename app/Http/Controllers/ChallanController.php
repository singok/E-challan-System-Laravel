<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ChallanController extends Controller
{
    // display challan page
    function showChallan(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search == "") {
            $data = DB::table('challan')->select('driving_license', 'full_name', 'contact_no', 'file')->SimplePaginate(5);
        } else {
            $data = Challan::where('driving_license', 'LIKE', "%$search%")->orwhere('full_name', 'LIKE', "%$search%")->orwhere('contact_no', 'LIKE', "%$search%")->SimplePaginate(5);
        }

        return view('pages.dashboard-challan', ['dataInfo' => $data]);
    }

    // delete challan details
    function deleteChallan($license)
    {
        $data = DB::table('challan')->where('driving_license', $license)->first();

        $filepath = public_path('echallans').'/'.$data->file;

        // delete file and details from database
        File::delete($filepath);
        $feedback = DB::table('challan')->where('driving_license', $license)->delete();

        if($feedback) {
            return back()->with('success', 'Challan deleted successfully !');
        } else {
            return back()->with('failure', "Couldn't able to delete challan detail.");
        }
    }
}
