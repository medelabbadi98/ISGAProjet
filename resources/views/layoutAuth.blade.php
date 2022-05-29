<!DOCTYPE html>
<html>
<head>
    <title>Site Recrutement</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/csssigneup.css">
	<link href="font-awesome/css/all.min.css" rel="stylesheet"/>
    
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
<body style="position:relative">
   
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
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Se déconnecter</a>
                    </li>
                @endguest
            </ul>
  
        </div>
    </div>
</nav>
  
@yield('content')
<!-- <footer class="bg-dark text-center text-lg-start text-white" style="background-color: rgba(251, 251, 251, 0.2); bottom:-10rem;position:relative">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-white" href="{{route('register')}}">M2Y2.com</a>
  </div>
</footer> -->
</body>
</html>