@extends('layouts.app')

@section('content-title', 'Home')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
      <div class="header">
        <h4 class="title">Dashboard</h4>
        {{-- <p class="category">Dashboard</p> --}}
      </div>      
      <div class="content">
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif

        You are logged in!
      </div>
    </div>
  </div>
</div>
@endsection
