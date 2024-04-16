@extends('layouts.main')
@section('title', 'Appointments')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Appointments</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.appointment.create') }}" class="btn btn-outline-primary">Book An Appointment</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($appointments) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Patient Name</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Time Slot</th>
                                            <th>Fee</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $appointment->patient->user->name }}</td>

                                                <td>{{ $appointment->doctor->user->name }}</td>
                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->time  }}</td>
                                                <td>{{ $appointment->fee }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.appointment.show' , $appointment) }}" class="btn btn-primary">Show</a>
                                                    <form action="{{ route('admin.appointment.destroy' ,  $appointment) }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                    </form>
                                                    <a href="{{ route('admin.appointment.edit' , $appointment) }}" class="btn btn-primary">Edit</a>
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
