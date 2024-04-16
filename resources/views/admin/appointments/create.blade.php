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

                            <form action="{{ route('admin.appointment.create') }}" method="post">
                                @csrf
                                @method('PATCH')
                                {{-- <h3 class="mb-3">Patient Details </h3> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="patient_id" class="form-label"> Patient Name</label>
                                            <select class="form-select" id="patient_id" name="patient_id">
                                                <option value="">Select Patient</option>
                                                <!-- Loop through the list of doctor names from the database -->
                                                @foreach ($patients as $patient)
                                                    <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                                                @endforeach
                                            </select>
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
                                                <!-- Loop through the list of doctor names from the database -->
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('doctor_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="age" class="form-label">Age</label>
                                            <input type="text" class="form-control @error('age') is-invalid @enderror"
                                                id="age" name="age" placeholder="Enter your age!"
                                                value="{{ old('age') }}">
                                            @error('age')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <input type="text" class="form-control @error('gender') is-invalid @enderror"
                                                id="gender" name="gender" placeholder="Enter your gender!"
                                                value="{{ old('gender') }}">
                                            @error('gender')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="row">
                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="Enter your email!"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="phone_number" class="form-label">Phone Number</label>
                                            <input type="text"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                id="phone_number" name="phone_number" placeholder="Enter your phone number!"
                                                value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="cnic" class="form-label">CNIC</label>
                                            <input type="text" class="form-control @error('cnic') is-invalid @enderror"
                                                id="cnic" name="cnic" placeholder="Enter your cnic!"
                                                value="{{ old('cnic') }}">
                                            @error('cnic')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>


                                {{-- <h3 class="my-3">
                                    Doctor Details
                                </h3> --}}
                                <div class="row">


                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="specialization" class="form-label">Specialization</label>
                                            <input type="text" class="form-control @error('specialization') is-invalid @enderror"
                                                id="specialization" name="specialization" placeholder="Enter specialization"
                                                value="{{ old('specialization') }}">
                                            @error('specialization')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="experience" class="form-label">Experience</label>
                                            <input type="text" class="form-control @error('experience') is-invalid @enderror"
                                                id="experience" name="experience" placeholder="Enter experience"
                                                value="{{ old('experience') }}">
                                            @error('experience')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>

                                {{-- <h3 class="my-3">
                                    Appointment Details
                                </h3> --}}

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                id="date" name="date">
                                        </div>
                                        @error('date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="time" class="form-label">Time</label>
                                            <input type="time" class="form-control @error('time') is-invalid @enderror"
                                                id="time" name="time">
                                        </div>
                                        @error('time')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="fee" class="form-label">Fee</label>
                                            <input type="text" class="form-control @error('fee') is-invalid @enderror"
                                                id="fee" name="fee">
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
                                            value="{{ old('description') }}">
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-primary" value="Save">
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
