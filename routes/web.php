<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\VisaController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\About;
use App\Models\Course;
use App\Models\Faq;

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



// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('apply-now', [FrontendController::class, 'applyNow'])->name('frontend.apply-now');

Route::post('apply-now', [FrontendController::class, 'applyNowstore'])->name('frontend.applyNowstore');

Route::get('/',[FrontendController::class, 'index'])->name('frontend');
Route::get('/courses/category/{name}', [FrontendController::class, 'showCategory'])->name('frontend.courses.category');

Route::get('our-team', [FrontendController::class, 'ourTeam'])->name('frontend.our-team');

Route::get('faqas',[FrontendController::class, 'faq'])->name('frontend.faqs');

Route::get('sfe-funded-courses',[FrontendController::class, 'sfeFundedCourses'])->name('frontend.sfe-funded-courses');

Route::get('self-funded', [FrontendController::class, 'selfFunded'])->name('frontend.self-funded');

Route::get('free-courses',[FrontendController::class, 'freeCourses'])->name('frontend.free-courses');

Route::get('contacts',[FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('contacts', [FrontendController::class, 'store'])->name('frontend.contactstore');





Auth::routes();
// Protected routes (requires authentication)
Route::middleware('auth')->group(function () {

    // Home Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    // SliderController
    Route::resource("sliders", SliderController::class);

    Route::resource('courseCategorics', CourseCategoryController::class);
    Route::resource('courses', CourseController::class);

    Route::resource('team', TeamController::class);

    Route::resource('testimonial', TestimonialController::class);

    Route::resource('visa', VisaController::class);

    Route::resource('applications', ApplicationController::class);

    Route::resource('faq',FaqController::class);

    Route ::resource('contact', ContactController::class);

    Route::resource('about', AboutController::class);

    Route::get("settings", [SettingController::class, "index"])->name("settings.index");
    Route::put("settings", [SettingController::class, "update"])->name("settings.update");



});
