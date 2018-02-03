<div class="main-panel">
  <nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">@yield('content-title', 'Title')</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          @if (auth()->check())
   
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <p>
                {{ auth()->user()->name }}
                <b class="caret"></b>
              </p>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Account</a></li>
              <li class="divider"></li>
              <li>
                  <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                  <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <p>Logout</p>
                  </a>
              </li>
            </ul>
          </li>
        @elseif(!isset($exception))
          <li>
            <a href="{{ route('login') }}">
              <p>Login</p>
            </a>
          </li>
          @endif
          <li class="separator hidden-lg hidden-md"></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="content">

    @yield('content')

  </div>

  @include('light-bootstrap-dashboard::layouts.main-panel.footer.main')
</div>
