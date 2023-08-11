<!DOCTYPE html>

<html>

<head>

    <title>Manage Game</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Custom styles for this template-->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
<style>
     .images{
            width: 350px;
            height: 250px;
            object-fit: cover;
        }

</style>
    
</head>

<body>

    <div class="container">

        @yield('content')

    </div>

</body>

</html>
