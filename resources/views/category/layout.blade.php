<!DOCTYPE html>

<html>

<head>

    <title>Manage Category</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        @yield('content')

    </div>
    <div class="pagination">
        @if ($categories->onFirstPage())
            <span class="disabled">&laquo;</span>
        @else
            <a href="{{ $categories->previousPageUrl() }}" rel="prev">&laquo;</a>
        @endif
    
        @if ($categories->hasMorePages())
            <a href="{{ $categories->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <span class="disabled">&raquo;</span>
        @endif
    </div>
</body>


</html>
