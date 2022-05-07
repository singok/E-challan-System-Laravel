<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkpost;
use Illuminate\Support\Facades\DB;

class CheckpostController extends Controller
{
    // display add checkpost page
    function checkpost() 
    {
        return view('pages.dashboard-checkpost-add');
    }

    // add checkpost 
    function addCheckpost(Request $request)
    {
        // validation
        $request->validate([
            'checkpost' => 'required | unique:checkpost'
        ]);

        $checkpost = new Checkpost();

        // data insert
        $checkpost->checkpost = $request->checkpost;
        $checkpost->save();

        if($checkpost) {
            return back()->with('success','Checkpost added successfully !');
        } else {
            return back()->with('failure',"Couldn't able to add checkpost data !");
        }
    }

    // list checkpost admin panel
    function listCheckpost(Request $request) 
    {
        $search = $request['search'] ?? "";
        if($search == "") {
            $data = DB::table('checkpost')->select('id','checkpost')->SimplePaginate(5);
        } else {
            $data = Checkpost::where('checkpost', 'LIKE', "%$search%")->SimplePaginate(5);
        }
        return view('pages.dashboard-checkpost-list', ['dataCheckpost' => $data]);
    }

    // delete checkpost details
    function deleteCheckpost($id) 
    {
        $data = DB::table('checkpost')->where('id', '=', $id)->delete();

        if($data) {
            return back()->with('success', 'Checkpost detail deleted successfully !');
        } else {
            return back()->with('failure',"Couldn't able to delete checkpost detail !");
        }
    }

    // show update form
    function updateForm($id)
    {
        $data = DB::table('checkpost')->where('id', '=', $id)->first();
        return view('pages.dashboard-updateCheckpost', ['dataInfo' => $data]);
    }

    // update checkpost details
    function checkpostUpdate($id, Request $request)
    {
        // validate
        $request->validate([
            'checkpost' => 'required | unique:checkpost'
        ]);

        // update details
        $data = DB::table('checkpost')->where('id', '=', $id)->update(['checkpost' => $request->checkpost]);
        if($data) {
            return back()->with('success','Checkpost details updated successfully !');
        } else {
            return back()->with('failure',"Couldn't update checkpost details !");
        }
    }
}
