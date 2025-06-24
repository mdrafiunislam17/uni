<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisaType;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class VisaController extends Controller
{
    //


    // public function __construct()
    // {
    //     $this->middleware('permission:visa-list|visa-create|visa-edit|visa-delete')->only('index');
    //     $this->middleware('permission:visa-create')->only(['create', 'store']);
    //     $this->middleware('permission:visa-edit')->only(['edit', 'update']);
    //     $this->middleware('permission:visa-delete')->only('destroy');
    // }




public function index(Request $request)
{
    if ($request->ajax()) {
        $data = VisaType::select(['id', 'name']); // adjust fields as needed
        return DataTables::of($data)
            ->addIndexColumn() // This is what generates DT_RowIndex
           ->addColumn('action', function($row){
            $btn = '<a href="'.route('visa.edit', $row->id).'" class="edit btn btn-primary btn-sm me-1" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a> ';
            $btn .= '<form action="'.route('visa.destroy', $row->id).'" method="POST" style="display:inline;">
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

    return view('admin.visaType.index', compact('settings')); // adjust view name as needed
}







    public function create(): View
    {
         $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.visaType.create',compact('settings')); // adjust view name as needed
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        VisaType::create($request->all());

        return redirect()->route('visa.index')->with('success', 'Course Category created successfully.');
    }

    public function edit(VisaType $visa): View
    {
    $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.visaType.edit', compact('visa', 'settings')); // adjust view name as needed
    }
public function update(Request $request, VisaType $visa)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $visa->update($request->all());

    return redirect()->route('visa.index')->with('success', 'Course Category updated successfully.');
}




//

public function destroy(VisaType $visa): RedirectResponse
{
    try {
        $visa->delete();

        return back()->with('success', 'Course Category deleted successfully.');
    } catch (\Exception $e) {
        return back()->with('error', 'Error deleting category: ' . $e->getMessage());
    }
}
}
