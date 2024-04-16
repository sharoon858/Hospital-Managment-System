<?php

namespace App\Http\Controllers\doctor;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DoctorAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('doctor_id', '=', Auth::user()->doctor->id)->get();

        // foreach ($patients as $patient) {
        //     echo $patient->patient->user->name . "<br>";
        //     echo $patient->patient->user->email . "<br>";
        // };
        return view('doctor.appointments.index', [
            'appointments' => $appointments,

        ]);
    }

    public function show(Appointment $appointment)
    {
        return  view('doctor.appointments.show', [
            'appointment' => $appointment,
        ]);
    }

    public function updateStatus(Appointment $appointment, $status)
    {
        $data = [
            'status' => $status,
        ];

        $is_updated = $appointment->update($data);
        if ($is_updated) {
            return back()->with(['success' => 'Appointment Approved']);
        } else {
            return back()->with(['failure' => "Appointment Declined"]);
        }
    }
}
