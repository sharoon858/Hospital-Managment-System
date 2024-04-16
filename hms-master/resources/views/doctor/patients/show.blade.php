@extends('layouts.doctor_main')
@section('title', 'Patient')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <h2>Patient Details</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('doctor.patient') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>
            @include('partials.alerts')

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <p class="form-control">{{ $patient->user->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="age" class="form-label">Age </label>
                                <p class="form-control">{{ $patient->age }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="cnic" class="form-label">CNIC</label>
                                <p class="form-control">{{ $patient->cnic }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <p class="form-control">{{ $patient->gender }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <p class="form-control">{{ $patient->user->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="phone_number" class="form-label"> Phone Number</label>
                                <p class="form-control">{{ $patient->phone_number }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <h2>Medical history</h2>
                </div>

            </div>
            @include('partials.alerts')

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if ($patient->checkup->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Appointment Date</th>
                                    <th>Symptom</th>
                                    <th>Disease</th>
                                    <th>Medications</th>
                                    <th>Precautions</th>
                                    <th>Tests</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- @dump($patient->appointments) --}}
                                @foreach ($patient->appointments as $appointment)
                                {{-- @dd($appointment->checkup->symptoms) --}}
                                @if ($appointment->checkup)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ $appointment->checkup->symptoms }}</td>
                                    <td>{{ $appointment->checkup->disease }}</td>
                                    <td>{{ $appointment->checkup->medications }}</td>
                                    <td>{{ $appointment->checkup->precautions }}</td>
                                    <td>{{ $appointment->checkup->tests }}</td>
                                </tr>
                                
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-danger">Appointment declined or pending</div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
