<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>@yield('title')</title>

	<!-- Bootstrap - Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<style>
	#font_nar {
		color: #f48b09;
	}
	#stil1 {
		color: #f48b09;
		background-color: #111;
	}
</style>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="{{ route('admin.dashboard') }}" id="font_nar">Duplico</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<!--<ul class="nav navbar-nav">
					<li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('index') }}" id="font_nar">Naslovnica</a></li>				  
				</ul>-->
                <ul class="nav navbar-nav navbar-right">
                    @if (Sentinel::check()) 
                        <li>
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="user"></span> {{ Sentinel::getUser()->email }} <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{ route('auth.logout') }}">Odjava</a></li>
                          </ul>
                        </li>
                    @else
                        <li><a href="{{ route('auth.login.form') }}" id="font_nar">Prijava</a></li>
                        <li><a href="{{ route('auth.register.form') }}" id="font_nar">Registracija</a></li>
                    @endif
                </ul>
			</div>	
		</div>
	</nav>

	<div class="container">
				@include('notifications')
				@yield('content')
	</div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Restfulizer.js - A tool for simulating put,patch and delete requests -->
        <script src="{{ asset('js/restfulizer.js') }}"></script>
		
</body>
</html> 