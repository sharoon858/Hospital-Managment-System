@extends('layouts.main')
@section('title', 'Doctor')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <h2>Doctor</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.doctor') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            @include('partials.alerts')

            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3">
                        <!-- Picture Form -->
                        <form action="{{ route('admin.doctor.picture', $doctor) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h5 class="card-title mb-0">Profile Picture</h5>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{ asset('template/img/photos/admin_doctor/' . $doctor->user->picture) }}"
                                    alt="{{ $doctor->user->name }}" class="img-fluid rounded-circle mb-2" width="150" height="150" />
                                <input type="file" class="form-control @error('picture') is-invalid @enderror" id="picture" name="picture">
                                @error('picture')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </div>
                        </form>

                        <!-- Password Form -->
                        <form action="{{ route('admin.doctor.password', $doctor) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password!">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password!">
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
                    <form action="{{ route('admin.doctor.details', $doctor) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name" value="{{ old('name') ?? $doctor->user->name }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email!" value="{{ old('email') ?? $doctor->user->email }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="experience" class="form-label">Experience</label>
                                    <input type="text" class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" placeholder="Enter your experience!" value="{{ old('experience') ?? $doctor->experience }}">
                                    @error('experience')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="specialization" class="form-label">Specialization</label>
                                    <input type="text" class="form-control @error('specialization') is-invalid @enderror" id="specialization" name="specialization" placeholder="Enter your specialization!" value="{{ old('specialization') ?? $doctor->specialization }}">
                                    @error('specialization')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Enter your phone_number!" value="{{ old('phone_number') ?? $doctor->phone_number }}">
                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
