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
	<?php 
	$date1 = new DateTime($djelatnik->datum_prijave); 
    $date2 = new DateTime("now"); 
    $interval = $date1->diff($date2); 
    $years = $interval->format('%y'); 
	?>
	<body>
		<h3>Djelatnik {{ $djelatnik->first_name . ' ' . $djelatnik->last_name }} ima {{ $years }}. godišnjicu rada u firmi za 5 dana!</h3>

		<div>
		Datum prijave: {{ date("d.m.Y", strtotime($djelatnik->datum_prijave)) }}
		</div>
	</body>
</html>