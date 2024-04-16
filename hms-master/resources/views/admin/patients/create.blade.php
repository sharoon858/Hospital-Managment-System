@extends('layouts.main')
@section('title', 'Add Patient')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Add Patient</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.patient') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('admin.patient.create') }}" method="post">
                                @csrf
                                @method('PATCH')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Enter your name!"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Enter your email!"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Enter your password!">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation"
                                        placeholder="Confirm your password!">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="cnic" class="form-label">Cnic</label>
                                    <input type="text" class="form-control @error('cnic') is-invalid @enderror"
                                        id="cnic" name="cnic" placeholder="Enter your cnic!"
                                        value="{{ old('cnic') }}">
                                    @error('cnic')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="age" class="form-label">age</label>
                                    <input type="text" class="form-control @error('age') is-invalid @enderror"
                                        id="age" name="age" placeholder="Enter your age!"
                                        value="{{ old('age') }}">
                                    @error('age')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="text" class="form-control @error('weight') is-invalid @enderror"
                                        id="weight" name="weight" placeholder="Enter your weight!"
                                        value="{{ old('weight') }}">
                                    @error('weight')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="height" class="form-label">Height</label>
                                    <input type="text" class="form-control @error('height') is-invalid @enderror"
                                        id="height" name="height" placeholder="Enter your height!"
                                        value="{{ old('height') }}">
                                    @error('height')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" @if(old('gender') == 'male') selected @endif>Male</option>
                                        <option value="female" @if(old('gender') == 'female') selected @endif>Female</option>
                                        <option value="rather_not_say" @if(old('gender') == 'rather_not_say') selected @endif>Rather not say</option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                        id="phone_number" name="phone_number" placeholder="Enter your phone_number!"
                                        value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" placeholder="Enter your address!"
                                        value="{{ old('address') }}">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>


                                <div>
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
