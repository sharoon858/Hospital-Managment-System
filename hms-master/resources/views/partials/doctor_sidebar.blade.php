<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('doctor.dashboard') }}">
            <span class="align-middle">Doctors</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('doctor.dashboard') }}">
                    <i class="align-middle " data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.doctor') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Doctors</span>
                </a>
            </li> --}}

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('doctor.patient') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Patients</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('doctor.appointments') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Appointments</span>
                </a>
            </li>

          
        </ul>
    </div>
</nav>
