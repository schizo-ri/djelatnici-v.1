@extends('layouts.admin')

@section('title', 'Naslovnica')

@section('content')
<div class="">
    @if(Sentinel::check())
		<h2>{{ Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name }}</h2>
		<div class="dashboard_box1">
			<div class="BTNbox">
				<div class="dashboard_box2">
					<a href="{{ route('admin.registrations.show', $registration->id) }}">
						<span>Opći podaci<br>{{ Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name }}</span></a>
				</div>
			</div>
			<div class="BTNbox">
				<div class="dashboard_box2">
					<a class="" href="{{ route('admin.vacation_requests.index') }}"  ><span>Godišnji odmor i izostanci</span></a>
				</div>
			</div>
			<div class="BTNbox">
				<div class="dashboard_box2">
					<a class="" href="{{ route('admin.afterHours.index') }}"><span>Prekovremeni rad</span></a>
				</div>
			</div>
			<div class="BTNbox">
				<div class="dashboard_box2">
					<a class="" href="{{ route('admin.posts.index') }}"  ><span>Poruke</span></a>
				</div>
			</div>
		</div>
</div>
@if(count($posts))
	<div class="dashboard_box">
		<button class="collapsible">Primljene poruke</button>
		<div class="content ">
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
	</div>
@endif
@if(count($posts2))
	<div class="dashboard_box">
		<button class="collapsible">Poslane poruke</button>
		<div class="content ">
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
	</div>		
@endif
	@if (Sentinel::inRole('administrator'))
		<div class="dashboard_box" style="overflow-x:auto;">
			<button class="collapsible">Odobreni zahtjevi zaposlenika</button>
			<div class="content ">
				<table class="zahtjevi2">
					<thead>
						<tr>
							<th>Ime i prezime</th>
							<th>Od - Do</th>
							<th>Zahtjev</th>
							<th>Napomena</th>
							<th>Odobreno</th>
							
						</tr>
					</thead>
					@foreach($zahtjeviD as $zahtjevD)
						<tbody>
							@if(date('Y', strtotime( $zahtjevD->GOzavršetak)) == $ova_godina)
							<tr><td>{{ $zahtjevD->employee['first_name'] . ' ' . $zahtjevD->employee['last_name'] }}</td>
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
