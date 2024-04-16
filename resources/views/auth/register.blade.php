<!DOCTYPE html>
<html lang="en">

@section('title', 'Register')
@include('partials.head')

<body>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>

                                        <form class="mx-1 mx-md-4">
                                            @include('partials.alerts')

                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="name" id="name" placeholder="Enter your name!"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" id="email" placeholder="Enter your email!"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" id="password" placeholder="Enter your password!">
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Password
                                                    Confirmation</label>
                                                <input type="password" class="form-control" name="password_confirmation"
                                                    id="password_confirmation" placeholder="Confirm your password!">
                                            </div>

                                            <div class="mb-3">
                                                <input type="submit" name="submit" value="Register"
                                                    class="btn btn-primary">
                                                <input type="reset" value="Reset" class="btn btn-dark">
                                            </div>
                                        </form>

                                    </div>
                                    <div
                                        class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                        <img src="https://infyhms.sgp1.cdn.digitaloceanspaces.com/298/Home.png"
                                            class="img-fluid" alt="Sample image">


                                    </div>
                                </div>
                                <div>
                                    Already have an account? <a href="{{ route('login') }}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </form>
    </div>
</body>

</html>
