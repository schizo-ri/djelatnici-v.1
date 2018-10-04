@extends('layouts.admin')

@section('title', 'Prekorad')
<link rel="stylesheet" href="{{ URL::asset('css/vacations.css') }}" type="text/css" >
@section('content')

<div class="">
    <div class="page-header">
        <div class='btn-toolbar pull-right' >
            <a class="btn btn-primary btn-lg" href="{{ route('admin.afterHours.create') }}"  id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Novi unos
            </a>
        </div>
        <h2>Evidencija prekovremenog rada</h2>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
				@if(count($afterHours) > 0)
					 <table id="table_id" class="display" style="width: 100%;">
						<thead>
							<tr>
								<th>Djelatnik</th>
								<th>Datum</th>
								<th>Vrijeme</th>
								<th>Napomena</th>
								<th>Odobrenje</th>
								<th class="not-export-column">Opcije</th>
							</tr>
						</thead>
						<tbody id="myTable">
							@foreach ($afterHours as $afterHour)
								<?php
								$vrijeme_1 = new DateTime($afterHour->vrijeme_od);  /* vrijeme od */
								$vrijeme_2 = new DateTime($afterHour->vrijeme_do);  /* vrijeme do */
								$razlika_vremena = $vrijeme_2->diff($vrijeme_1);  /* razlika_vremena*/

								?>

								<tr>
									<td>{{ $afterHour->employee['first_name'] . ' ' . $afterHour->employee['last_name'] }}</td>
									<td>{{ date('d.m.Y', strtotime($afterHour->datum )) }}</td>
									<td>{{ $afterHour->vrijeme_od . '-' . $afterHour->vrijeme_do . '(' .   $razlika_vremena->h . ' h)'   }}</td>
									<td>{{ $afterHour->napomena }}</td>
									<td>{{ $afterHour->odobreno }}</td>
									<td>
										<a href="{{ route('admin.afterHours.edit', $afterHour->id) }}" class="btn">
											<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
											
										</a>
										<a href="{{ route('admin.afterHours.destroy', $afterHour->id) }}" class="btn action_confirm {{ ! Sentinel::inRole('administrator') ? 'disabled' : '' }}" data-method="delete" data-token="{{ csrf_token() }}">
											<i class="far fa-trash-alt"></i>
										</a>
									</td>
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

						<p class="SLD">Ukupan broj slobodnih dana  {{  $slobodni_dani }}</p>
						<p class="SLD">Iskorišteno slobodnih dana  {{  $koristeni_slobodni_dani }}</p>
						<p class="SLD">Preostali slobodni dani  {{  $slobodni_dani - $koristeni_slobodni_dani }}</p>
					
				@else
					{{'Nema podataka!'}}
				@endif
            </div>
			
        </div>
    </div>
</div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
@stop