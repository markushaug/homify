@extends('light-bootstrap-dashboard::layouts.auth')

@section('content')
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="auth-card card">
      <div class="header">
        <h4 class="title">Register</h4>
      </div>
      <div class="content">
        <form action="{{ route('register') }}" method="POST">
          {{ csrf_field() }}
          <fieldset>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
              <label for="name">Name</label>
              <input name="name" type="text" class="form-control" required>
              @if ($errors->has('name'))
              <span class="help-block">{{ $errors->first('name') }}</span>
              @endif
            </div>
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
            <button type="submit" class="btn btn-lg btn-success btn-block">Register</button>
            <a href="{{ route('login') }}" class="btn btn-lg btn-default btn-block">Login</a>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
