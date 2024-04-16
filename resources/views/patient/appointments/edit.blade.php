@extends('layouts.patient_main')
@section('title', 'Edit Appointment')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <h2>Edit Appointment</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.appointments') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')

                            <form action="{{ route('patient.appointment.edit', $appointment) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <h3 class="mb-3">Patient Details </h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="patient_id" class="form-label"> Patient Name</label>
                                            <p class="form-control">{{ Auth::user()->patient->user->name }}</p>
                                            {{-- <select class="form-select" id="patient_id" name="patient_id">
                                                <option value="">Select Patient</option>
                                                @foreach ($patients as $patient)
                                                    <option value="{{ $patient->id }}"
                                                        {{ $patient->id == old('patient_id', $appointment->patient_id) ? 'selected' : '' }}>
                                                        {{ $patient->user->name }}
                                                    </option>
                                                @endforeach
                                            </select> --}}
                                            @error('patient_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="doctor_id" class="form-label">Doctor Name</label>
                                            <select class="form-select" id="doctor_id" name="doctor_id">
                                                <option value="">Select Doctor</option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}"
                                                        {{ $doctor->id == old('doctor_id', $appointment->doctor_id) ? 'selected' : '' }}>
                                                        {{ $doctor->user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('doctor_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                id="date" name="date"
                                                value="{{ old('date') ?? $appointment->date }}">
                                        </div>
                                        @error('date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="time" class="form-label">Time</label>
                                            <input type="time" class="form-control @error('time') is-invalid @enderror"
                                                id="time" name="time"
                                                value="{{ old('time') ?? $appointment->time }}">
                                        </div>
                                        @error('time')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="fee" class="form-label">Fee</label>
                                            <input type="text" class="form-control @error('fee') is-invalid @enderror"
                                                id="fee" name="fee"
                                                value="{{ old('fee') ?? $appointment->fee }}">
                                        </div>
                                        @error('fee')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text"
                                            class="form-control @error('description') is-invalid @enderror" id="description"
                                            name="description" placeholder="Enter your description!"
                                            value="{{ old('description') ?? $appointment->description }}">
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
