@extends('light-bootstrap-dashboard::layouts.auth')

@section('content')
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="auth-card card">
      <div class="header">
        <h4 class="title">Login</h4>
      </div>
      <div class="content">
        <form action="{{ route('login') }}" method="POST">
          {{ csrf_field() }}
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
            <div class="form-group">
              <div>
                <label class="checkbox">
                  <input type="checkbox" data-toggle="checkbox"> Remember
                </label>
              </div>
            </div>
            <!-- Change this to a button or input when using this as a form -->
            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
            <a href="{{ route('register') }}" class="btn btn-lg btn-default btn-block">Register</a>
            <div class="text-right">
              <a href="{{ route('password.request') }}" class="text-muted">Forgot Password</a>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
