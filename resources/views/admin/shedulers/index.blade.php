@extends('layouts.admin')

@section('title', 'Raspored')
<link rel="stylesheet" href="{{ URL::asset('css/raspored.css') }}" type="text/css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@section('content')
<div class="raspored">
    <div class="page-header">
        <h1>Kalendar sastanaka</h1>
		
		<form accept-charset="UTF-8" role="form" method="get" action="{{ route('admin.shedulers.create') }}">
			<p>Izbor mjeseca </p>
			<input class="date date-own form-control" type="text" name="mjesec">
			<button type="submit" value="Odaberi" >Odaberi</button>
			<script type="text/javascript">
			$('.date-own').datepicker({
				minViewMode: 1,
				format: 'm-yyyy'
			});
			</script>
		</form>
		
    </div>
    
</div>
@stop
