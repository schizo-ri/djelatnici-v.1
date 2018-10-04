@extends('layouts.admin')

@section('title', 'Duplico djelatnici')

@section('content')

<div class="">
    <div class="page-header">
        <h1>Godišnji odmori i izostanci - {{ $employee->first_name . ' ' . $employee->last_name }}</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive" id="tblData">
			@if(count($vacationRequests) > 0)
				<table id="table_id" class="display" style="width: 100%;">
					<thead>
						<tr>
							<th></th>
							<th class="disp_none">Datum zahtjeva</th>
							<th>Od - Do</th>
							<th>Zahtjev</th>
							<th>Napomena</th>
							<th>Odobreno</th>
							<th class="disp_none">Odobrio</th>
							<th class="disp_none">Datum odobrenja</th>
						</tr>
					</thead>
					@foreach($vacationRequests as $vacationRequest)
						<tbody>
							<tr>
								<td>
									<a href="{{ route('admin.vacation_requests.edit', $vacationRequest->id) }}" class="">
										<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> 
									<a href="{{ route('admin.vacation_requests.destroy', $vacationRequest->id) }}" data-method="delete" data-token="{{ csrf_token() }}">
										<i class="far fa-trash-alt"></i>
									</a>
								</td>
								<td class="disp_none">{{ date('d.m.Y.', strtotime( $vacationRequest->created_at)) }}</td>
								<td>{{ date('d.m.Y.', strtotime( $vacationRequest->GOpocetak)) }}<br>
								<?php 
									$brojDana =1;
								?>
								@if($vacationRequest->GOzavršetak != $vacationRequest->GOpocetak )
								{{ date('d.m.Y.', strtotime( $vacationRequest->GOzavršetak)) }}
								<?php 
									$begin = new DateTime($vacationRequest->GOpocetak);
									$end = new DateTime($vacationRequest->GOzavršetak);
									$interval = DateInterval::createFromDateString('1 day');
									$period = new DatePeriod($begin, $interval, $end);
									foreach ($period as $dan) {
										if(date_format($dan,'N') < 6 &&
										!(date_format($dan,'d') == '01' & date_format($dan,'m') == '01') &&
										!(date_format($dan,'d') == '06' & date_format($dan,'m') == '01') &&
										!(date_format($dan,'d') == '01' & date_format($dan,'m') == '05') &&
										!(date_format($dan,'d') == '22' & date_format($dan,'m') == '06') &&
										!(date_format($dan,'d') == '25' & date_format($dan,'m') == '06') &&
										!(date_format($dan,'d') == '15' & date_format($dan,'m') == '08') &&
										!(date_format($dan,'d') == '05' & date_format($dan,'m') == '08') &&
										!(date_format($dan,'d') == '08' & date_format($dan,'m') == '10') &&
										!(date_format($dan,'d') == '01' & date_format($dan,'m') == '11') &&
										!(date_format($dan,'d') == '25' & date_format($dan,'m') == '12') &&
										!(date_format($dan,'d') == '26' & date_format($dan,'m') == '12') &&
										!(date_format($dan,'d') == '02' & date_format($dan,'m') == '04' & date_format($dan,'Y') == '2018') &&
										!(date_format($dan,'d') == '31' & date_format($dan,'m') == '05' & date_format($dan,'Y') == '2018')){
											$brojDana += 1;
										}
									}
								?>
								@elseif($vacationRequest->zahtjev != 'GO') 
									{{ date('H:i', strtotime( $vacationRequest->GOpocetak. ' '. $vacationRequest->vrijeme_od))  }} - {{  date('H:i', strtotime( $vacationRequest->GOpocetak. ' '. $vacationRequest->vrijeme_do)) }}
								@endif
								</td>
								<td>{{ $vacationRequest->zahtjev . ', ' . $brojDana . ' dana'}} 
								</td>
								<td>{{ $vacationRequest->napomena }}</td>
								<td>{{ $vacationRequest->odobreno }}  {{ $vacationRequest->razlog  }}</td>
								<td class="disp_none">{{ $vacationRequest->authorized['first_name'] . ' ' . $vacationRequest->authorized['last_name']}}</td>
								<td class="disp_none">
								@if( $vacationRequest->odobreno <> "")
								{{ date('d.m.Y.', strtotime( $vacationRequest->datum_odobrenja))}}</td>
								@endif
							</tr>
						</tbody>
					@endforeach
				</table>

				@else
					{{'Nema podataka!'}}
				@endif
            </div>
			
        </div>
    </div>
	
</div>

@stop
