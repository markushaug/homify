@extends('light-bootstrap-dashboard::layouts.auth')

@section('content')
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="auth-card card">
      <div class="header">
        <h4 class="title">Reset Password</h4>
      </div>
      <div class="content">
        <form action="{{ route('password.email') }}" method="POST">
          {{ csrf_field() }}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
              <label for="email">Email address</label>
              <input name="email" type="email" class="form-control" required>
              @if ($errors->has('email'))
              <span class="help-block">{{ $errors->first('email') }}</span>
              @endif
            </div>
            <!-- Change this to a button or input when using this as a form -->
            <button type="submit" class="btn btn-lg btn-success btn-block">Send Reset Link</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
