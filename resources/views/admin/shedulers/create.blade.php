@extends('layouts.admin')

@section('title', 'Evidencija radnog vremena')

@section('content')
<div class="">
	<h1>Evidencija radnog vremena za {{ $mjesec . '-' . $godina }}</h1>
	
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="table-responsive">
					<table id="table_id" class="display" style="width: 100%;">
						<thead>	
							<tr>
								<th class="ime">Prezime i ime</th>
								@foreach($list as $value)
								<?php 
								$dan1 = date('D', strtotime($value));
								
								switch ($dan1) {
									 case 'Mon':
										$dan = 'P';
										break;
									case 'Tue':
										$dan = 'U';
										break;
									case 'Wed':
										$dan = 'S';
										break;
									case 'Thu':
										$dan = 'Č';
										break;
									case 'Fri':
										$dan = 'P';
										break;
									case 'Sat':
										$dan = 'S';
										break;	
									case 'Sun':
										$dan = 'N';
										break;	
								 }
								?>
									<th>{{ date('d', strtotime($value)) .' '. $dan }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody id="myTable">
							@foreach($employees as $djelatnik)
								<tr>
									<td>{{ $djelatnik->employee['last_name'] . ' ' . $djelatnik->employee['first_name'] }}</td>
									@for($a = 0; $a < 31; $a++)
										<?php 
											$go = '';
											$zahtjev = DB::table('vacation_requests')->where('employee_id',$djelatnik->id)->where('zahtjev','GO')->where('GOpocetak','2018-09-17');
											if($zahtjev){
												$go='GO';
											}else {
												$go='nema';
											}
											
										?>
										<td>
				
										<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.shedulers.store') }}">
										</form>
										</td>
										
				
									@endfor
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>	
			</div>
		</div>
					
	
	
</div>

@stop