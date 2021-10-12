<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<script src="{{ asset('js/app.js') }}"></script>

	@yield('css')



	<title>@yield('title', env('APP_NAME'))</title>
</head>
<body>
    @yield('header')
	<div class="container">

        @if(session("mensaje") && session("tipo"))
            <div class="mt-auto alert {{ session('tipo') }} alert-dismissible fade show" role="alert">
                <strong>{{session('mensaje')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
		@yield('content')
	</div>
    <div class="pb-5"></div>
    @yield('footer')
	@yield('js')
</body>
</html>
