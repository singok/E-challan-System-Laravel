<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TrafficRules;
use App\Models\TrafficPolice;
use Illuminate\Support\Facades\File;

class TrashController extends Controller
{
    // display trash
    function displayTrashbin(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search == "") {
            $dataRules = TrafficRules::onlyTrashed()->SimplePaginate(5);
            $dataPolice = TrafficPolice::onlyTrashed()->SimplePaginate(5);
        } else {
            $dataRules = TrafficRules::onlyTrashed()->where('rule_no', 'LIKE', "$search%")->orwhere('rule_description', 'LIKE', "%$search%")->orwhere('penalty_point', 'LIKE', "$search%")->SimplePaginate(5);
            $dataPolice = TrafficPolice::onlyTrashed()->where('firstname', 'LIKE', "%$search%")->orwhere('lastname', 'LIKE', "%$search%")->orwhere('gender', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->orwhere('state', 'LIKE', "%$search%")->orwhere('city', 'LIKE', "%$search%")->SimplePaginate(5);
        }

        return view('pages.dashboard-trash', ['dataInfo' => $dataRules, 'dataPolice' => $dataPolice]);
    }

    // delete rule permanently
    function ruleDelete($id)
    {
        $feedback = TrafficRules::where('id', $id)->forceDelete();
        if($feedback) {
            return back()->with('success', "Rule has been deleted successfully.");
        } else {
            return back()->with('failure', "Couldn't able to delete data.");
        }
    }

    // restore rules
    function restoreRules($id)
    {
        $feedback = TrafficRules::where('id', $id)->restore();
        if($feedback) {
            return back()->with('success', "Rule has been restored successfully.");
        } else {
            return back()->with('failure', "Couldn't able to restore data.");
        }
    }

    // delete police detail permanently
    function policeDelete($id)
    {
        $getInfo = DB::table('trafficpolice')->where('id', $id)->first();
        $filePath = public_path('images/faces').'/'.$getInfo->image;

        // delete image and details from database
        File::delete($filePath);
        $feedback = TrafficPolice::where('id', $id)->forceDelete();

        if($feedback) {
            return back()->with('success', "Police detail has been deleted successfully.");
        } else {
            return back()->with('failure', "Couldn't able to delete data.");
        }
    }

    // restore police details
    function restorePolice($id)
    {
        $feedback = TrafficPolice::where('id', $id)->restore();
        if($feedback) {
            return back()->with('success', "Police details has been restored successfully.");
        } else {
            return back()->with('failure', "Couldn't able to restore data.");
        }
    }

}
