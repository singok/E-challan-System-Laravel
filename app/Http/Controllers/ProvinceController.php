<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    // display province register form
    function showProvinceForm() 
    {
        $data = DB::table('province')->select('name')->distinct()->get();
        return view('pages.dashboard-province', ['dataInfo' => $data]);
    }

    // add district details
    function addDistrict(Request $request)
    {
        // validate
        $request->validate([
            'province' => 'required',
            'district' => 'required'
        ]);
        $province = new Province();
        $province->name = $request->province;
        $province->district = $request->district;
        $province->save();
        if($province) {
            return back()->with('success', 'District added successfully !');
        } else {
            return back()->with('failure', 'Something went wrong !');
        }
    }
}
