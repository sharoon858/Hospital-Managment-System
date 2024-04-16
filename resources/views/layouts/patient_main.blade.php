<!DOCTYPE html>
<html lang="en">


@include('partials.head')

<body>
    <div class="wrapper">
        @include('partials.patient_sidebar')

        <div class="main">
            @include('partials.patient_topbar')

            @yield('content')


        </div>
    </div>

    <script src="{{ asset('template/js/app.js') }}"></script>

</body>

</html>
