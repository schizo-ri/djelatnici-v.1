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
	$date1->modify('+6 month');
    $date2 = new DateTime("now");
    $interval = $date1->diff($date2); 
    $days = $interval->format('%a');
	?>
	<body>
		<h3>Djelatniku {{ $ime . ' ' . $prezime }} ističe probni rok za  {{ $days }} dana!</h3>

		<div>
		Datum prijave: {{ date("d.m.Y", strtotime($djelatnik->datum_prijave)) }}
		</div>
	</body>
</html>