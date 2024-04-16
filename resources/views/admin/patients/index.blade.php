@extends('layouts.main')
@section('title', 'Patients')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Patients</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.patient.create') }}" class="btn btn-outline-primary">Add Patient</a>
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
                                                <td>{{ $patient->user->name }}</td>

                                                <td>{{ $patient->cnic }}</td>
                                                <td>{{ $patient->phone_number }}</td>
                                                <td>{{ $patient->gender }}</td>
                                                <td>
                                                    <a href="{{ route('admin.patient.show', $patient) }}"
                                                        class="btn btn-primary">Show</a>
                                                    <form action="{{ route('admin.patient.destroy', $patient) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                    </form>
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
