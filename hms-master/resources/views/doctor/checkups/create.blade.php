@extends('layouts.doctor_main')
@section('title', 'Check-Up')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <h2>Checkups</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('doctor.appointments') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('doctor.checkup.create', $appointment ) }}" method="POST">
                                @include('partials.alerts')
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="symptoms" class="form-label">Symptoms</label>
                                            <textarea class="form-control @error('symptoms') is-invalid @enderror " name="symptoms" id="symptoms" cols="3"></textarea>
                                            @error('symptoms')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="disease" class="form-label">Disease</label>
                                            <textarea class="form-control @error('disease') is-invalid @enderror" name="disease" id="disease" cols="3"></textarea>
                                            @error('disease')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="medications" class="form-label">Medications</label>
                                            <textarea class="form-control @error('medications') is-invalid @enderror " name="medications" id="medications" cols="3"></textarea>
                                            @error('medications')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="precautions" class="form-label">Precautions</label>
                                            <textarea class="form-control @error('precautions') is-invalid @enderror" name="precautions" id="precautions" cols="3"></textarea>
                                            @error('precautions')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tests" class="form-label">Tests</label>
                                            <textarea class="form-control @error('tests') is-invalid @enderror " name="tests" id="tests" cols="3"></textarea>
                                            @error('tests')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-primary" value="Save">
                                            <input type="reset" class="btn btn-primary" value="Reset">
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
