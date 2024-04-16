<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <span class="align-middle">Admins</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle " data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.doctor') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Doctors</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.patient') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Patients</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('admin.appointments') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Appointments</span>
                </a>
            </li>

            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Medics</span>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
