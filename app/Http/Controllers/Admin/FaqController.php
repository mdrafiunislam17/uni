<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FaqController extends Controller
{
    //


    // public function __construct()
    // {
    //     $this->middleware('permission:faq-list|faq-create|faq-edit|faq-delete')->only('index');
    //     $this->middleware('permission:faq-create')->only(['create', 'store']);
    //     $this->middleware('permission:faq-edit')->only(['edit', 'update']);
    //     $this->middleware('permission:faq-delete')->only('destroy');
    // }




    public function index(Request $request)
    {
        if ($request->ajax()) {
            $faq = Faq::all();

            return DataTables::of($faq)

                ->addColumn('status', function ($faq) {
                    return $faq->status
                        ? '<span class="badge text-white bg-success">Active</span>'
                        : '<span class="badge text-white bg-danger">Inactive</span>';
                })


                ->addColumn('action', function($row){
                        $btn = '<a href="'.route('faq.edit', $row->id).'" class="edit btn btn-primary btn-sm me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a> ';
                        $btn .= '<form action="'.route('faq.destroy', $row->id).'" method="POST" style="display:inline;">
                                    '.csrf_field().'
                                    '.method_field("DELETE").'
                                    <button type="button" class="btn btn-danger btn-sm delete-btn" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>';
                        return $btn;
                })



                ->rawColumns([ 'status', 'action'])
                ->make(true);
        }

         $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.faq.index', compact('settings')); // adjust view name as needed
    }


    public function create(): View
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.faq.create', compact('settings')); // adjust view name as needed
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
          'question' => 'required|string|max:255',
          'answer' => 'required|string',
          'sort' => 'nullable|integer',
          'status' => 'required|boolean',
        ]);

        Faq::create($request->all());

        return redirect()->route('faq.index')->with('success', 'FAQ created successfully.');
    }
    public function edit(Faq $faq): View
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.faq.edit', compact('faq','settings')); // adjust view name as needed
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'sort' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);

        $faq->update($request->all());

        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully.');
    }


}
