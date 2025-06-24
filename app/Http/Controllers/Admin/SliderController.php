<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Setting;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{

    // public function __construct()
    //     {
    //         $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete')->only('index');
    //         $this->middleware('permission:slider-create')->only(['create', 'store']);
    //         $this->middleware('permission:slider-edit')->only(['edit', 'update']);
    //         $this->middleware('permission:slider-delete')->only('destroy');
    //     }

    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/slider'), $imageName);
        return $imageName;
    }




public function index(Request $request)
{
    if ($request->ajax()) {
        $sliders = Slider::all();

        return DataTables::of($sliders)
            ->addColumn('image', function ($slider) {
                return '<img src="' . asset("uploads/slider/" . $slider->image) . '" width="80" />';
            })
            ->addColumn('status', function ($slider) {
                return $slider->status
                    ? '<span class="badge text-white bg-success">Active</span>'
                    : '<span class="badge text-white bg-danger">Inactive</span>';
            })


            ->addColumn('action', function($row){
                    $btn = '<a href="'.route('sliders.edit', $row->id).'" class="edit btn btn-primary btn-sm me-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a> ';
                    $btn .= '<form action="'.route('sliders.destroy', $row->id).'" method="POST" style="display:inline;">
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

    return view('admin.sliders.index', compact('settings')); // adjust view name as needed
}



// Blade‑এ শুধু খালি table structure রাখবেন


    // public function index(): View
    // {
    //     $sliders = Slider::orderBy('sort')->paginate(10);
    //     return view('admin.sliders.index', compact('sliders'));
    // }

    public function create(): View
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.sliders.create', compact('settings')); // adjust view name as needed
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'    => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'sort'     => 'nullable|integer',
            "status" => "required|digits_between:0,1",
            'description' => 'nullable|string',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $slider = new Slider($validated);

            if ($request->hasFile('image')) {
                $slider->image = $this->uploadImage($request->file('image'));
            }

            $slider->save();

            return redirect()-> route('sliders.index')->with('success', 'Slider has been inserted successfully.');
        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Database Error (Code: ' . $e->getCode() . ')');
        }
    }

    public function show(Slider $slider): View
    {
         $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.sliders.show', compact('slider', 'settings')); // adjust view name as needed
    }

    public function edit(Slider $slider): View
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.sliders.edit', compact('slider', 'settings')); // adjust view name as needed
    }

    public function update(Request $request, Slider $slider): RedirectResponse
    {
        $validated = $request->validate([
            'title'    => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'sort'     => 'nullable|integer',
            "status" => "required|digits_between:0,1",
            'description' => 'nullable|string',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $slider->fill($validated);

            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($slider->image && Storage::exists('public/uploads/' . $slider->image)) {
                    Storage::delete('public/uploads/' . $slider->image);
                }

                $slider->image = $this->uploadImage($request->file('image'));
            }

            $slider->save();

            return redirect()-> route('sliders.index')->with('success', 'Slider updated successfully.');
        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'Database Error (Code: ' . $e->getCode() . ')');
        }
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        try {
            if ($slider->image && Storage::exists('public/uploads/' . $slider->image)) {
                Storage::delete('public/uploads/' . $slider->image);
            }

            $slider->delete();

            return back()->with('success', 'Slider deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting slider: ' . $e->getMessage());
        }
    }
}
