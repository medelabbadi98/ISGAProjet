<!DOCTYPE html>
<html>
<head>
    <title>Site Recrutement</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
	<link href="font-awesome/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href=" {{URL::asset('assets/styles/style.css')}}"/>
	<style type="text/css">
	
      
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }
       
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endguest
            </ul>
  
        </div>
    </div>
</nav>
<script src="{{ URL::asset('assets/js/jquery-3.4.1.js')}} "></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/plugins.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/common.js')}}"></script>  
<script src="{{ URL::asset('assets/js/ckeditor/ckeditor.js') }}"></script>
@yield('content')

</body>
</html>