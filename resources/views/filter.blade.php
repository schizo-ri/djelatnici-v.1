@extends('layouts.admin')

@section('title', 'Duplico')

@section('content')
</br>
</br>
</br>
</br>
</br>
<form action="{{URL::curent()">
<div>
	<label for="">Prijava</label>
	<input type="date" name="početni_datum"></br>
	<input type="date" name="završni_datum"></br>
</div>
<div>
	<label for="">Odjel</label>
	<input type="checkbox" name="odjel[]" value="">Inženjering
	</br>
	<input type="checkbox" name="odjel[]" value="">Servis
	</br>
	<input type="checkbox" name="odjel[]" value="">Opći poslovi
</div>

<button>OK</button>
</form>

<h1>Filtrirano</h1>
<ul>
	@foreach($employees as $employee)
		<li>{{ $employee->first_name . ' ' . $employee->last_name }}</li>
		
	
	@endforeach
</ul>

@stop
