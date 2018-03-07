<!DOCTYPE html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Djelatnik {{ $registration->employee['first_name'] . ' ' . $registration->employee['last_name']}} slavi rođendan!</h2>

		<div>
		Datum rođenja: {{ $registration->employee['datum_rodjenja']}}
		</div>
	</body>
</html>