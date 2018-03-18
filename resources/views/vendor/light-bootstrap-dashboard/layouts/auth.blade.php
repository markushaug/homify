<!DOCTYPE html>
<html lang="@yield('lang', config('app.locale', 'en'))">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

	<title>@yield('title', config('app.name', 'Light Bootstrap Dashboard'))</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Styles -->
  @section('styles')
  <link href="{{ mix('/css/light-bootstrap-dashboard.css') }}" rel="stylesheet">
  <link href="{{ mix('/css/auth.css') }}" rel="stylesheet">
  @show
  @stack('head')
</head>
<body>
  <div id="app" class="container">
		@yield('content')
	</div>

	@section('scripts')
	<script src="{{ mix('/js/manifest.js') }}" charset="utf-8"></script>
	<script src="{{ mix('/js/vendor.js') }}" charset="utf-8"></script>
	<script src="{{ mix('/js/auth.js') }}" charset="utf-8"></script>
	@show
	@stack('body')
</body>
</html>
