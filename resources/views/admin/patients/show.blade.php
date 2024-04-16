@extends('layouts.main')
@section('title', 'Patient')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <h2>Patient</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.patient') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>
            @include('partials.alerts')

            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3">
                        <!-- Picture Form -->
                        <form action="{{ route('admin.patient.picture', $patient) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h5 class="card-title mb-0">Profile Picture</h5>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{ asset('template/img/photos/admin_patient/' . $patient->user->picture) }}"
                                    alt="{{ $patient->user->name }}" class="img-fluid rounded-circle mb-2" width="150"
                                    height="150" />
                                <input type="file" class="form-control @error('picture') is-invalid @enderror"
                                    id="picture" name="picture">
                                @error('picture')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </div>
                        </form>

                        <!-- Password Form -->
                        <form action="{{ route('admin.patient.password', $patient) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Enter your password!">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                        <input type= "password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Confirm your password!">

                                    </div>
                                    <div class="mt-3 text-center">
                                        <input type="submit" class="btn btn-primary" value="Save">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8 col-xl-9">
                    <!-- Details Form -->
                    <form action="{{ route('admin.patient.details', $patient) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Enter your name"
                                        value="{{ old('name') ?? $patient->user->name }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Enter your email!"
                                        value="{{ old('email') ?? $patient->user->email }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="male" {{ (old('gender') == 'male' || $patient->gender == 'male') ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ (old('gender') == 'female' || $patient->gender == 'female') ? 'selected' : '' }}>Female</option>
                                        <option value="rather_not_say" {{ (old('gender') == 'rather_not_say' || $patient->gender == 'rather_not_say') ? 'selected' : '' }}>Rather Not Say</option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="cnic" class="form-label">CNIC</label>
                                    <input type="text" class="form-control @error('cnic') is-invalid @enderror"
                                        id="cnic" name="cnic" placeholder="Enter your CNIC!"
                                        value="{{ old('cnic') ?? $patient->cnic }}">
                                    @error('cnic')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="text" class="form-control @error('age') is-invalid @enderror"
                                        id="age" name="age" placeholder="Enter your age!"
                                        value="{{ old('age') ?? $patient->age }}">
                                    @error('age')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="height" class="form-label">Height</label>
                                    <input type="text" class="form-control @error('height') is-invalid @enderror"
                                        id="height" name="height" placeholder="Enter your height!"
                                        value="{{ old('height') ?? $patient->height }}">
                                    @error('height')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="text" class="form-control @error('weight') is-invalid @enderror"
                                        id="weight" name="weight" placeholder="Enter your weight!"
                                        value="{{ old('weight') ?? $patient->weight }}">
                                    @error('weight')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                        id="phone_number" name="phone_number" placeholder="Enter your phone number!"
                                        value="{{ old('phone_number') ?? $patient->phone_number }}">
                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" placeholder="Enter your address!"
                                        value="{{ old('address') ?? $patient->address }}">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 text-center">
                                    <div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
