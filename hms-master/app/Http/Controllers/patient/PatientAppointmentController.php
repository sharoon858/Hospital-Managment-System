<?php

namespace App\Http\Controllers\patient;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PatientAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::where('patient_id', '=', Auth::user()->patient->id)->get();


        // foreach ($patients as $patient) {
        //     echo $patient->patient->user->name . "<br>";
        //     echo $patient->patient->user->email . "<br>";
        // };
        return view('patient.appointments.index', [
            'appointments' => $appointments,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.appointments.create', [
            'patients' => Patient::all(),
            'doctors' => Doctor::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'doctor_id' => ['required'],
                'description' => ['required'],
                'date' => ['required'],
                'time' => ['required'],
                'fee' => ['required'],
            ]);

            $data = [
                'patient_id' => Auth::user()->patient->id,
                'doctor_id' => $request->doctor_id,
                'status' => 'pending',
                'description' => $request->description,
                'date' => $request->date,
                'time' => $request->time,
                'fee' => $request->fee,
            ];
            $existingAppointment = Appointment::where('date', $request->date)
            ->where('time', $request->time)
            ->first();

        if ($existingAppointment) {
            return back()->with(['failure' => 'An appointment already exists at this date and time.']);
        }

            $is_created = Appointment::create($data);
            if ($is_created) {
                return back()->with(['success' => 'Data successfully created!']);
            } else {
                return back()->with(['failure' => 'Failed to create!']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return  view('patient.appointments.show', [
            'appointment' => $appointment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        return view('patient.appointments.edit' , [
            'appointment'=>$appointment,
            'patients' => Patient::all(),
            'doctors' => Doctor::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([

            'doctor_id' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'fee' => ['required'],
        ]);



        $data = [
            'patient_id' => Auth::user()->patient->id,
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

    /**
     * Remove the specified resource from storage.
     */
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
