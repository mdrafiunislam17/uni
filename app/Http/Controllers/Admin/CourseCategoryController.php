<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Throwable;
class CourseCategoryController extends Controller
{
    //


    // public function __construct()
    // {
    //     $this->middleware('permission:course-category-list|course-category-create|course-category-edit|course-category-delete')->only('index');
    //     $this->middleware('permission:course-category-create')->only(['create', 'store']);
    //     $this->middleware('permission:course-category-edit')->only(['edit', 'update']);
    //     $this->middleware('permission:course-category-delete')->only('destroy');
    // }


public function index(Request $request)
{
    if ($request->ajax()) {
        $data = CourseCategory::select(['id', 'name']); // adjust fields as needed
        return DataTables::of($data)
            ->addIndexColumn() // This is what generates DT_RowIndex
           ->addColumn('action', function($row){
            $btn = '<a href="'.route('courseCategorics.edit', $row->id).'" class="edit btn btn-primary btn-sm me-1" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a> ';
            $btn .= '<form action="'.route('courseCategorics.destroy', $row->id).'" method="POST" style="display:inline;">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button type="button" class="btn btn-danger btn-sm delete-btn" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>';

                return $btn;
            })

            ->rawColumns(['action']) // to render HTML in action column
            ->make(true);
    }

     $settings = Setting::query()->pluck("value", "setting_name")->toArray();

    return view('admin.courseCategory.index',compact('settings')); // adjust view name as needed
}







    public function create(): View
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.courseCategory.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        CourseCategory::create($request->all());

        return redirect()->route('courseCategorics.index')->with('success', 'Course Category created successfully.');
    }

    public function edit(CourseCategory $courseCategoric): View
    {
    $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.courseCategory.edit', compact('courseCategoric', 'settings'));
    }
public function update(Request $request, CourseCategory $courseCategoric)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $courseCategoric->update($request->all());

    return redirect()->route('courseCategorics.index')->with('success', 'Course Category updated successfully.');
}




//

public function destroy(CourseCategory $courseCategoric): RedirectResponse
{
    try {
        $courseCategoric->delete();

        return back()->with('success', 'Course Category deleted successfully.');
    } catch (\Exception $e) {
        return back()->with('error', 'Error deleting category: ' . $e->getMessage());
    }
}



}
