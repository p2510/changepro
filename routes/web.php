<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WorkingController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignalmanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $urlLogo=url("public/storage/img/logo.png");
    $urlDescription=url("public/storage/img/description_changepro.gif");
    $urlHome1=asset("public/storage/img/home_1.gif");
    $urlHome2=url("public/storage/img/home_2.gif");
    $urlHome3=url("public/storage/img/home_3.jpg");
    
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'urlLogo' => $urlLogo,
        'urlDescription' => $urlDescription,
        'urlHome1' => $urlHome1,
        'urlHome2' => $urlHome2,
        'urlHome3' => $urlHome3,
    ]);
});
/* dashboard */
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
/* route transfer */
Route::resource('/transfer', TransferController::class)->middleware(['auth', 'verified']);
Route::get('/transfer/show/{id}', [TransferController::class, 'show_phone'])->name('transfer.show.phone')->middleware(['auth', 'verified']);
Route::get('/recharge', [RechargeController::class, 'index'])->name('recharge')->middleware(['auth', 'verified']);

/* search transfer */
Route::get('/search', [SearchController::class, 'index'])->name('transfer.search')->middleware(['auth', 'verified']);
/* signalman */
Route::post('/signal/{id}', [SignalmanController::class, 'signal'])->middleware(['auth', 'verified'])->name('signal');
/* working*/
Route::get('/working', [WorkingController::class, 'working'])->name('working');

// admin routing
Route::controller(AdminController::class)->group(function () {
  Route::prefix('admin')->group(function () {
    Route::get('/', 'index')->name("admin.index");
    Route::post('/login', 'login')->name("admin.login");
    Route::get('/dashboard', 'dashboard')->name("admin.dashboard");
    Route::get('/recharge', 'recharge')->name("admin.recharge");
    Route::put('/recharge', 'recharge_put')->name("admin.recharge.put");
    Route::get('/statistic', 'statistic')->name("admin.statistic");
    Route::get('/logout', 'logout')->name("admin.logout");
});  

});


require __DIR__.'/auth.php';
