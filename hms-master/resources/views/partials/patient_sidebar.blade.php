<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('patient.dashboard') }}">
            <span class="align-middle">Patients</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('patient.dashboard') }}">
                    <i class="align-middle " data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('patient.appointments') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Appointments</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('patient.checkups') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Medical history</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
