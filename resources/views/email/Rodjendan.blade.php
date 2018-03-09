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
		<h3>Djelatnik {{ $djelatnik->first_name . ' ' . $djelatnik->last_name }} slavi rođendan!</h3>

		<div>
		Datum rođenja: {{ date("d.m.Y", strtotime($djelatnik->datum_rodjenja)) }}
		</div>
	</body>
</html>