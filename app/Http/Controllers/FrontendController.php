<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //


    public function index()
    {
        return view('frontend.index');

    }

    public function applyNow()
    {
        return view('frontend.apply-now');
    }

    public function ourTeam()
    {
        return view('frontend.our-team');
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function sfeFundedCourses()
    {
        return view('frontend.sfe-funded-courses');
    }
    public function sfeFundedCoursesDetails()
    {
        return view('frontend.sfe-funded-courses-details');
    }


    public function selfFunded()
    {
        return view('frontend.self-funded');
    }

    public function freeCourses()
    {
        return view('frontend.free-courses');
    }


    public function contact()
    {
        return view('frontend.contact');
    }
}
