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
		<!-- Awesome icon -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
			
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}" type="text/css" >
		@stack('stylesheet')
		
    </head>
    <body>
		<header>
			<h1><img src="{{ asset('img/Duplico_logo_white.png') }}" /> administracija</h1>
			<ul class="">
				@if(Sentinel::check())
					<a href="{{ route('auth.logout') }}">Odjava</a></li>
				@else
					<li><a href="{{ route('auth.login.form') }}">Login</a></li>
					<li><a href="{{ route('auth.register.form') }}">Register</a></li>
				@endif
			</ul>
		</header>
		<section>
			<nav class="topnav col-xs-12 col-sm-2 col-md-2 col-lg-2" id="myTopnav">
				@if(Sentinel::check() && Sentinel::inRole('administrator') || Sentinel::inRole('basic'))
					<a href="{{ route('admin.dashboard') }}"  class="active">Naslovnica</a>
					@if(Sentinel::inRole('administrator'))
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('users.index') }}">Korisnici</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('roles.index') }}">Uloge</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.works.index') }}">Radna mjesta</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.terminations.index') }}">Otkazi</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.equipments.index') }}">Radna oprema</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.employees.index') }}">Kandidati za posao</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.registrations.index') }}">Prijavljeni radnici</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.employee_equipments.index') }}">Zadužena oprema</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.kids.index') }}">Djeca zaposlenika</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.employee_terminations.index') }}">Odjavljeni radnici</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.vacation_requests.index') }}">Zahtjevi za godišnji odmor</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.afterHours.index') }}">Prekovremeni rad</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.documents.index') }}">Dokumenti</a>
						<a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.notices.index') }}">Obavijesti</a>
					@endif
					<a href="javascript:void(0);" class="icon" onclick="myFunction()">
						<i class="fa fa-bars"></i>
					</a>
					@foreach(DB::table('notices')->take(5)->get() as $notice)
						<div class="notice">
							<a href="{{ route('admin.notices.show', $notice->id ) }}">{{ $notice->subject }}</a>
						</div>
					@endforeach
					
				@endif
			</nav>
			<article class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					@include('notifications')
					@yield('content')
			</article>
			<article class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
				<!--<div class="">
					<a class="{{ Sentinel::check() ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">Poruke</a>
				</div>-->
				<div class="projekti">
					<a href="{{ route('admin.customers.index') }}">Klijenti</a>
					<a href="{{ route('admin.projects.index') }}">Projekti</a>
					<a href="{{ route('admin.cars.index') }}">Vozila</a>
					<a href="{{ route('admin.shedulers.index') }}">Raspored</a>
				</div>
				
			</article>
		</section>
		

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Restfulizer.js - A tool for simulating put,patch and delete requests -->
        <script src="{{ asset('js/restfulizer.js') }}"></script>
		
		<!-- DataTables -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.css"/>
		 
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.js"></script>
		
		<script>
			$(document).ready(function() {
				var table = $('#table_id').DataTable( {
					"paging": true,
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
					 "pageLength": 50,
					 dom: 'Bfrtip',
						buttons: [
							'copy', 'pdf', 'print',
						/*{
							extend: 'pdfHtml5',
							text: 'Izradi PDF',
							exportOptions: {
								columns: ":not(.not-export-column)"
								}
							},*/
							{
						extend: 'excelHtml5',
						text: 'Izradi XLS',
						exportOptions: {
							columns: ":not(.not-export-column)"
						}
						},
						],
				} );
				$('a.toggle-vis').on( 'click', function (e) {
					e.preventDefault();
			 
					// Get the column API object
					var column = table.column( $(this).attr('data-column') );
			 
					// Toggle the visibility
					column.visible( ! column.visible() );
				} );
			} );
		</script>
		<script>
			function openNav() {
				document.getElementById("mySidenav").style.width = "250px";
			}
			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
			}
		</script>
		<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
		</script>
		@stack('script')
    </body>
</html>
