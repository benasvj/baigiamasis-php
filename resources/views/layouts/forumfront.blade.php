<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
            
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
            
    <title>Legendų Lyga</title>
            
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
            
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
            
    <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
</head>
<body>
@include('inc.navbar')

<div class="container">
    <div class="row"> 
        <div class="col-md-3">
            @yield('sidebar')
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>        
    </div>
</div>


</body>
</html>