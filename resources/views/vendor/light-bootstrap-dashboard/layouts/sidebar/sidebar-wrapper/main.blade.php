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
    <li class="active">
      <a href="#">
        <i class="pe-7s-graph"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="pe-7s-user"></i>
        <p>User Profile</p>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="pe-7s-note2"></i>
        <p>Table List</p>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="pe-7s-news-paper"></i>
        <p>Typography</p>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="pe-7s-science"></i>
        <p>Icons</p>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="pe-7s-map-marker"></i>
        <p>Maps</p>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="pe-7s-bell"></i>
        <p>Notifications</p>
      </a>
    </li>
    <li class="active-pro">
      <a href="#">
        <i class="pe-7s-rocket"></i>
        <p>Upgrade to PRO</p>
      </a>
    </li>
  </ul>
  @show
</div>
