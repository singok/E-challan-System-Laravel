<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challan;
use Illuminate\Support\Facades\DB;

class ChallanController extends Controller
{
    // display challan page
    function showChallan(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search == "") {
            $data = DB::table('challan')->select('driving_license', 'fname','mname','lname','address','province','phone')->distinct('driving_license')->SimplePaginate(5);
        } else {
            $data = Challan::where('driving_license', 'LIKE', "%$search%")->orwhere('fname', 'LIKE', "%$search%")->orwhere('phone', 'LIKE', "%$search%")->SimplePaginate(5);
        }

        return view('pages.dashboard-challan', ['dataInfo' => $data]);
    }

    // delete challan details
    function deleteChallan($license)
    {
        $feedback = DB::table('challan')->where('driving_license', $license)->delete();

        if($feedback) {
            return back()->with('success', 'Challan deleted successfully !');
        } else {
            return back()->with('failure', "Couldn't able to delete challan detail.");
        }
    }
}
