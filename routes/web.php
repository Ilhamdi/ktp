<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\DtktpController;


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
    return view('welcome');
});


Auth::routes();



Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/editData', [App\Http\Controllers\HomeController::class, 'editData'])->name('editData');


Route::get('/contact-form', [CApp\Http\Controllers\aptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [App\Http\Controllers\CaptchaServiceController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [App\Http\Controllers\CaptchaServiceController::class, 'reloadCaptcha']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::post('dtktps', [DtktpController::class,'store'])->name('dtktps');
Route::resource('dtktps', DtktpController::class);
Route::get('/dtviewktp', [App\Http\Controllers\DtktpController::class, 'index'])->name('dtviewktp');

