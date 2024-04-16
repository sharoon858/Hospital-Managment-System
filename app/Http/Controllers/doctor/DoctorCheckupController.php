<?php

namespace App\Http\Controllers\doctor;

use App\Models\Checkup;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DoctorCheckupController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Appointment $appointment)
    {

        return view('doctor.checkups.create', [
            'appointment' => $appointment,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Appointment $appointment)
    {
        if (($appointment->status === 'Declined') || ($appointment->status === 'pending')) {
            return back()->with(['failure' => 'Cannot create a checkup for a declined appointment']);
        }
        $request->validate([
            'symptoms' => ['required'],
            'disease' => ['required'],
            'medications' => ['required'],
        ]);
        $data = [
            'patient_id' => $appointment->patient_id,
            'appointment_id' => $appointment->id,
            'symptoms' => $request->symptoms,
            'disease' => $request->disease,
            'medications' => $request->medications,
            'precautions' => $request->precautions,
            'tests' => $request->tests,
        ];
        $is_created = Checkup::create($data);
        if ($is_created) {
            return back()->with(['success' => 'Checkup has been created successfully']);
        } else {
            return back()->with(['failure' => "Failed to create checkup"]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
