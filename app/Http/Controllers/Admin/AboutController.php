<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Yajra\DataTables\DataTables;
use App\Models\Setting;

class AboutController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('permission:about-list|about-create|about-edit|about-delete')->only('index');
    //     $this->middleware('permission:about-create')->only(['create', 'store']);
    //     $this->middleware('permission:about-edit')->only(['edit', 'update']);
    //     $this->middleware('permission:about-delete')->only('destroy');
    // }


      private function uploadImage($image): string
        {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/about'), $imageName);
            return $imageName;
        }


    private function uploadImage1($image1): string
        {
            $imageName1 = time() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('uploads/about1'), $imageName1);
            return $imageName1;
        }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $about = About::all();

            return DataTables::of($about)
                ->addIndexColumn()

                ->addColumn('image', function ($about) {
                    return '<img src="' . asset("uploads/about/" . $about->image) . '" width="80">';
                })


                // ->addColumn('status', function ($about) {
                //     return $about->status
                //         ? '<span class="badge bg-success text-white">Active</span>'
                //         : '<span class="badge bg-danger text-white">Inactive</span>';
                // })

                ->addColumn('action', function ($about) {
                    $edit = '<a href="' . route('about.edit', $about->id) . '" class="btn btn-primary btn-sm me-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>';

                    $delete = '<form action="' . route('about.destroy', $about->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="button" class="btn btn-danger btn-sm delete-btn" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>';

                    return $edit . $delete;
                })

                ->rawColumns(['image',  'action'])
                ->make(true);
        }

        $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.about.index', compact('settings'));
    }


    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.about.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:255',
        ]);

        $about = new About();
        $about->title = $request->title;
        $about->subtitle = $request->subtitle;
        $about->description = $request->description;
        $about->image = $this->uploadImage($request->file('image'));
        $about->image1 = $this->uploadImage1($request->file('image1'));
        $about->save();

        return redirect()->route('about.index')->with('success', 'About created successfully.');
    }

    public function edit(About $about)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.about.edit', compact('about', 'settings'));
    }


    public function update(Request $request, About $about)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:255',
        ]);

        $about->title = $request->title;
        $about->subtitle = $request->subtitle;
        $about->description = $request->description;
        $about->short_description = $request->short_description;

        if ($request->hasFile('image')) {
            $about->image = $this->uploadImage($request->file('image'));
        }

        if ($request->hasFile('image1')) {
            $about->image1 = $this->uploadImage1($request->file('image1'));
        }

        $about->save();

        return redirect()->route('about.index')->with('success', 'About updated successfully.');
    }

    public function destroy(About $about)
    {
        if ($about->image && file_exists(public_path('uploads/about/' . $about->image))) {
            unlink(public_path('uploads/about/' . $about->image));
        }

        if ($about->image1 && file_exists(public_path('uploads/about1/' . $about->image1))) {
            unlink(public_path('uploads/about1/' . $about->image1));
        }

        $about->delete();

        return redirect()->route('about.index')->with('success', 'About deleted successfully.');
    }



}
