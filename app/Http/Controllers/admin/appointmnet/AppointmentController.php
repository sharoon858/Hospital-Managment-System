<?php

namespace App\Http\Controllers\admin\appointmnet;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('admin.appointments.index', [
            'appointments' => Appointment::all(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.appointments.create', [
            'patients' => Patient::all(),
            'doctors' => Doctor::all(),

        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => ['required'],
            'doctor_id' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'fee' => ['required'],
        ]);

        // Check for existing appointments with the same date and time
        $existingAppointment = Appointment::where('date', $request->date)
            ->where('time', $request->time)
            ->first();

        if ($existingAppointment) {
            return back()->with(['failure' => 'An appointment already exists at this date and time.']);
        }

        $data = [
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'fee' => $request->fee,
            'status' => 'Approved',
        ];

        $is_created = Appointment::create($data);

        if ($is_created) {
            return back()->with(['success' => 'Data successfully created!']);
        } else {
            return back()->with(['failure' => 'Failed to create!']);
        }
    }


    public function show(Appointment $appointment)
    {
        return  view('admin.appointments.show', [
            'appointment' => $appointment,
        ]);
    }

    public function edit(Appointment $appointment)
    {
        return view('admin.appointments.edit', [
            'appointment' => $appointment,
            'patients' => Patient::all(),
            'doctors' => Doctor::all(),
        ]);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => ['required'],
            'doctor_id' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'fee' => ['required'],
        ]);

        $data = [
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'fee' => $request->fee,
        ];

        $is_updated = $appointment->update($data);

        if ($is_updated) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }



    public function destroy(Appointment $appointment)
    {
        $is_deleted = $appointment->delete();

        if ($is_deleted) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }
}
