<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Course;
use App\Models\VisaType;


class ApplicationController extends Controller
{
    //


    // public function __construct()
    // {
    //     $this->middleware('permission:applications-list|applications-create|applications-edit|applications-delete')->only('index');
    //     $this->middleware('permission:applications-create')->only(['create', 'store']);
    //     $this->middleware('permission:applications-edit')->only(['edit', 'update']);
    //     $this->middleware('permission:applications-delete')->only('destroy');
    // }


    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Application::select(['id', 'first_name','email','phone','visa_type_id']); // adjust fields as needed
    //         return DataTables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('visa_type', function($row){
    //                 return optional($row->visaType)->name ?? 'N/A';   // safe call
    //             })
    //         ->addColumn('action', function($row){
    //             $btn = '<a href="'.route('applications.edit', $row->id).'" class="edit btn btn-primary btn-sm me-1" title="Edit">
    //                         <i class="fas fa-edit"></i>
    //                     </a> ';
    //             $btn .= '<form action="'.route('applications.destroy', $row->id).'" method="POST" style="display:inline;">
    //                         '.csrf_field().'
    //                         '.method_field('DELETE').'
    //                         <button type="button" class="btn btn-danger btn-sm delete-btn" title="Delete">
    //                             <i class="fas fa-trash-alt"></i>
    //                         </button>
    //                     </form>';

    //                 return $btn;
    //             })

    //             ->rawColumns(['action', 'visa_type Name' ]) // to render HTML in action column
    //             ->make(true);
    //     }

    //     return view('admin.application.index'); // adjust view name as needed
    // }


    public function index(Request $request)
    {
        // Datatables AJAX কলের জন্য
        if ($request->ajax()) {
            // eager‑load visaType রিলেশন + প্রয়োজনীয় কলাম
            $data = Application::with('visaType')
                    ->select(['id', 'first_name', 'email', 'phone', 'visa_type_id']);

            return DataTables::of($data)
                ->addIndexColumn()

                // === Visa Type নাম দেখানো ===
                ->addColumn('visa_type', function ($row) {
                    // রিলেশন না থাকলে 'N/A'
                    return optional($row->visaType)->name ?? 'N/A';
                })

                // === Action বাটন (Edit / Delete) ===
                ->addColumn('action', function ($row) {
                    $editUrl   = route('applications.edit',   $row->id);
                    $deleteUrl = route('applications.destroy', $row->id);

                    $btn  = '<a href="'.$editUrl.'" class="btn btn-primary btn-sm me-1" title="Edit">';
                    $btn .=     '<i class="fas fa-edit"></i></a>';

                    $btn .= '<form action="'.$deleteUrl.'" method="POST" style="display:inline;">'
                        .  csrf_field()
                        .  method_field('DELETE')
                        .  '<button type="submit" class="btn btn-danger btn-sm confirm-delete" title="Delete">'
                        .      '<i class="fas fa-trash-alt"></i>'
                        .  '</button></form>';

                    return $btn;
                })

                // HTML রেন্ডার করা দরকার এমন কলাম শুধু এখানেই দিন
                ->rawColumns(['action'])
                ->make(true);
        }

        // ভিউ‑তে যদি ফিল্টার ড্রপডাউন লাগে, প্ল্যাক করুন
        $visaTypes = VisaType::pluck('name', 'id');   // চাইলে বাদও দিতে পারেন
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.application.index', compact('visaTypes', 'settings'));
    }


    public function create()
    {
        $courses = Course::all(); // Fetch all courses if needed
        $visaTypes = VisaType::all(); // Fetch all visa types if needed
        // Return the view for creating a new application
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.application.create', compact('courses', 'visaTypes', 'settings'));
    }

     public function store(Request $request)
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

    public function edit (Application $application)
    {
        $courses = Course::all(); // Fetch all courses if needed
         $visaTypes = VisaType::all();
        // Return the view for editing an existing application
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.application.edit', compact('application', 'courses', 'visaTypes', 'settings'));
    }

    public function update(Request $request, Application $application)
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

        $application->update($request->all());

        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }


}
