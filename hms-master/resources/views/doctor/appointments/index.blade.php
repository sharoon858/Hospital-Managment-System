@extends('layouts.doctor_main')
@section('title', 'Appointments')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <h2>Appointments</h2>
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
                                        <tr class="text-center">
                                            <th>Sr. No.</th>
                                            <th>Patient Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Fee</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $appointment->patient->user->name }}</td>

                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->time }}</td>
                                                <td>{{ $appointment->fee }}</td>
                                                <td>{{ $appointment->description }}</td>
                                                <td class="text-center">
                                                    {{ $appointment->status }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('doctor.appointment.show', $appointment) }}"
                                                        class="btn btn-primary">Show</a>
                                                   @if ($appointment->status == 'pending')
                                                    <a href="{{ route('doctor.appointment.updateStatus', [$appointment, 'Approved']) }}" class="btn btn-outline-success">Accept</a>
                                                    <a href="{{ route('doctor.appointment.updateStatus', [$appointment, 'Declined']) }}" class="btn btn-outline-danger">Decline</a>
                                                    @else

                                                    @endif
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
