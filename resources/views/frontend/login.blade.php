@extends('layouts.master')
@section('title', '2am Music Player')
@section('content')
    <div class="container">
        <span class="login100-form-title p-b-41">
            Account Login
        </span>
        <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('login') }}">
            @csrf
            @if (!empty(session()->get('success')))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="mr-1">Success!</strong>{!! session()->get('success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="wrap-input100 validate-input">
                <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email"
                    autocomplete="off">
                <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
                <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                    placeholder="Password">
                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="container-login100-form-btn m-t-32">
                <button class="login100-form-btn">
                    Login
                </button>
            </div>

        </form>
    </div>
@endsection
