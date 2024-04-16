<?php

namespace App\Http\Controllers\patient;

use App\Models\Checkup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PatientCheckupController extends Controller
{
    public function index()
    {
        $patientId = Auth::user()->patient->id;
        $checkups = Checkup::where('patient_id', $patientId)->get();

        return view('patient.checkups.index', [
            'checkups' => $checkups,
        ]);
    }
}
