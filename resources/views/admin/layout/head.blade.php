<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Manage</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <style>
        .inline-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .inline-list li {
            display: inline-block;
            margin-right: 10px;
        }

        <>.pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 12px;
            background-color: #f2f2f2;
            border-radius: 4px;
            margin: 0 5px;
            text-decoration: none;
            color: #333;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        .pagination .active {
            background-color: #007bff;
            color: #fff;
        }

        .pagination .disabled {
            pointer-events: none;
            opacity: 0.6;
        }
    </style>
</head>
