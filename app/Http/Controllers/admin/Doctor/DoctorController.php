<?php

namespace App\Http\Controllers\admin\Doctor;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.doctors.index', [
            'doctors' => Doctor::with('user')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctors.create', [
            'doctors' => Doctor::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
            'specialization' => ['required'],
            'phone_number' => ['required', 'unique:doctors,phone_number'],
            'experience' => ['required'],
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'type' => 'Doctor',
            'password' => Hash::make($request->password),
        ];
        $is_created = User::create($data);
        if ($is_created) {
            $id = $is_created->id;
            $data = [
                'user_id' => $id,
                'specialization' => $request->specialization,
                'phone_number' => $request->phone_number,
                'experience' => $request->experience,
            ];
            $is_created = Doctor::create($data);
            if ($is_created) {
                return back()->with(['success' => 'Data successfully created!']);
            } else {
                return back()->with(['failure' => 'Failed to create!']);
            }
        } else {
            return back()->with(['failure' => 'Failed to create!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return  view('admin.doctors.show', [
            'doctor' => $doctor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctor.edit', [
            'doctor' => $doctor,
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update_details(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $doctor->user_id],
            'experience' => ['required'],
            'specialization' =>['required'],
            'phone_number' => ['required' , 'unique:doctors,phone_number,' . $doctor->id ],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $is_updated =$doctor->user->update($data);

        if ($is_updated) {
        //  $id = $is_updated->id;
            $data = [
                'specialization' => $request->specialization,
                'phone_number' => $request->phone_number,
                'experience' => $request->experience,
            ];
            $is_updated = $doctor->update($data);
            if ($is_updated) {
                return back()->with(['success' => 'Data successfully updated!']);
            } else {
                return back()->with(['failure' => 'Failed to update!']);
            }
        } else {
            return back()->with(['failure' => 'Failed to update!']);
        }
    }

    public function update_password(Request $request, Doctor $doctor)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],

        ]);

        $data = [
            'password' => Hash::make($request->password),
        ];

        $is_updated = $doctor->user->update($data);

        if ($is_updated) {
            return back()->with(['success' => 'User password has been successfully updated!']);
        } else {
            return back()->with(['failure' => 'User password has failed to update!']);
        }
    }


    public function update_picture(Request $request, Doctor $doctor)
    {
        $request->validate([
            'picture' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        if (!empty($doctor->user->picture)) {
            unlink('template/img/photos/admin_doctor/' . $doctor->user->picture);
        }

        // $oldPicturePath = public_path('template/img/photos/admin_doctor/' . $doctor->user->picture);

        // if (file_exists($oldPicturePath)) {
        //     unlink($oldPicturePath);
        // }
        $file_name = "ACI-" . microtime(true) . "." . $request->picture->extension();

        if ($request->picture->move(public_path('template/img/photos/admin_doctor/'), $file_name)) {
            $data = [
                'picture' => $file_name,
            ];

            $is_updated = $doctor->user->update($data);

            if ($is_updated) {
                return back()->with(['success' => 'Profile picture has been successfully updated!']);
            } else {
                return back()->with(['failure' => 'Profile picture has failed to update!']);
            }
        } else {
            return back()->with(['failure' => 'Profile picture has failed to upload!']);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $is_deleted = $doctor->user->delete();

        if ($is_deleted) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }
}
