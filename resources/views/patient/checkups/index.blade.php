@extends('layouts.patient_main')
@section('title', 'Patient')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Medical history</h2>
                </div>

            </div>
            @include('partials.alerts')

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if ($checkups->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Appointment Date</th>
                                    <th>Symptom</th>
                                    <th>Disease</th>
                                    <th>Medications</th>
                                    <th>Precautions</th>
                                    <th>Tests</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($checkups as $checkup)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $checkup->appointment->date }}</td>
                                        <td>{{ $checkup->symptoms }}</td>
                                        <td>{{ $checkup->disease }}</td>
                                        <td>{{ $checkup->medications }}</td>
                                        <td>{{ $checkup->precautions }}</td>
                                        <td>{{ $checkup->tests }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-danger text-center">Appointment declined or pending</div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

