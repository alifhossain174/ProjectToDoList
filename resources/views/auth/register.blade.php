
@extends('layouts.app')

@section('content')
<div class="wrap-login100">
    <div class="login100-form-title" style="background-image: url({{url('/')}}/login_assets/images/bg-01.jpg);">
        <span class="login100-form-title-1">
            Sign Up
        </span>
    </div>

    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Name</span>
            <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Full Name" required autocomplete="name" autofocus>
            <span>
                @error('name')
                    <span role="alert" style="font-size: 14px;font-weight: 300;color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </span>
        </div>

        <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
            <span class="label-input100">Email</span>
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email" autofocus>
            <span>
                @error('email')
                    <span role="alert" style="font-size: 14px;font-weight: 300;color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </span>
        </div>

        <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter password" required autocomplete="new-password">
            <span>
                @error('password')
                    <span role="alert" style="font-size: 14px;font-weight: 300;color: red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </span>
        </div>

        <div class="wrap-input100 validate-input m-b-18">
            <span class="label-input100">Confirm</span>
            <input id="password-confirm" type="password" class="input100" placeholder="Retype the Password" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Register
            </button>
        </div>
    </form>


</div>
@endsection
