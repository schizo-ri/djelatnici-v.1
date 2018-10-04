@extends('layouts.admin')

@section('title', 'Djeca')
<link rel="stylesheet" href="{{ URL::asset('css/raspored.css') }}" type="text/css">

@section('content')
<div class="raspored">
    <div class="page-header">
        <!--<div class='btn-toolbar pull-right' >
            <a class="btn btn-primary btn-lg" href="{{ route('admin.shedulers.create') }}"  id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Unesi raspored
            </a>
        </div>-->
        <h1>Raspored</h1>

		<div>
		<p>Izbor mjeseca</p>
		<input class="date date-own form-control" type="text" name="mjesec">
		<button type="submit" value="Odaberi" >Odaberi</button>
		<script type="text/javascript">
		$('.date-own').datepicker({
			minViewMode: 1,
			format: 'm-yyyy'
		});
		</script>
		</div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
				@if($employees)
                 <table id="table_id" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Datum</th>
							<th>Djelatnik</th>
							<th>Projekt</th>
							<th>Vozilo</th>
                            <th class="not-export-column">Opcije</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($employees as $employee)
                            <tr>
                                <td></td>
								<td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                                <td></td>
                                <td></td>
								<td></td>
                            </tr>
                        @endforeach
						<script>
						$(document).ready(function(){
						  $("#myInput").on("keyup", function() {
							var value = $(this).val().toLowerCase();
							$("#myTable tr").filter(function() {
							  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
							});
						  });
						});
						</script>
                    </tbody>
                </table>
				@else
					{{'Nema podataka!'}}
				@endif
            </div>
			
        </div>
    </div>
</div>

@stop
