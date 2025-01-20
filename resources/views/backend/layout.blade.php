<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="Jassa">
	<meta name="keywords" content="Jassa, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('asset/backend/img/icons/icon-48x48.png') }}">

	<link rel="canonical" href="index.htm">

	<title>Agri Stock</title>

	<link href="{{asset('asset/backend/css2.css?family=Inter:wght@300;400;600&display=swap')}}" rel="stylesheet">

	<link class="js-stylesheet" href="{{ asset('asset/backend/css/light.css')}}" rel="stylesheet">
	@include('common.common-css')
	<style>
		body {
			opacity: 0;
		}
	</style>
	<!-- END SETTINGS -->
</head>


<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="wrapper">
        <!-- Sidebar Start -->
		@include('backend.home.sidebar')
        <!-- Sidebar Start -->
		<div class="main">
            <!-- Top nav start -->
			@include('backend.home.top-nav')
            <!-- Top nav end -->
            <!-- main content start -->
			@yield('content')
            <!-- main content end -->
            <!-- footer start -->
			@include('backend.home.footer')
            <!-- footer start -->
		</div>
	</div>

	<script src="{{ asset('asset/backend/js/app.js')}}"></script> 
	@include('common.common-js')	
</body>

</html>