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
		
		<link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}" type="text/css" >
		@stack('stylesheet')
		 
    </head>
    <body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div id="mySidenav" class="sidenav">
			@if (Sentinel::check() && Sentinel::inRole('administrator'))
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <a href="{{ route('admin.dashboard') }}">Naslovnica</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('users.index') }}">Korisnici</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('roles.index') }}">Uloge</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.works.index') }}">Radna mjesta</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.terminations.index') }}">Otkazi</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.equipments.index') }}">Radna oprema</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}"> &#8764;</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.employees.index') }}">Kandidati za posao</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.registrations.index') }}">Prijavljeni radnici</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.employee_equipments.index') }}">Zadužena oprema</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.kids.index') }}">Djeca zaposlenika</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.employee_terminations.index') }}">Odjavljeni radnici</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}"> &#8764;</a>
			  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.workingTags.index') }}">Oznake radnog vremena</a>
				  <a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.workingHours.index') }}">Evidencija radnog vremena</a>
			  @endif
			<!--  <a href="">PROBA</a>-->
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
		
		<!-- DataTables -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
		
		<script>
			$(document).ready( function () {
				$('#table_id').DataTable( {
					language: {
						paginate: {
							previous: 'Prethodna',
							next:     'Slijedeća',
						},
						"info": "Prikaz _START_ do _END_ od _TOTAL_ zapisa",
						"search": "Filtriraj:",
						"lengthMenu": "Prikaži _MENU_ zapisa"
					},
					 "lengthMenu": [ 25, 50, 75, 100 ],
				});
			});
			
			
			
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
