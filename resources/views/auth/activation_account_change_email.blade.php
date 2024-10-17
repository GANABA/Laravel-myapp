@extends('base')

@section('title', 'Change Your Email Address')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h2 class="text-center text-muted mb-3 mt-5">Change your email address</h2>

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

                <form action="{{ route('app_activation_account_change_email', ['token' => $token]) }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="new-email" class="form-label">New email address</label>
                        <input type="email" name="new-email" id="new-email"
                            class="form-control @if (Session::has('danger')) is-invalid @endif"
                            placeholder="Enter the new email address"
                            value="@if (Session::has('new_email')) {{ Session::get('new_email') }} @endif"
                            required>
                        <button type="submit" class="btn btn-primary my-3 w-100">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
