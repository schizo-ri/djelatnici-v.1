<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <title>@yield('title')</title>

        <!-- Bootstrap - Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Date picker-->
		  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
		  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

		@stack('stylesheet')
		 
    </head>

<style>
body {
    font-family: "Arial", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 18px;
    color: #f48b09;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f48b09;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#font_nar {
    color: #f48b09;
}
#stil1 {
	color: #f48b09;
	background-color: #111;
}
#padding {
    padding-left: 0.5cm;
}
</style>	

    <body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div id="mySidenav" class="sidenav">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <a href="{{ route('admin.dashboard') }}">Naslovnica</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('users.index') }}">Korisnici</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('roles.index') }}">Uloge</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.works.index') }}">Radna mjesta</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.terminations.index') }}">Otkazi</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.equipments.index') }}">Radna oprema</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.employees.index') }}">Kandidati za posao</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.registrations.index') }}">Prijavljeni radnici</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.employee_equipments.index') }}">Zadužena oprema</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.kids.index') }}">Djeca zaposlenika</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.employee_terminations.index') }}">Odjavljeni radnici</a>
			</div>
			<span style="font-size:30px;cursor:pointer" onclick="openNav()" id="font_nar">&#9776; </span>
			<ul class="nav navbar-nav navbar-right">
				@if (Sentinel::check())
				  <li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="user"></span> {{ Sentinel::getUser()->first_name }} <span class="caret"></span></a>
					<ul class="dropdown-menu">
					  <li><a href="{{ route('auth.logout') }}">Odjava</a></li>
					</ul>
				  </li>
				@else
					<li><a href="{{ route('auth.login.form') }}">Login</a></li>
					<li><a href="{{ route('auth.register.form') }}">Register</a></li>
				@endif
			</ul>
			<div class="container-fluid">
				
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

		<script>
			function openNav() {
				document.getElementById("mySidenav").style.width = "250px";
			}

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
			}
		</script>
		@stack('script')
    </body>
</html>
