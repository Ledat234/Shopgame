<!DOCTYPE html>

<html>

<head>

    <title>Manage Game</title>
    <link href="{{asset("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link
        href="{{asset("https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i")}}"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{asset("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css")}}" rel="stylesheet">
    <style>
        .images-detail {
        
            align-items: center;
            width: 250px;
            height: 150px;
            
           
        }

       
    </style>
</head>

<body>

    <div class="container">

        @yield('content')

    </div>

</body>

</html>
