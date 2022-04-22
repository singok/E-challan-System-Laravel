<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    // display vehicle category form
    function showVehicleForm()
    {
        return view('pages.dashboard-vehicle-add');
    }

    // add vehicle category
    function addVehicle(Request $request)
    {
        // alidate
        $request->validate([
            'category' => 'required',
            'categoryDetails' => 'required'
        ]);

        $vehicle = new Vehicle();
        $vehicle->category = $request->category;
        $vehicle->details = $request->categoryDetails;
        $vehicle->save();
        if($vehicle) {
            return back()->with('success', 'Vehicle Category added successfully !');
        } else {
            return back()->with('failure', 'Something went wrong !');
        }
    }
}
