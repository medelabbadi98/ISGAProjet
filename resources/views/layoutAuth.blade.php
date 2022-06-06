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

<style type="text/css">
	.navbar {
				color: #0b0fee;
				background: #fff !important;
				padding: 5px 16px;
				border-radius: 0;
				border: none;
				box-shadow: 10px 5px 5px rgb(192, 204, 240);
			}
			.navbar img {
				border-radius: 50%;
				width: 36px;
				height: 36px;
				margin-right: 10px;
			}
			.navbar .navbar-brand {
				color: #0b0fee;
				padding-left: 0;
				padding-right: 50px;
				font-size: 24px;		
			}
			.navbar .navbar-brand:hover, .navbar .navbar-brand:focus {
				color: inherit;
			}
			.navbar .navbar-brand i {
				font-size: 25px;
				margin-right: 5px;
			}
	
			
			.navbar .nav-item span {
				position: relative;
				top: 3px;
			}
			.navbar .navbar-nav > a {
				color: #0b0fee;
				padding: 10px;
				font-size: 18px;		
			}
			.navbar .navbar-nav > a:hover, .navbar .navbar-nav > a:focus {
				color: #13132f;
				text-shadow: 0 0 4px rgba(255,255,255,0.3);
			}
			.navbar > #navbarCollapse > .navbar-nav > a {
				color: #0b0fee;
			}
			.navbar .navbar-nav > a > i {
				display: block;
				text-align: center;
			}
			.navbar .dropdown-item i {
				font-size: 16px;
				min-width: 22px;
			}
			.navbar .dropdown-item .material-icons {
				font-size: 21px;
				line-height: 16px;
				vertical-align: middle;
				margin-top: -2px;
			}
			.navbar .nav-item.open > a, .navbar .nav-item.open > a:hover, .navbar .nav-item.open > a:focus {
				color: #0b0fee;
				background: none !important;
			}
			.navbar .dropdown-menu {
				border-radius: 1px;
				border-color: #e5e5e5;
				box-shadow: 0 2px 8px rgba(0,0,0,.05);
			}
			.navbar .dropdown-menu a {
				color: #777 !important;
				padding: 8px 20px;
				line-height: normal;
				font-size: 15px;
			}
			
			.navbar .dropdown-menu a:hover, .navbar .dropdown-menu a:focus {
				color: #333 !important;
				background: transparent !important;
			}
			.navbar .navbar-nav .active a, .navbar .navbar-nav .active a:hover, .navbar .navbar-nav .active a:focus {
				color: #0b0fee;
				text-shadow: 0 0 4px rgba(255,255,255,0.2);
				background: transparent !important;
			}
			.navbar .navbar-nav .user-action {
				padding: 9px 15px;
				font-size: 15px;
			}
			
			.navbar .navbar-toggle {
				border-color: #fff;
			}
			.navbar .navbar-toggle .icon-bar {
				background: #fff;
			}
			.navbar .navbar-toggle:focus, .navbar .navbar-toggle:hover {
				background: transparent;
			}
			.navbar .navbar-nav .open .dropdown-menu {
				background: #faf7fd;
				border-radius: 1px;
				border-color: #faf7fd;
				box-shadow: 0 2px 8px rgba(0,0,0,.05);
			}
			.navbar .divider {
				background-color: #e9ecef !important;
			}

			.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
			@media (min-width: 1200px){
				.form-inline .input-group {
					width: 350px;
					margin-left: 30px;
				}
				.navbar-collapse div:first-child{
					margin-right: 350px;
				}
			}
			@media (max-width: 1199px){
				.navbar .navbar-collapse {
					border: none;
					box-shadow: none;
					padding: 0;
				}

				.navbar .navbar-nav {
					margin: 8px 0;
				}
				.navbar .navbar-toggle {
					margin-right: 0;
				}
				.input-group {
					width: 100%;
				}
				
			}
       
    </style>


</head>
<body style="position:relative">
   
<nav class="navbar navbar-expand-xl  navbar-light navbar-laravel">
    <div class="container">
    <a href="/" class="navbar-brand">E-<b>JOB</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" >
            @guest
                    <li class="nav-item">
                        <a class="nav-link" style="color:blue" href="{{ route('login') }}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:blue" href="{{ route('register') }}">S'inscrire</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" style="color:blue" href="{{ route('logout') }}">Se déconnecter</a>
                    </li>
                @endguest
            </ul>
  
        </div>
    </div>
</nav>
  
@yield('content')

</body>
</html>