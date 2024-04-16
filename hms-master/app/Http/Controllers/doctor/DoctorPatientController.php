<?php

namespace App\Http\Controllers\doctor;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DoctorPatientController extends Controller
{
    public function index()
    {
        $patients = Appointment::where('doctor_id', '=', Auth::user()->doctor->id)
            ->select('patient_id') // Select only the 'patient_id`' column
            ->distinct() // Apply the DISTINCT constraint
            ->get();
        return view('doctor.patients.index', [
            'patients' => $patients,

        ]);
    }

    public function show(Patient $patient)
    {
        return view('doctor.patients.show' , [
            'patient' => $patient,
        ]);

    }
}
