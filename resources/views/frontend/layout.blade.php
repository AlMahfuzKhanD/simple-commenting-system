<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Commenting System</title>
    <!-- Bootstrap CSS -->
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    @include('common.common-css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Navigation Bar -->
    @include('frontend.nav')
    
    <!-- Main Content -->
    @yield('content')
    
    <!-- Footer -->
    @include('frontend.footer')
    
    @include('common.common-js')	
</body>
</html>
