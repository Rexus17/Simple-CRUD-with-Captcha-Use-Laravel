<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptchaServiceController;

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

Route::resource('captchaservice',CaptchaServiceController::class);

// ambil class dari StudentController from laravel 8
Route::get('/',[CaptchaServiceController::class, 'index']);

// Route::put('/captchaservice/{id}', 'CaptchaServiceController@update')->name('captchaservice.update');

Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);
