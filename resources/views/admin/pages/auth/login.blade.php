@extends('admin.layouts.login')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <p>TroyLab Dashboard</p>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body">
            <x-alerts/>
            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ __('E-mail') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="{{ __('Password') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="checkbox icheck">
                      <label>
                        {{-- <input type="checkbox"> Remember Me --}}
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Login') }}</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
        </div>
    </div>
    <!-- /.login-box-body -->
  </div>
@endsection
