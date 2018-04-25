@extends('layouts.admin')

@section('title', 'Duplico djelatnici')

<style>
#padding1 {
    padding-left: 30px;
}
th {
    font-size: 12px;
} 
td {
    font-size: 14px;
} 
table, td, th, tr {
    vertical-align: center;
	table-layout: fixed;
} 
input {
	border: 1px solid;
	border-color: d9d9d9;
	border-radius: 3px;
	padding: 3px;
}
</style>

@section('content')
</br>
</br>
<div class="container">
    <div class="page-header">

        <h1>Prijavljeni radnici</h1>

    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive" id="tblData">
			@if(count($registrations) > 0)
                <table id="table_id" class="display">
                    <thead>
                        <tr>
							<th width="100" onclick="sortTable(0)">Ime i prezime</th>
							<th width="80" onclick="sortTable(1)">Datum prijave</th>
                            <th width="80" onclick="sortTable(2)">Datum rođenja</th>
							<th width="150" onclick="sortTable(3)">Radno mjesto</th>
                            <th width="150">Opcije</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
					<?php 
					$i = 0;
					?>
						@foreach ($registrations as $registration)
							
						@if(!DB::table('employee_terminations')->where('employee_id',$registration->employee_id)->first() )
                            <tr>
								<td>
									<a href="{{ route('admin.registrations.show', $registration->id) }}">
										{{ $registration->employee['last_name']  . ' '. $registration->employee['first_name']}}
									</a>
								</td>
                                <td>{{ date('d.m.Y.', strtotime($registration->datum_prijave)) }}</td>
                                
								<td>{{ date('d.m.Y.', strtotime($registration->employee['datum_rodjenja'])) }}</td>
								<td>{{ $registration->work['odjel'] . ' - ' . $registration->work['naziv'] }}</td>
								<td>
									<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample{{$i}}" aria-expanded="false" aria-controls="collapseExample{{$i}}" id="style1">
									  Opcije
									</a>
									
									<div class="collapse" id="collapseExample{{$i}}">
										<a href="{{ route('admin.employees.edit', $registration->employee_id) }}" class="btn btn-default btn-block">
											<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
											Ispravi opće podatke
										</a>
										<a href="{{ route('admin.registrations.edit', $registration->id) }}" class="btn btn-default btn-block">
											<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
											Ispravi podatke o prijavi
										</a>
										<!--<a href="{{action('Admin\RegistrationController@generate_pdf', $registration->id)}}" class="btn btn-default btn-md btn-block  {{ ! Sentinel::inRole('administrator') && Sentinel::getUser()->id != $offer->user_id ? 'disabled' : '' }}">
											<span class="glyphicon glyphicon-print" aria-hidden="true"></span>
											Dokumenti-prijava
										</a>
										<a href="{{ route('admin.employee_equipments.create', $registration->employee_id) }}" class="btn btn-default btn-md btn-block">
											Zaduži opremu
										</a>
										<a href="{{ route('admin.employee_equipments.show', $registration->id)}}" class="btn btn-default btn-md btn-block  {{ ! Sentinel::inRole('administrator') && Sentinel::getUser()->id != $offer->user_id ? 'disabled' : '' }}">
											<span class="glyphicon glyphicon-print" aria-hidden="true"></span>
											Zaduženje
										</a>

										<a href="{{ route('admin.registrations.destroy', $registration->id) }}" class="btn btn-danger action_confirm  btn-block" data-method="delete" data-token="{{ csrf_token() }}">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
											Obriši
										</a>-->
                                    </div>
								</td>	
							</tr>
							<?php $i++ ?>
							@endif
						 @endforeach
                    </tbody>
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
                </table>
				@else
					{{'Nema podataka!'}}
				@endif
            </div>
			
        </div>
    </div>
	
</div>

@stop
