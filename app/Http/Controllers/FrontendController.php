<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\VisaType;
use App\Models\Application;

class FrontendController extends Controller
{
    //


    public function index()
    {

        $sliders = Slider::where('status', 1)->get();

        $about = About::latest()->first();

        $courses = Course::where('status', 1)
                        ->latest()        // shorthand for orderByDesc('created_at')
                        ->take(3)
                        ->get();

        $coursesCategory = CourseCategory::all();

        $course = Course::all();

        $testimonials = Testimonial::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();


        return view('frontend.index', compact('sliders','about','courses','coursesCategory','course','testimonials','settings'));

    }

    public function showCategory($name)
    {
        $category = CourseCategory::where('name', urldecode($name))->firstOrFail();
        $courses = $category->courses; // assuming you have a hasMany relationship
        $coursesCategory = CourseCategory::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('frontend.coursesCategory', compact('category', 'courses','coursesCategory','settings'));
    }


    public function applyNow()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $coursesCategory = CourseCategory::all();
         $courses = Course::all();
        $visaTypes = VisaType::all();
        return view('frontend.apply-now',compact('settings','coursesCategory','courses','visaTypes'));
    }


      public function applyNowstore(Request $request)
        {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'course_id' => 'required|integer|exists:courses,id',
                'postal_address' => 'required|string|max:255',
                'visa_type_id' => 'required|integer|exists:visa_types,id',
                'referrer_name' => 'nullable|string|max:255',
                'referrer_phone' => 'nullable|string|max:20',
            ]);

            Application::create($request->all());

            return redirect()->back()->with('success', 'Contact created successfully.');
        }


    public function ourTeam()
    {

        $coursesCategory = CourseCategory::all();
        $teams = Team::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('frontend.our-team', compact('coursesCategory','teams','settings'));
    }

    public function faq()
    {
        $coursesCategory = CourseCategory::all();
        $faqs = Faq::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('frontend.faq',compact('coursesCategory','faqs','settings'));
    }

    public function sfeFundedCourses()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $coursesCategory = CourseCategory::all();
        return view('frontend.sfe-funded-courses',compact('settings','coursesCategory'));
    }
    public function sfeFundedCoursesDetails()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $coursesCategory = CourseCategory::all();
        return view('frontend.sfe-funded-courses-details',compact('settings','coursesCategory'));
    }


    public function selfFunded()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $coursesCategory = CourseCategory::all();
        return view('frontend.self-funded',compact('settings','coursesCategory'));
    }

    public function freeCourses()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        $coursesCategory = CourseCategory::all();
        $courses = Course::all();
        return view('frontend.free-courses',compact('settings','coursesCategory','courses'));
    }


    public function contact()
    {
        $coursesCategory = CourseCategory::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('frontend.contact',compact('coursesCategory','settings'));
    }


       public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->status = $request->status;
        $contact->save();

         return redirect()->back()->with('success', 'Contact created successfully.');
    }
}
