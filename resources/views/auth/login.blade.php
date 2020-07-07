@extends('layouts.auth')

@section('title', 'Sign in')

@push('css')
    <link href="{{ asset('admin/default/custom/user/assets/app/custom/login/login-v3.default.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('js')

@endpush

@section('content')
<div class="kt-login__signin">
  <div class="kt-login__head">
    <h3 class="kt-login__title">Sign In To Dashboard
    </h3>
  </div>
  <form class="kt-form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="input-group">
      <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="input-group">
      <input class="form-control" type="password" placeholder="Password" name="password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="row kt-login__extra">
      <div class="col">
        <label class="kt-checkbox">
          <input type="checkbox" name="remember"> Remember me
          <span></span>
        </label>
      </div>
      <div class="col kt-align-right">
        <a href="{{ url('register') }}" id="kt_login_forgot" class="kt-login__link">  Register 
        </a>
      </div>
    </div>
    <div class="kt-login__actions">
      <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In</button>
    </div>
  </form>
</div>
@endsection
