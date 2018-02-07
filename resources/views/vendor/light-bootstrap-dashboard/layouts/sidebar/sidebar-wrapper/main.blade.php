<div class="sidebar-wrapper">
  <div class="logo">
    @section('logo')
    <a href="/" class="simple-text">
      @yield('title', config('app.name', 'Logo'))
    </a>
    @show
  </div>

  @section('sidebar-menu')
  <ul class="nav">
      @foreach ($rooms as $room)
      <li id="{{ $room->id }}" class="active">
         <a href="{{ url('room/'.$room->room) }}">
           <i class="pe-7s-home"></i>
           <p>{{ $room->room }}</p>
         </a>
       </li>
     @endforeach
    
    
    <li class="active-pro">
      <a href="#">
        <i class="pe-7s-plus"></i>
        <p>Add Room</p>
      </a>
    </li>
  </ul>
  @show
</div>

<style>
    .sidebar .nav .active-pro,
    body>.navbar-collapse .nav .active-pro {
        position: absolute;
        width: 100%;
        bottom: 10px;
    }
  </style>    
