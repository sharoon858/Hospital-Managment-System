@extends('layouts.main')
@section('title', 'Add Appointment')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <h2>Add Appointment</h2>
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
                            {{-- <form action="{{ route('admin.appointment.edit') }}" method="post"> --}}
                            @csrf
                            @method('PATCH')
                            <h3 class="mb-3">Patient Details </h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"> Patient Name</label>
                                        <p class="form-control">{{ $appointment->patient->user->name }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="age" class="form-label">Age</label>
                                        <p class="form-control">{{ $appointment->patient->age }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <p class="form-control">{{ $appointment->patient->gender }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <p class="form-control">{{ $appointment->patient->user->email }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <p class="form-control">{{ $appointment->patient->phone_number }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="cnic" class="form-label">CNIC</label>
                                        <p class="form-control">{{ $appointment->patient->cnic }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Description</label>
                                    <p class="form-control">{{ $appointment->description }}</p>
                                </div>
                            </div>
                            <h3 class="my-3">
                                Doctor Details
                            </h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Doctor Name</label>
                                        <p class="form-control">{{ $appointment->doctor->user->name }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="specialization" class="form-label">Specialization</label>
                                        <p class="form-control">{{ $appointment->doctor->specialization }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="experience" class="form-label">Experience</label>
                                        <p class="form-control">{{ $appointment->doctor->experience }}</p>
                                    </div>
                                </div>
                            </div>

                            <h3 class="my-3">
                                Appointment Details
                            </h3>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date</label>
                                        <p class="form-control">{{ $appointment->date }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="time" class="form-label">Time</label>
                                        <p class="form-control">{{ $appointment->time }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="fee" class="form-label">Fee</label>
                                        <p class="form-control">{{ $appointment->fee }}</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
@endsection
