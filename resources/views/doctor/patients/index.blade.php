@extends('layouts.doctor_main')
@section('title', 'Patients')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <h2>Patients</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($patients) > 0)
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>CNIC</th>
                                            <th>Phone Number</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $patient->patient->user->name }}</td>

                                                <td>{{ $patient->patient->cnic }}</td>
                                                <td>{{ $patient->patient->phone_number }}</td>
                                                <td>{{ $patient->patient->gender }}</td>

                                                <td class="text-center">
                                                    <a href="{{ route('doctor.patient.show', $patient->patient) }}" class="btn btn-primary">Show</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="row justify-content-end">
                                    <div class="col-auto">
                                        {{ $doctor->links('vendor.pagination.bootstrap-5') }}
                                    </div>
                                </div> --}}
                            @else
                                <div class="alert alert-info">No record found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
