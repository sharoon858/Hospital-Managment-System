<?php

namespace App\Http\Controllers\admin\Patient;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.patients.index', [
            'patients' => Patient::with('user')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.patients.create', [
            'patients' => Patient::all(),
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
            'age' => ['required'],
            'height' => ['required'],
            'weight' => ['required'],
            'gender' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required', 'unique:patients,phone_number'],
            'cnic' => ['required', 'unique:patients,cnic'],

        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'type' => 'Patient',
            'password' => Hash::make($request->password),
        ];
        $is_created = User::create($data);
        if ($is_created) {
            $id = $is_created->id;
            $data = [
                'user_id' => $id,
                'age' => $request->age,
                'height' => $request->height,
                'weight' => $request->weight,
                'gender' => $request->gender,
                'cnic' => $request->cnic,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
            ];
            $is_created = Patient::create($data);
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
    public function show(Patient $patient)
    {
        return  view('admin.patients.show', [
            'patient' => $patient,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('admin.patient.edit', [
            'patient' => $patient,
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update_details(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,'  . $patient->user_id],
            'age' => ['required'],
            'height' => ['required'],
            'weight' => ['required'],
            'gender' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required', 'unique:patients,phone_number,'  . $patient->id],
            'cnic' => ['required', 'unique:patients,cnic,'  . $patient->id],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $is_updated = $patient->user->update($data);

        if ($is_updated) {
            $data = [
                'age' => $request->age,
                'height' => $request->height,
                'weight' => $request->weight,
                'gender' => $request->gender,
                'cnic' => $request->cnic,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
            ];
            $is_updated = $patient->update($data);
            if ($is_updated) {
                return back()->with(['success' => 'Data successfully updated!']);
            } else {
                return back()->with(['failure' => 'Failed to update!']);
            }
        } else {
            return back()->with(['failure' => 'Failed to update!']);
        }
    }

    public function update_password(Request $request, Patient $patient)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],

        ]);

        $data = [
            'password' => Hash::make($request->password),
        ];

        $is_updated = $patient->user->update($data);

        if ($is_updated) {
            return back()->with(['success' => 'User password has been successfully updated!']);
        } else {
            return back()->with(['failure' => 'User password has failed to update!']);
        }
    }


    public function update_picture(Request $request, Patient $patient)
    {
        $request->validate([
            'picture' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);
        if (!empty($patient->user->picture)) {
            unlink('template/img/photos/admin_patient/' . $patient->user->picture);
        }

        // $oldPicturePath = public_path('template/img/photos/admin_pateint/' . $patient->user->picture);

        // if (file_exists($oldPicturePath)) {
        //     unlink($oldPicturePath);
        // }
        $file_name = "ACI-" . microtime(true) . "." . $request->picture->extension();

        if ($request->picture->move(public_path('template/img/photos/admin_patient/'), $file_name)) {
            $data = [
                'picture' => $file_name,
            ];

            $is_updated = $patient->user->update($data);

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
    public function destroy(Patient $patient)
    {
        $is_deleted = $patient->user->delete();

        if ($is_deleted) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }
}
