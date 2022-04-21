<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrafficController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\ChallanController;
use App\Http\Controllers\FrontController;


Route::post('/admin/check', [AdminController::class, 'check'])->name('admin.check');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/forgetpassword', [AdminController::class, 'giveEmail'])->name('admin.forgetpassword');
Route::post('/admin/passwordlink', [AdminController::class, 'getLink'])->name('admin.passwordlink');
Route::get('/admin/reset/{email}/{token}', [AdminController::class, 'getResetForm']);
Route::post('/admin/update', [AdminController::class, 'update'])->name('admin.setNewPassword');
Route::get('/admin/setting/show', [AdminController::class, 'showSetting'])->name('admin.setting');
Route::post('/admin/setting/update', [AdminController::class, 'updateAdminSetting'])->name('admin.setting-update');

Route::middleware(['authCheck'])->group(function () {
    //Route::get('/', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/admin/dashboard', [TrafficController::class, 'dashboard'])->name('admin.dashboard');
});

Route::get('/admin/addTrafficPolice', [TrafficController::class, 'registerTrafficDisplay'])->name('admin.traffic-register');
Route::get('/admin/addTrafficRules', [TrafficController::class, 'registerRulesDisplay'])->name('admin.rules-register');
Route::get('/admin/displayTrafficPolice', [TrafficController::class, 'listTrafficPolice'])->name('admin.traffic-display');

Route::post('/admin/addTrafficPolice/register', [TrafficController::class, 'registerPolice'])->name('traffic_police_add');
Route::post('/admin/addTrafficRules/register', [TrafficController::class, 'registerRules'])->name('traffic_rules_add');
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
Route::get('/admin-login', [FrontController::class, 'adminLogin'])->name('adminlogin');
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
Route::post('/challan/form-submit',[FrontController::class, 'submitChallan'])->name('challanSubmit');