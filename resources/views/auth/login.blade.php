@extends('base')

@section('title', 'Login')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h1 class="text-center text-muted mb-3 mt-5">Please sign in</h1>
                <p class="text-center text-muted mb-5">Your articles are waiting for you</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif

                    @if (Session::has('warning'))
                        <div class="alert alert-warning" role="alert">
                            {{ Session::get('warning') }}
                        </div>
                    @endif

                    @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control mb-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                        placeholder="Enter your eamil" autocomplete="email" autofocus>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control mb-3 @error('password') is-invalid @enderror" value="{{ old('password') }}"
                        required placeholder="Enter your password" autocomplete="current-password">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="remember"
                                    name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div </div>
                            <div class="col-md text-end">
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary my-3 w-100">Sign in</button>
                        <p class="text-center text-muted my-3">Not registered yet? <a href="{{ route('register') }}">Create
                                an account</a></p>
                </form>
            </div>
        </div>
    </div>

@endsection
