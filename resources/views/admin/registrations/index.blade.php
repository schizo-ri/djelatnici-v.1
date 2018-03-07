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
</style>

@section('content')
</br>
</br>
<div class="container">
    <div class="page-header">
       
		</br>
        <h1>Prijavljeni radnici</h1>
		<input class="form-control" id="myInput" type="text" placeholder="Traži..">
		</br>
		<!--<a href="{{URL::to('getExport')}}" class="btn btn-success">Export</a>-->
	
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($registrations) > 0)
                <table class="table table-hover" id="myTable">
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
                                <td>{{ date('Y.m.d', strtotime($registration->datum_prijave)) }}</td>
                                
								<td>{{ date('Y.m.d', strtotime($registration->employee['datum_rodjenja'])) }}</td>
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
										<a href="{{action('Admin\RegistrationController@generate_pdf', $registration->id)}}" class="btn btn-default btn-md btn-block  {{ ! Sentinel::inRole('administrator') && Sentinel::getUser()->id != $offer->user_id ? 'disabled' : '' }}">
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
										</a>
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
						<script>
							function sortTable(n) {
							var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
							table = document.getElementById("myTable");
							switching = true;
							//Set the sorting direction to ascending:
							dir = "asc"; 
							/*Make a loop that will continue until
							no switching has been done:*/
							while (switching) {
							//start by saying: no switching is done:
							switching = false;
							rows = table.getElementsByTagName("TR");
							/*Loop through all table rows (except the
							first, which contains table headers):*/
							for (i = 1; i < (rows.length - 1); i++) {
							  //start by saying there should be no switching:
							  shouldSwitch = false;
							  /*Get the two elements you want to compare,
							  one from current row and one from the next:*/
							  x = rows[i].getElementsByTagName("TD")[n];
							  y = rows[i + 1].getElementsByTagName("TD")[n];
							  /*check if the two rows should switch place,
							  based on the direction, asc or desc:*/
							  if (dir == "asc") {
								if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
								  //if so, mark as a switch and break the loop:
								  shouldSwitch= true;
								  break;
								}
							  } else if (dir == "desc") {
								if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
								  //if so, mark as a switch and break the loop:
								  shouldSwitch= true;
								  break;
								}
							  }
							}
							if (shouldSwitch) {
							  /*If a switch has been marked, make the switch
							  and mark that a switch has been done:*/
							  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
							  switching = true;
							  //Each time a switch is done, increase this count by 1:
							  switchcount ++;      
							} else {
							  /*If no switching has been done AND the direction is "asc",
							  set the direction to "desc" and run the while loop again.*/
							  if (switchcount == 0 && dir == "asc") {
								dir = "desc";
								switching = true;
							  }
							}
							}
							}
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
