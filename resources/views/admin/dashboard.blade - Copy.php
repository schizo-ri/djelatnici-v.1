@extends('layouts.admin')

@section('title', 'Naslovnica')
<link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}"/>
@section('content')
<div class="">
    @if(Sentinel::check())
		<h2>{{ Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name }}</h2>
		<div class="dashboard_box2">
			<a href="{{ route('admin.registrations.show', $registration->id) }}">
					<span>Opći podaci</span>					
			</a>
		</div>
		<div class="dashboard_box2">
			<a class="" href="{{ route('admin.vacation_requests.index') }}"  ><span>Godišnji odmor i izostanci</span>
				</a>
		</div>
		<div class="dashboard_box2">
			<a class="" href="{{ route('admin.afterHours.index') }}"  ><span>Prekovremeni rad</span>
				</a>
		</div>
		<div class="dashboard_box2">
			<a class="" href="{{ route('admin.notices.index') }}"  ><span>Poruke</span>
				</a>
		</div>
		
		@if(count($posts))
			<div class="dashboard_box">
				<p>Primljene poruke</p>
					@foreach($posts as $post)
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="panel panel-default" >
							<div class="panel-heading">
								<h5 style="margin:0;">
									<a href="{{ route('admin.posts.show', $post->id) }}">
										{{ $post->title }} 
									</a>
									
								</h5>
							</div>
							<span>{!! str_limit($post->content, 100)  !!}</span>
							<p class="komentari">Broj komentara <a href="{{ route('admin.posts.show', $post->id) }}"><span class="badge">{{count($comments->where('post_id', $post->id)) }}</span></a></p>
						</div>
					</div>
					@endforeach
			</div>
		@endif
		@if(count($posts2))
			<div class="dashboard_box">
				<p>Poslane poruke</p>
				@foreach($posts2 as $post2)
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default" >
						<div class="panel-heading">
							<h5 style="margin:0;">
								<a href="{{ route('admin.posts.show', $post2->id) }}">
									{{ $post2->title }} 
								</a>
							</h5>
						</div>
						<span>{!! str_limit($post2->content, 100)  !!}</span>
						<p class="komentari">Broj komentara <a href="{{ route('admin.posts.show', $post2->id) }}"><span class="badge">{{count($comments->where('post_id', $post2->id)) }}</span></a></p>
					</div>
				</div>
				@endforeach
			</div>
		@endif
		<!--<div class="dashboard_box">
			<p>Opći podaci</p>
			<p>Adresa:</p>
				<span>{{ $employee->prebivaliste_adresa . ', ' .  $employee->prebivaliste_grad }}</span>
			<p>Telefon:</p>
				<span>{{ $employee->mobitel }}</span>
				<span>{{ $employee->priv_mobitel }}</span>
			<p>Odjel - Radno mjesto:</p>
				<span>{{ $employee->work['odjel'] }} - {{  $employee->work['naziv'] }}</span>
			<p>Datum prijave:</p>
				<span>{{ date('d.m.Y.', strtotime($registration->datum_prijave)) }} </span>
		</div>
		<div class="dashboard_box">
			<div class="staz" >
				<p>Staž</p>
				<p>Prijašnji poslodavci</p>
				<span>{{ $stažY . ' god. '.  $stažM . ' mj. '. $stažD . ' dana'}}</span>
				<p>Duplico</p>
				<span>{{$godina . ' god. '.  $mjeseci . ' mj. '. $dana . ' dana'}}</span>
				<p>Ukupan staž</p>
				<span>{{ $godinaUk . ' god. '.  $mjeseciUk . ' mj. '. $danaUk . ' dana'}}</span>
				
			</div>
			<div class="staz" >
				<p>Godišnji odmor</p>
				<p>Neiskorišteni dani za {{ $prosla_godina }} g.<span>{{ $GO_PG - $ukupnoGO_PG }}</span></p>
				<br>
				<p>Ukupno dana {{ $ova_godina }} g. <span>{{ $GO }} </span></p>
				<p>Iskorišteno dana za {{ $ova_godina }} g.<span>{{ $ukupnoGO }}</span></p>
				<p>Neiskorišteni dani za {{ $ova_godina }} g.<span>{{ $GO - $ukupnoGO }}</span></p>
			</div>
		</div>-->
		
<!-- Zahtjevi GO -->		
		<div class="zahtjUnos" >
				<a class="" href="{{ route('admin.vacation_requests.create') }}"  >
					Unesi novi zahtjev 
				</a>
			</div>
			<div class="zahtjUnos" >
				<a class="" href="{{ route('admin.afterHours.create') }}"  >
					Prekorad 
				</a>
			</div>
		<!--<div class="dashboard_box" style="overflow-x:auto;">
			
			@if(count($zahtjevi))
				<table class="zahtjevi">
					<thead>
						<tr>
							<th></th>
							<th class="disp_none">Datum zahtjeva</th>
							<th>Od - Do</th>
							<th>Zahtjev</th>
							<th>Napomena</th>
							<th>Odobreno</th>
						</tr>
					</thead>
					@foreach($zahtjevi as $zahtjev)
						<tbody>
							@if($zahtjev->zahtjev == 'GO' & date('Y', strtotime( $zahtjev->GOzavršetak)) == $ova_godina)
							<tr>
								<td>
									<a href="{{ route('admin.vacation_requests.edit', $zahtjev->id) }}" class="">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> 
								</td>
								<td class="disp_none">{{ date('d.m.Y.', strtotime( $zahtjev->created_at)) }}</td>
								<td>{{ date('d.m.Y.', strtotime( $zahtjev->GOpocetak)) }}<br>
								<?php 
									$brojDana =1;
								?>
								@if($zahtjev->GOzavršetak != $zahtjev->GOpocetak )
								{{ date('d.m.Y.', strtotime( $zahtjev->GOzavršetak)) }}
								<?php 
									$begin = new DateTime($zahtjev->GOpocetak);
									$end = new DateTime($zahtjev->GOzavršetak);
									$interval = DateInterval::createFromDateString('1 day');
									$period = new DatePeriod($begin, $interval, $end);
									foreach ($period as $dan) {
										if(date_format($dan,'N') < 6){
											$brojDana += 1;
										}
									}
								?>
								@elseif($zahtjev->zahtjev != 'GO') 
								{{ date('H:i', strtotime( $zahtjev->GOpocetak. ' '. $zahtjev->vrijeme_od))  }} - {{  date('H:i', strtotime( $zahtjev->GOpocetak. ' '. $zahtjev->vrijeme_do)) }}
								@endif
								</td>
								<td>{{ $zahtjev->zahtjev . ', ' . $brojDana . ' dana'}} 
								</td>
								<td>{{ $zahtjev->napomena }}</td>
								<td>{{ $zahtjev->odobreno }}  {{ $zahtjev->razlog  }}</td>
								
							</tr>
							@endif
						</tbody>
					@endforeach
				</table>
				
			@endif-->
		</div>

<!-- Zahtjevi izlasci  	
			<div class="dashboard_box" style="overflow-x:auto;">
			<p>Zahtjevi - izostanci, izlasci</p>
			
			@if($zahtjevi)
				<table class="zahtjevi">
					<thead>
						<tr>
							<th></th>
							<th class="disp_none">Datum zahtjeva</th>
							<th>Od - Do</th>
							<th>Zahtjev</th>
							<th>Napomena</th>
							<th>Odobreno</th>
							
						</tr>
					</thead>
					@foreach($zahtjevi as $zahtjev)
						<tbody>
							@if($zahtjev->zahtjev != 'GO' & date('Y', strtotime( $zahtjev->GOzavršetak)) == $ova_godina)
							<tr>
								<td>
									<a href="{{ route('admin.vacation_requests.edit', $zahtjev->id) }}" class="">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								</td>
								<td class="disp_none">{{ date('d.m.Y.', strtotime( $zahtjev->created_at)) }}</td>
								<td>{{ date('d.m.Y.', strtotime( $zahtjev->GOpocetak)) }}<br>
								@if($zahtjev->GOzavršetak != $zahtjev->GOpocetak ){{ date('d.m.Y.', strtotime( $zahtjev->GOzavršetak)) }}
								
								<?php 
									$brojDana =1;
									$begin = new DateTime($zahtjev->GOpocetak);
									$end = new DateTime($zahtjev->GOzavršetak);
									$interval = DateInterval::createFromDateString('1 day');
									$period = new DatePeriod($begin, $interval, $end);
									foreach ($period as $dan) {
										if(date_format($dan,'N') < 6){
											$brojDana += 1;
										}
									}
								?>
								@elseif($zahtjev->zahtjev != 'GO') 
								{{ date('H:i', strtotime( $zahtjev->GOpocetak. ' '. $zahtjev->vrijeme_od))  }} - {{  date('H:i', strtotime( $zahtjev->GOpocetak. ' '. $zahtjev->vrijeme_do)) }}
								@endif
								</td>
								<td>{{ $zahtjev->zahtjev}} 
									@if($zahtjev->zahtjev == 'GO') 
										{{ $brojDana . ' dana ' }}
									@endif
								</td>
								<td>{{ $zahtjev->napomena }}</td>
								<td>{{ $zahtjev->odobreno }}  {{ $zahtjev->razlog  }}</td>
								
							</tr>
							@endif
						</tbody>
					@endforeach
				</table>
			@endif
		</div>	-->		
		@if (Sentinel::inRole('administrator'))
			<div class="dashboard_box" style="overflow-x:auto;">
				<p>Odobreni zahtjevi zaposlenika</p>
				<table class="zahtjevi2">
					<thead>
						<tr>
							<th>Ime i prezime</th>
							<th class="disp_none">Datum zahtjeva</th>
							<th>Od - Do</th>
							<th>Zahtjev</th>
							<th>Napomena</th>
							<th>Odobreno</th>
							
						</tr>
					</thead>
					@foreach($zahtjeviD as $zahtjevD)
						<tbody>
							@if($zahtjevD->zahtjev == 'GO' & date('Y', strtotime( $zahtjevD->GOzavršetak)) == $ova_godina)
							<tr><td>{{ $zahtjevD->employee['first_name'] . ' ' . $zahtjevD->employee['last_name'] }}</td>
								<td class="disp_none">{{ date('d.m.Y.', strtotime( $zahtjevD->created_at)) }}</td>
								<td>{{ date('d.m.Y.', strtotime( $zahtjevD->GOpocetak)) }}<br>
								@if($zahtjevD->GOzavršetak != $zahtjevD->GOpocetak ){{ date('d.m.Y.', strtotime( $zahtjevD->GOzavršetak)) }}
								@elseif( $zahtjevD->zahtjev != 'GO')
								{{ date('H:i', strtotime( $zahtjevD->GOpocetak. ' '. $zahtjevD->vrijeme_od))  }} - {{  date('H:i', strtotime( $zahtjevD->GOpocetak. ' '. $zahtjevD->vrijeme_do)) }}
								@endif
								</td>
								
								<?php 
									$brojDana =1;
									$begin = new DateTime($zahtjevD->GOpocetak);
									$end = new DateTime($zahtjevD->GOzavršetak);
									$interval = DateInterval::createFromDateString('1 day');
									$period = new DatePeriod($begin, $interval, $end);
									foreach ($period as $dan) {
										if(date_format($dan,'N') < 6){
											$brojDana += 1;
										}
									}
								?>
								<td>{{ $zahtjevD->zahtjev }}
									@if($zahtjevD->zahtjev == 'GO') 
										{{ $brojDana . ' dana ' }}
									@endif
									</td>
								<td>{{ $zahtjevD->napomena }}</td>
								<td>{{ $zahtjevD->odobreno }} {{ $zahtjevD->razlog  }}</td>
								
							</tr>
							@endif
						</tbody>
					@endforeach
				</table>
				
			</div>
		@endif
    @else
        <div class="jumbotron">
            <h1>Welcome, Guest!</h1>
            <p>You must login to continue.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('auth.login.form') }}" role="button">Log In</a></p>
        </div>
    @endif
</div>
@stop
