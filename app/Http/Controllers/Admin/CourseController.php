<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Database\QueryException;
use App\Models\CourseCategory;

class CourseController extends Controller
{
    // private function for image upload
    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/course'), $imageName);
        return $imageName;
    }



public function index(Request $request)
{
    if ($request->ajax()) {
        $courses = Course::with('category')->select('courses.*');

        return DataTables::of($courses)
            ->addIndexColumn()

            ->addColumn('image', function ($course) {
                return '<img src="' . asset("uploads/course/" . $course->image) . '" width="80">';
            })

            ->addColumn('category_name', function ($course) {
                return optional($course->category)->name ?? '<span class="text-muted">N/A</span>';
            })

            ->addColumn('status', function ($course) {
                return $course->status
                    ? '<span class="badge bg-success text-white">Active</span>'
                    : '<span class="badge bg-danger text-white">Inactive</span>';
            })

            ->addColumn('action', function ($course) {
                $edit = '<a href="' . route('courses.edit', $course->id) . '" class="btn btn-primary btn-sm me-1" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>';

                $delete = '<form action="' . route('courses.destroy', $course->id) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="button" class="btn btn-danger btn-sm delete-btn" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>';

                return $edit . $delete;
            })

            ->rawColumns(['image', 'category_name', 'status', 'action'])
            ->make(true);
    }
     $settings = Setting::query()->pluck("value", "setting_name")->toArray();

    return view('admin.course.index', compact('settings')); // adjust view name as needed
}


 public function create()
{
    $categories = CourseCategory::all();
     $settings = Setting::query()->pluck("value", "setting_name")->toArray();
    return view('admin.course.create', compact('categories', 'settings'));
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:course_categories,id',
            'slug' => 'required|string|unique:courses,slug',
            'status' => 'required|boolean',
        ]);

        try {
            $course = new Course();
            $course->title = $request->title;
            $course->description = $request->description;
            $course->category_id = $request->category_id;
            $course->slug = $request->slug;
            $course->status = $request->status;

            if ($request->hasFile('image')) {
                $course->image = $this->uploadImage($request->file('image'));
            }

            $course->save();

            return redirect()->route('courses.index')->with('success', 'Course created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create course: ' . $e->getMessage()]);
        }
    }

    public function edit(Course $course)
    {
        $categories = CourseCategory::all();
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.course.edit', compact('course', 'categories', 'settings'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:course_categories,id',
            'slug' => 'required|string|unique:courses,slug,' . $course->id,
            'status' => 'required|boolean',
        ]);

        try {
            $course->title = $request->title;
            $course->description = $request->description;
            $course->category_id = $request->category_id;
            $course->slug = $request->slug;
            $course->status = $request->status;

            if ($request->hasFile('image')) {
                if ($course->image && file_exists(public_path('uploads/course/' . $course->image))) {
                    unlink(public_path('uploads/course/' . $course->image));
                }
                $course->image = $this->uploadImage($request->file('image'));
            }

            $course->update();

            return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update course: ' . $e->getMessage()]);
        }
    }

    public function destroy(Course $course)
    {
        try {
            if ($course->image && file_exists(public_path('uploads/course/' . $course->image))) {
                unlink(public_path('uploads/course/' . $course->image));
            }

            $course->delete();

            return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete course: ' . $e->getMessage()]);
        }
    }
}
