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
</style>
	<body>

		<h4>U tijeku je zapošljavanje djelatnika {{ $djelatnik->first_name . ' ' . $djelatnik->last_name }}</h4>
		<h4>Molim nabaviti potrebnu radnu opremu za radno mjesto {{ $radno_mj }}</h4>
		<br/>
		<div><b>Napomena: </b></div>
		<div>
			{{ $napomena }}
		</div>
		<br/>
		<div>
			Konfekcijski broj:  {{ $djelatnik->konf_velicina }}
		</div>
		<div>
			Veličina cipela: {{ $djelatnik->broj_cipela }}
		</div>
	</body>
</html>