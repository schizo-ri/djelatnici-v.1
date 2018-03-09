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
	$date1 = new DateTime($djelatnik->lijecn_pregled); 
    $date2 = new DateTime("now"); 
    $interval = $date1->diff($date2); 
    $days = $interval->format('%a');  
	?>
	<body>
		<h3>Djelatnik {{ $djelatnik->first_name . ' ' . $djelatnik->last_name }} treba na liječnički pregled za  {{ $days }} dana!</h3>

		<div>
		Datum liječničkog: {{ date("d.m.Y", strtotime($djelatnik->lijecn_pregled)) }}
		</div>
	</body>
</html>