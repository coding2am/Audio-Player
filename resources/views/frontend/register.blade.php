@extends('layouts.master')
@section('title', '2am Music Player')
@section('content')
    <div class="container">
        <span class="login100-form-title p-b-41">
            Account Register
        </span>
        <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="name" placeholder="User name" autocomplete="off">
                <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input">
                <input class="input100" type="email" name="email" placeholder="Email address" autocomplete="off">
                <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input">
                <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                    placeholder="Password">
                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
            </div>

            <div class="wrap-input100 validate-input">
                <input class="input100" type="password" name="cpassword" placeholder="Re-type password">
                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
            </div>

            <div class="container-login100-form-btn m-t-32">
                <button type="submit" class="login100-form-btn">
                    Register
                </button>
            </div>

        </form>
    </div>
@endsection
