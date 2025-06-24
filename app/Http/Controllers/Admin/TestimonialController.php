<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TestimonialController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete')->only('index');
    //     $this->middleware('permission:testimonial-create')->only(['create', 'store']);
    //     $this->middleware('permission:testimonial-edit')->only(['edit', 'update']);
    //     $this->middleware('permission:testimonial-delete')->only('destroy');
    // }


     private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/testimonial'), $imageName);
        return $imageName;
    }



      public function index(Request $request)
        {
            if ($request->ajax()) {
                $testimonial = Testimonial::all();

                return DataTables::of($testimonial)
                    ->addColumn('image', function ($testimonial) {
                        return '<img src="' . asset("uploads/testimonial/" . $testimonial->image) . '" width="80">';
                    })
                    ->addColumn('status', function ($testimonial) {
                        return $testimonial->status
                            ? '<span class="badge text-white bg-success">Active</span>'
                            : '<span class="badge text-white bg-danger">Inactive</span>';
                    })


                    ->addColumn('action', function($row){
                            $btn = '<a href="'.route('testimonial.edit', $row->id).'" class="edit btn btn-primary btn-sm me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a> ';
                            $btn .= '<form action="'.route('testimonial.destroy', $row->id).'" method="POST" style="display:inline;">
                                        '.csrf_field().'
                                        '.method_field("DELETE").'
                                        <button type="button" class="btn btn-danger btn-sm delete-btn" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>';
                            return $btn;
                    })



                    ->rawColumns(['image', 'status', 'action'])
                    ->make(true);

            }

             $settings = Setting::query()->pluck("value", "setting_name")->toArray();

            return view('admin.testimonial.index', compact('settings')); // adjust view name as needed
        }


    public function create()
        {
             $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            return view('admin.testimonial.create', compact('settings'));
        }


    public function store(Request $request)
        {
            $request->validate([
                'name'        => 'required|string|max:255',
                'slug'        => 'nullable|string|max:255|unique:testimonials,slug',
                'title'       => 'required|string|max:255',
                'message'     => 'nullable|string',
                'designation' => 'required|string|max:255',
                'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'sort'        => 'nullable|integer',
                'status'      => 'required|boolean',
            ]);

            /* --------- মান সেট করছি আপনার পুরনো ভঙ্গিতেই ---------- */
            $testimonial              = new Testimonial();
            $testimonial->name        = $request->name;
            $testimonial->slug        = $request->slug;
            $testimonial->title       = $request->title;
            $testimonial->message     = $request->message;
            $testimonial->designation = $request->designation;
            $testimonial->sort        = $request->sort;

            $testimonial->status  = $request->status;

            /* ইমেজ আপলোড (যদি থাকে) */
            if ($request->hasFile('image')) {
                $testimonial->image = $this->uploadImage($request->file('image'));   // নিজস্ব helper
            }

            $testimonial->save();

            return redirect()->route('testimonial.index')
                            ->with('success', 'testimonial member created successfully.');
        }


        public function edit(Testimonial $testimonial)
        {
             $settings = Setting::query()->pluck("value", "setting_name")->toArray();
            return view('admin.testimonial.edit', compact('testimonial', 'settings'));
        }
    public function update(Request $request, Testimonial $testimonial)
        {
            $request->validate([
                'name'        => 'required|string|max:255',
                'slug'        => 'nullable|string|max:255|unique:testimonials,slug,' . $testimonial->id,
                'title'       => 'required|string|max:255',
                'message'     => 'nullable|string',
                'designation' => 'required|string|max:255',
                'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'sort'        => 'nullable|integer',
                'status'      => 'required|boolean',
            ]);

            /* --------- মান সেট করছি আপনার পুরনো ভঙ্গিতেই ---------- */
            $testimonial->name        = $request->name;
            $testimonial->slug        = $request->slug;
            $testimonial->title       = $request->title;
            $testimonial->message     = $request->message;
            $testimonial->designation = $request->designation;
            $testimonial->sort        = $request->sort;

            $testimonial->status  = $request->status;

            /* ইমেজ আপলোড (যদি থাকে) */
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($testimonial->image) {
                    unlink(public_path('uploads/testimonial/' . $testimonial->image));
                }
                $testimonial->image = $this->uploadImage($request->file('image'));   // নিজস্ব helper
            }

            $testimonial->save();

            return redirect()->route('testimonial.index')
                            ->with('success', 'Testimonial member updated successfully.');
        }

    public function destroy(Testimonial $testimonial)
        {
            // Delete the image if it exists
            if ($testimonial->image && file_exists(public_path('uploads/testimonial/' . $testimonial->image))) {
                unlink(public_path('uploads/testimonial/' . $testimonial->image));
            }

            // Delete the testimonial record
            $testimonial->delete();

            return redirect()->route('testimonial.index')
                            ->with('success', 'Testimonial member deleted successfully.');
        }

}
