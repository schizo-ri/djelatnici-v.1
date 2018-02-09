@extends('layouts.index')

@section('title', 'Duplico')

@section('content')

<div class="container">
	<div class="jumbotron" >
		<h2 style="text-align:center"> Duplico - Djelatnici</h2> 
		</br>
		<h2 style="text-align:center">Za nastavak je potrebna</h2> 
		<p style="text-align:center; font-size:120%"><a href="{{ route('auth.login.form') }}" style="font-size:150%;" id="font_nar">Prijava</a> ili <a href="{{ route('auth.register.form') }}" style="font-size:150%;" id="font_nar">Registracija</a></p>
	</div>  
</div>

@stop
