@extends('layouts.main')
@section('title', 'Doctors')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Doctors</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.doctor.create') }}" class="btn btn-outline-primary">Add Doctor</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($doctors) > 0)
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>Experience</th>
                                            <th>Specialization</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $doctor->user->name }}</td>

                                                <td>{{ $doctor->experience }}</td>
                                                <td>{{ $doctor->specialization }}</td>
                                                <td>
                                                    <a href="{{ route('admin.doctor.show', $doctor) }}"
                                                        class="btn btn-primary">Show</a>
                                                    <form action="{{ route('admin.doctor.destroy', $doctor) }}"
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
