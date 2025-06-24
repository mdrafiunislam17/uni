<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete')->only('index');
    //     $this->middleware('permission:contact-create')->only(['create', 'store']);
    //     $this->middleware('permission:contact-edit')->only(['edit', 'update']);
    //     $this->middleware('permission:contact-delete')->only('destroy');
    // }






      public function index(Request $request)
        {
            if ($request->ajax()) {
                $contact = Contact::select(['id', 'name', 'email', 'phone',  'status'])
                 ->orderBy('id', 'desc')
                    ->get(); // Fetch all contacts

                return DataTables::of($contact)
                    ->addIndexColumn() // This generates DT_RowIndex

                    ->addColumn('status', function ($contact) {
                        return $contact->status
                            ? '<span class="badge text-white bg-success">Active</span>'
                            : '<span class="badge text-white bg-danger">Inactive</span>';
                    })


                  ->addColumn('action', function ($row) {
                        $showBtn = '<a href="'.route('contact.show', $row->id).'" class="btn btn-info btn-sm me-1" title="Show">
                                        <i class="fas fa-eye"></i>
                                    </a>';

                        /*  ===== ভবিষ্যতে দরকার হলে আনকমেন্ট করুন =====
                        $editBtn = '<a href="'.route('contact.edit', $row->id).'" class="btn btn-primary btn-sm me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>';

                        $deleteBtn = '<form action="'.route('contact.destroy', $row->id).'" method="POST" style="display:inline;">
                                        '.csrf_field().method_field("DELETE").'
                                        <button type="button" class="btn btn-danger btn-sm delete-btn" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>';
                        return $showBtn.$editBtn.$deleteBtn;
                        ============================================== */

                        return $showBtn;   // এখন শুধু Show ফেরত দেব
                    })




                    ->rawColumns([ 'status', 'action'])
                    ->make(true);
            }

            $settings = Setting::query()->pluck("value", "setting_name")->toArray();

            return view('admin.contact.index', compact('settings')); // adjust view name as needed
        }


    public function create(){
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.contact.create', compact('settings')); // adjust view name as needed
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

    public function show(Contact $contact)
    {

         $settings = Setting::query()->pluck("value", "setting_name")->toArray();

        return view('admin.contact.show', compact('contact','settings')); // adjust view name as needed
    }

    public function edit(Contact $contact)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.contact.edit', compact('contact','settings')); // adjust view name as needed
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->status = $request->status;
        $contact->save();

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully.');
    }
}
