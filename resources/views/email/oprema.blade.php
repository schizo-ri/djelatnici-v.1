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

		<h4>Za djelatnika {{ $djelatnik->first_name . ' ' . $djelatnik->last_name }} naručena je slijedeća opremu</h4>
		
		@foreach($equipments as $equipment)
			@foreach($input_oprema as $key => $value)
			@if($value)
				@foreach($value as $key2 => $oprema)
					
					@if($equipment->id == $oprema)
						@if($key == 'equipment_id1')
							<div>
							{{ $equipment->naziv . ' ' . $equipment->količina_monter . ' kom' }}
							</div>
						@else
							<div>
							{{ $equipment->naziv . ' - ' . $equipment->količina_inženjer . ' kom' }}
							</div>
						@endif
					@endif
				@endforeach
				@endif
			@endforeach
		@endforeach
		<br/>
		<div><b>Napomena: </b></div>
		<div>
			{{ $napomena }}
		</div>
	</body>
</html>