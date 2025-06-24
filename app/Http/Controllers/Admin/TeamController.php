<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Setting;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('permission:team-list|team-create|team-edit|team-delete')->only('index');
    //     $this->middleware('permission:team-create')->only(['create', 'store']);
    //     $this->middleware('permission:team-edit')->only(['edit', 'update']);
    //     $this->middleware('permission:team-delete')->only('destroy');

    // }



     private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/teams'), $imageName);
        return $imageName;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $teams = Team::all();

            return DataTables::of($teams)
                ->addColumn('image', function ($teams) {
                    return '<img src="' . asset("uploads/teams/" . $teams->image) . '" width="80">';
                })
                ->addColumn('status', function ($teams) {
                    return $teams->status
                        ? '<span class="badge text-white bg-success">Active</span>'
                        : '<span class="badge text-white bg-danger">Inactive</span>';
                })


                ->addColumn('action', function($row){
                        $btn = '<a href="'.route('team.edit', $row->id).'" class="edit btn btn-primary btn-sm me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a> ';
                        $btn .= '<form action="'.route('team.destroy', $row->id).'" method="POST" style="display:inline;">
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

        return view('admin.team.index', compact('settings')); // adjust view name as needed
    }


    public function create()
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.team.create', compact('settings')); // adjust view name as needed
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:teams,slug',
            'title'       => 'required|string|max:255',
            'message'     => 'nullable|string',
            'designation' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort'        => 'nullable|integer',
            'facebook'    => 'nullable|url',
            'twitter'     => 'nullable|url',
            'linkedin'    => 'nullable|url',
            'instagram'   => 'nullable|url',
            'youtube'     => 'nullable|url',
            'email'       => 'nullable|email|max:255',
            'phone'       => 'nullable|string|max:20',
            'address'     => 'nullable|string|max:255',
            'status'      => 'required|boolean',
        ]);

        /* --------- মান সেট করছি আপনার পুরনো ভঙ্গিতেই ---------- */
        $team              = new Team();
        $team->name        = $request->name;
        $team->slug        = $request->slug;
        $team->title       = $request->title;
        $team->message     = $request->message;
        $team->designation = $request->designation;
        $team->sort        = $request->sort;

        /* সোশ্যাল লিঙ্কগুলো */
        $team->facebook = $request->facebook;
        $team->twitter  = $request->twitter;
        $team->linkedin = $request->linkedin;
        $team->instagram= $request->instagram;
        $team->youtube  = $request->youtube;

        /* কনট্যাক্ট ইনফো */
        $team->email   = $request->email;
        $team->phone   = $request->phone;
        $team->address = $request->address;

        $team->status  = $request->status;

        /* ইমেজ আপলোড (যদি থাকে) */
        if ($request->hasFile('image')) {
            $team->image = $this->uploadImage($request->file('image'));   // নিজস্ব helper
        }

        $team->save();

        return redirect()->route('team.index')
                        ->with('success', 'Team member created successfully.');
    }

    public function edit(Team $team)
    {
        $settings = Setting::query()->pluck("value", "setting_name")->toArray();
        return view('admin.team.edit', compact('team', 'settings')); // adjust view name as needed
    }


    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:teams,slug,' . $team->id,
            'title'       => 'required|string|max:255',
            'message'     => 'nullable|string',
            'designation' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort'        => 'nullable|integer',
            'facebook'    => 'nullable|url',
            'twitter'     => 'nullable|url',
            'linkedin'    => 'nullable|url',
            'instagram'   => 'nullable|url',
            'youtube'     => 'nullable|url',
            'email'       => 'nullable|email|max:255',
            'phone'       => 'nullable|string|max:20',
            'address'     => 'nullable|string|max:255',
            'status'      => 'required|boolean',
        ]);

        $team->name        = $request->name;
        $team->slug        = $request->slug;
        $team->title       = $request->title;
        $team->message     = $request->message;
        $team->designation = $request->designation;
        $team->sort        = $request->sort;

        $team->facebook    = $request->facebook;
        $team->twitter     = $request->twitter;
        $team->linkedin    = $request->linkedin;
        $team->instagram   = $request->instagram;
        $team->youtube     = $request->youtube;

        $team->email       = $request->email;
        $team->phone       = $request->phone;
        $team->address     = $request->address;

        $team->status      = $request->status;

        // ইমেজ আপডেট (যদি নতুন ছবি থাকে)
        if ($request->hasFile('image')) {
            // পুরানো ছবি ডিলিট করতে চাইলে এখানে কোড লিখুন (যদি থাকে)
            $team->image = $this->uploadImage($request->file('image'));
        }

        $team->save();

        return redirect()->route('team.index')
                        ->with('success', 'Team member updated successfully.');
    }




 public function destroy(Team $team): RedirectResponse
    {
        try {
            if ($team->image && Storage::exists('uploads/teams/' . $team->image)) {
                Storage::delete('uploads/teams/' . $team->image);
            }

            $team->delete();

            return back()->with('success', 'team deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting team: ' . $e->getMessage());
        }
    }




}
