@extends('light-bootstrap-dashboard::layouts.main')

@section('sidebar-menu')
<ul class="nav">
@foreach ($rooms as $room)
 <li id="{{ $room->id }}" class="active">
    <a href="{{ route('home') }}">
      <i class="pe-7s-home"></i>
      <p>{{ $room->room }}</p>
    </a>
  </li>
@endforeach

</ul>
@endsection
