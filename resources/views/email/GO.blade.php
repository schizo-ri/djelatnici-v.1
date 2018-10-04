<!DOCTYPE html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
	</head>
	<style>
	body { 
		font-family: DejaVu Sans, sans-serif;
		font-size: 10px;
	}
	.red{
		color:red;
		font-weight:bold;
	}
	</style>
	<body>
		<h3>Izostanci</h3>
		@foreach($dan_izostanci as $djelatnik)
			<div>
				{{ $djelatnik['zahtjev'] . ', ' . $djelatnik['ime'] . ', ' . (string)$djelatnik['period'] }} 
					@if($djelatnik['zahtjev'] == 'Izostanak' || $djelatnik['zahtjev'] == 'Izlazak')
					{{', ' . $djelatnik['vrijeme'] . ', ' . $djelatnik['napomena']}}
					@endif
					@if($djelatnik['zahtjev'] == 'GO')
						@if($djelatnik['dani_GO'] != '' && $djelatnik['dani_GO'] >= 0)
						{{ ', neiskorišteno ' . $djelatnik['dani_GO'] . ' dana' }}
						@elseif($djelatnik['dani_GO'] != '' && $djelatnik['dani_GO']< 0)
						<span class="red">{{ ', iskorišteno ' . $djelatnik['dani_GO'] . ' dana više' }}</span>
						@endif
					@endif
			</div>
		@endforeach
	</body>
</html>