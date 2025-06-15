<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('apply-now', [FrontendController::class, 'applyNow'])->name('frontend.apply-now');

Route::get('/',[FrontendController::class, 'index'])->name('frontend');
Route::get('our-team', [FrontendController::class, 'ourTeam'])->name('frontend.our-team');

Route::get('faq',[FrontendController::class, 'faq'])->name('frontend.faq');

Route::get('sfe-funded-courses',[FrontendController::class, 'sfeFundedCourses'])->name('frontend.sfe-funded-courses');

Route::get('self-funded', [FrontendController::class, 'selfFunded'])->name('frontend.self-funded');

Route::get('free-courses',[FrontendController::class, 'freeCourses'])->name('frontend.free-courses');

Route::get('contact',[FrontendController::class, 'contact'])->name('frontend.contact');

