@extends('base')

@section('title', 'Acount activation')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h1 class="text-center text-muted mb-3 mt-5">Acount activation</h1>

                {{-- Message warning --}}
                @if (Session::has('warning'))
                    <div class="alert alert-warning" role="alert">
                        {{ Session::get('warning') }}
                    </div>
                @endif

                {{-- Message danger --}}
                @if (Session::has('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('danger') }}
                    </div>
                @endif

                {{-- Message success --}}
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <form action="{{ route('app_activation_code', ['token' => $token]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="activation-code" class="form-label">Activation code</label>
                        <input type="text" name="activation-code"
                            class="form-control @if (Session::has('danger')) is-invalid @endif" id="activation-code"
                            value="@if (Session::has('activation_code')) {{ Session::get('activation_code') }} @endif" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('app_activation_account_change_email', ['token' => $token]) }}">Change your
                                email address</a>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('app_resend_activation_code', ['token' => $token]) }}">Resend the activation
                                code</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-3 w-100">Activate</button>
                </form>
            </div>
        </div>
    </div>

@endsection
