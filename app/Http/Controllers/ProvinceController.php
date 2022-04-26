<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;

class ProvinceController extends Controller
{
    // display province register form
    function showProvinceForm() 
    {
        $data = DB::table('province')->select('province')->get();
        return view('pages.dashboard-province', ['dataInfo' => $data]);
    }

    // add district details
    function addDistrict(Request $request)
    {
        // validate
        $request->validate([
            'province' => 'required',
            'district' => 'required | unique:district'
        ]);

        $provinceID = DB::table('province')->select('pid')->where('province', $request->province)->first();
        $district = new District();
        $district->district = $request->district;
        $district->province_id = $provinceID->pid;
        $district->save();

        if($district) {
            return back()->with('success', 'District added successfully !');
        } else {
            return back()->with('failure', 'Something went wrong !');
        }
    }

    // add province details
    function addProvince(Request $request)
    {
        // validate
        $request->validate([
            'province_name' => 'required'
        ]);

        $isThere = DB::table('province')->where('province', $request->province_name)->first();

        if($isThere) {
            return back()->with('failure', 'Province already taken !');
        } else {
            $province = new Province();
            $province->province = $request->province_name;
            $province->save();

            if($province) {
                return back()->with('success', 'Province added successfully !');
            } else {
                return back()->with('failure', 'Something went wrong !');
            }
        }
        
    }

    // list province and district
    function displayProvinceDistrict()
    {
        // province details
        $data_province = DB::table('province')->select('pid','province')->SimplePaginate(5);

        // district details
        $data_district = DB::table('district')->select('id','district','province_id')->SimplePaginate(8);

        return view('pages.dashboard-province-list', ['dataProvince' => $data_province, 'dataDistrict' => $data_district ]);
    }

    // delete province detail
    function deleteProvince($id)
    {
        $province = DB::table('province')->where('pid', $id)->delete();

        if($province) {
            return back()->with('success', 'Province deleted successfully !');
        } else {
            return back()->with('failure', 'Something went wrong !');
        }
    }

    // display province update form
    function updateProvinceForm($id)
    {
        $data = DB::table('province')->where('pid', $id)->first();
        
        return view('pages.dashboard-province-update', ['dataProvince' => $data]);
    }

    // delete province detail
    function provinceUpdate($pid, Request $request)
    {
        $request->validate([
            'province' => 'required | unique:province'
        ]);

        $data = DB::table('province')->where('pid', '=', $pid)->update(['province' => $request['province']]);
        
        if($data) {
            return back()->with('success', "Province has been updated successfully !");
        } else {
            return back()->with('failure',"Something went wrong !");
        }
    }
}
