<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrafficController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\ChallanController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\InvoiceController;
use App\Models\Admin;


Route::post('/admin/check', [AdminController::class, 'check'])->name('admin.check');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/admin/passwordlink', [AdminController::class, 'getLink'])->name('admin.passwordlink');

// admin password reset form 
Route::get('/password/reset/{email}/{token}', [AdminController::class, 'getResetForm']);
Route::post('/password/update', [AdminController::class, 'update'])->name('admin.setNewPassword');

// traffic password reset form
Route::post('/traffic/passwordlink', [FrontController::class, 'getPasswordLink'])->name('traffic.passwordlink');
Route::get('/password/traffic/reset/{email}/{token}', [FrontController::class, 'getTrafficResetForm']);
Route::post('/password/traffic/update', [FrontController::class, 'updatePassword'])->name('traffic.setNewPassword');

Route::get('/admin/setting/show', [AdminController::class, 'showSetting'])->name('admin.setting');
Route::post('/admin/setting/update', [AdminController::class, 'updateAdminSetting'])->name('admin.setting-update');

Route::middleware(['authCheck'])->group(function () {
    Route::get('/admin-login', [FrontController::class, 'adminLogin'])->name('adminlogin');
    Route::get('/admin/dashboard', [TrafficController::class, 'dashboard'])->name('admin.dashboard');
});

Route::get('/admin/addTrafficPolice', [TrafficController::class, 'registerTrafficDisplay'])->name('admin.traffic-register');
Route::get('/admin/addTrafficRules', [TrafficController::class, 'registerRulesDisplay'])->name('admin.rules-register');
Route::get('/admin/displayTrafficPolice', [TrafficController::class, 'listTrafficPolice'])->name('admin.traffic-display');

Route::post('/admin/addTrafficPolice/register', [TrafficController::class, 'registerPolice'])->name('traffic_police_add');
Route::post('/admin/addTrafficRules/register', [TrafficController::class, 'registerRules'])->name('traffic_rules_add');

// vehicle category
Route::get('/admin/VehicleCategory/show', [VehicleController::class, 'showVehicleForm'])->name('admin.vehicle-add');
Route::post('/admin/VehicleCategory/add', [VehicleController::class, 'addVehicle'])->name('admin.vehicle-register');


// province and district
Route::get('/admin/province-district/add', [ProvinceController::class, 'showProvinceForm'])->name('admin.province-add');
Route::post('/admin/district/register', [ProvinceController::class, 'addDistrict'])->name('admin.district-register');
Route::post('/admin/province/register', [ProvinceController::class, 'addProvince'])->name('admin.province-register');
Route::get('/admin/province&district/display', [ProvinceController::class, 'displayProvinceDistrict'])->name('admin.province-display');
Route::get('/admin/province-delete/{id}', [ProvinceController::class, 'deleteProvince'])->name('admin.province-delete-permanent');
Route::get('/admin/province-updateform/{id}', [ProvinceController::class, 'updateProvinceForm'])->name('admin.province-edit');
Route::post('/admin/province-edit/{pid}', [ProvinceController::class, 'provinceUpdate'])->name('province_name_update');
Route::get('/admin/district-delete/{id}', [ProvinceController::class, 'deleteDistrict'])->name('admin.district-delete-permanent');
Route::get('/admin/district-update/{id}', [ProvinceController::class, 'updateDistrictForm'])->name('admin.district-update');
Route::post('/admin/district-edit/{id}', [ProvinceController::class, 'districtUpdate'])->name('district_name_update');


// vehicle details
Route::get('/admin/vehicle-list/display', [ProvinceController::class, 'showVehicle'])->name('admin.vehicle-list');
Route::get('/admin/vehicle-delete/{id}', [ProvinceController::class, 'deleteVehicle'])->name('admin.vehicle-delete-permanently');
Route::get('/admin/vehicle-detail/updateform/{id}', [ProvinceController::class, 'vehicleUpdateForm'])->name('admin.vehicle-detail-update');
Route::post('/admin/vehicle/update/{id}', [ProvinceController::class, 'vechileUpdate'])->name('vehicle_details_update');



Route::get('/admin/displayTrafficRules', [TrafficController::class, 'listTrafficRules'])->name('admin.rules-display');

Route::get('/admin/traffic-delete/{id}', [TrafficController::class, 'deleteTraffic'])->name('admin.traffic-delete');
Route::get('/admin/rule-delete/{id}', [TrafficController::class, 'deleteRule'])->name('admin.rule-delete');

Route::get('/admin/traffic-police-edit/{id}', [TrafficController::class, 'updateTrafficDetails'])->name('admin.traffic-update');
Route::post('/admin/traffic-polic-update/{id}', [TrafficController::class, 'trafficDetailsUpdate'])->name('traffic_update');

Route::get('/admin/traffic-rules-edit/{id}', [TrafficController::class, 'updateTrafficRules'])->name('admin.traffic-rules-update');
Route::post('/admin/traffic-rules-update/{id}', [TrafficController::class, 'trafficRulesUpdate'])->name('traffic_rules_update');

Route::get('/admin/trashbin', [TrashController::class, 'displayTrashbin'])->name('admin.trash');
Route::get('/admin/rule-delete-permanent/{id}', [TrashController::class, 'ruleDelete'])->name('admin.rule-delete-permanent');
Route::get('/admin/rule-restore/{id}', [TrashController::class, 'restoreRules'])->name('admin.traffic-rules-restore');
Route::get('/admin/traffic-restore/{id}', [TrashController::class, 'restorePolice'])->name('admin.traffic-restore');
Route::get('/admin/traffic-delete-permanent/{id}', [TrashController::class, 'policeDelete'])->name('admin.traffic-delete-permanent');

Route::get('/admin/traffic/challan-display', [ChallanController::class, 'showChallan'])->name('admin.challan-show');
Route::get('/admin/traffic/challan-delete/{license}', [ChallanController::class, 'deleteChallan'])->name('admin.challan-delete');


// front part
Route::get('/', [FrontController::class, 'rulePage'])->name('rulepage');
Route::get('/verification', [FrontController::class, 'verificationPage'])->name('verificationpage');
Route::get('/traffic-login', [FrontController::class, 'trafficLogin'])->name('trafficlogin');
Route::get('/admin-password-forget', [FrontController::class, 'adminForget'])->name('adminforget');
Route::get('/traffic-password-forget', [FrontController::class, 'trafficForget'])->name('trafficforget');

// front Authentication
Route::post('/traffic-login/check', [FrontController::class, 'verifyTraffic'])->name('checkTraffic');
Route::get('/traffic/logout', [FrontController::class, 'logoutTraffic'])->name('trafficlogout');

Route::middleware(['challanCheck'])->group(function() {
    Route::get('/challan', [FrontController::class, 'challanPage'])->name('challanpage');
});

// challan part
Route::post('/challan/load-district', [FrontController::class, 'displayDistrict'])->name('loadDistrict');
Route::post('/challan/load-categoryDetails', [FrontController::class, 'displayCategoryDetails'])->name('loadCategoryDetails');
Route::get('/challan/form-submit',[FrontController::class, 'submitChallan'])->name('challanSubmit');

// invoice
Route::get('/invoice/generate', [InvoiceController::class, 'generatePDF'])->name('invoice');


use App\Notifications\PaymentNotification;
// notification
Route::get('/notify', function () {
    $user = Admin::find(1);
    $fname = "Suraj";
    $mname = "";
    $lname = "Singok";
    $license = "23-34-4543453";
    $amount = "1000";
    Admin::find(1)->notify(new PaymentNotification($fname, $mname, $lname, $license, $amount));
    return redirect()->back();
});

Route::get('/notification/merkasRead', function () {
    $user = Admin::find(1);
    $user->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('notificationMark');

// Payment Page
Route::get('/payment', function () {
    return view('front.payment');
})->name('paymentpage');

use Illuminate\Http\Request;
use Twilio\Rest\Client;
Route::post('/sms', function (Request $request) {

    try {
        $client = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        $client->messages->create('+977'.$request->phone, [
            'from' => env('TWILIO_FROM'),
            'body' => 'Your Account has been debited by NPR '.$request->amount.' on '.Carbon\Carbon::now()->format('d-M-Y').', Remarks: '.$request->remarks.' E-CHALLAN'
        ]);

        return redirect()->back();
    } catch (Exception $e) {
        return $e->getMessage();
    }
})->name('sms');