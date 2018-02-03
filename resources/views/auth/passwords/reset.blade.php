@extends('light-bootstrap-dashboard::layouts.auth')

@section('content')
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="auth-card card">
      <div class="header">
        <h4 class="title">Reset Password</h4>
      </div>
      <div class="content">
        <form action="{{ route('password.request') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="token" value="{{ $token }}">
          <fieldset>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
              <label for="email">Email address</label>
              <input name="email" type="email" class="form-control" required>
              @if ($errors->has('email'))
              <span class="help-block">{{ $errors->first('email') }}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
              <label for="password">Password</label>
              <input name="password" type="password" class="form-control" required>
              @if ($errors->has('password'))
              <span class="help-block">{{ $errors->first('password') }}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
              <label for="password_confirmation">Password Confirmation</label>
              <input name="password_confirmation" type="password" class="form-control" required>
              @if ($errors->has('password_confirmation'))
              <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
              @endif
            </div>
            <!-- Change this to a button or input when using this as a form -->
            <button type="submit" class="btn btn-lg btn-success btn-block">Reset Password</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
