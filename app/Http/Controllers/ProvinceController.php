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
    function displayProvinceDistrict(Request $request)
    {

        $search = $request['search'] ?? "";
        if($search == "") {
            $data_province = DB::table('province')->select('pid','province')->SimplePaginate(5);
            $data_district = DB::table('district')->select('id','district','province_id')->SimplePaginate(8);
        } else {
            $data_province = DB::table('province')->select('pid','province')->where('province', 'LIKE', "%$search%")->SimplePaginate(5);
            $data_district = DB::table('district')->select('id','district','province_id')->where('district', 'LIKE', "%$search%")->SimplePaginate(8);
        }

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

    // update province detail
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

    // show district update form
    function updateDistrictForm($id)
    {
        $data = DB::table('district')->where('id', $id)->first();

        return view('pages.dashboard-district-update', ['dataDistrict' => $data]);
    }

    // update district details
    function districtUpdate($id, Request $request)
    {
        $request->validate([
            'district' => 'required | unique:district'
        ]);

        $data = DB::table('district')->where('id', '=', $id)->update(['district' => $request['district']]);
        
        if($data) {
            return back()->with('success', "District has been updated successfully !");
        } else {
            return back()->with('failure',"Something went wrong !");
        }
    }

    // delete district detail
    function deleteDistrict($id)
    {
        $district = DB::table('district')->where('id', $id)->delete();

        if($district) {
            return back()->with('success', 'District deleted successfully !');
        } else {
            return back()->with('failure', 'Something went wrong !');
        }
    }

    // show vehicle details
    function showVehicle(Request $request)
    {
        $search = $request['search'] ?? "";

        if( $search == "") {
            $data = DB::table('vehicle')->select('cid','category', 'details')->SimplePaginate(8);
        } else {
            $data = DB::table('vehicle')->select('cid','category', 'details')->where('category', 'LIKE',"%$search%")->orwhere('details','LIKE',"%$search%")->SimplePaginate(8);
        }

        return view('pages.dashboard-vehicle-list', ['dataVehicle' => $data]);
    }

    // delete vehicle details
    function deleteVehicle($id)
    {
        $data = DB::table('vehicle')->where('cid', $id)->delete();

        if($data) {
            return back()->with('success', 'Vehicle deleted successfully !');
        } else {
            return back()->with('failure', 'Something went wrong !');
        }
    }

    // show vehicle update form
    function vehicleUpdateForm($id)
    {
        $data = DB::table('vehicle')->where('cid', $id)->first();
        
        return view('pages.dashboard-vehicle-update', ['dataVehicle' => $data]);
    }

    // update vehicle details
    function vechileUpdate($id, Request $request)
    {
        $request->validate([
            'category' => 'required',
            'details' => 'required'
        ]);

        $data = DB::table('vehicle')->where('cid', '=', $id)->update(['category' => $request['category'], 'details' => $request['details']]);
        
        if($data) {
            return back()->with('success', "Category has been updated successfully !");
        } else {
            return back()->with('failure',"Something went wrong !");
        }
    }
}
