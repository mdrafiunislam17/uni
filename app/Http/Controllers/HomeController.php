<?php

namespace App\Http\Controllers;
use App\Models\Setting;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }


      public function index ()
        {
            $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            $totalCourses = \App\Models\Course::count();
            $totalTeamsMember = \App\Models\Team::count();
            $totalApplications = \App\Models\Application::count();
            return view('admin.index', compact('settings', 'totalCourses', 'totalTeamsMember', 'totalApplications'));
        }
}
