@extends('layouts.admin')

@section('title', 'Evidencija radnog vremena')
<link rel="stylesheet" href="{{ URL::asset('css/work.css') }}" />

@section('content')

<div class="evidencija">
	<h1>Evidencija radnog vremena za {{ $mjesec . '-' . $godina }}</h1>
	<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.workingHours.store') }}">
	<?php $i=1; ?>
	<table class="lista">
			<tr>
				<th class="ime">Prezime i ime</th>
				@foreach($list as $value)
				<?php 
				$dan1 = date('D', strtotime($value));
				
				switch ($dan1) {
					 case 'Mon':
						$dan = 'P';
						break;
					case 'Tue':
						$dan = 'U';
						break;
					case 'Wed':
						$dan = 'S';
						break;
					case 'Thu':
						$dan = 'Č';
						break;
					case 'Fri':
						$dan = 'P';
						break;
					case 'Sat':
						$dan = 'S';
						break;	
					case 'Sun':
						$dan = 'N';
						break;	
				 }
				?>
					<th>{{ date('d', strtotime($value)) .' '. $dan }}</th>
					<input type="hidden" name="dan{{'_'.$i}}" value="{{ date('d', strtotime($value)) }}.{{ date('m', strtotime($value)) }}." />
					<?php $i++; ?>
				@endforeach
			</tr>
			<?php $i=1; ?>
			@foreach($djelatnici as $djelatnik)
			<tr>
				<td>{{ $djelatnik->employee['last_name'] . ' ' . $djelatnik->employee['first_name'] }}</td>
				<input type="hidden" class="ime" name="ime{{'_'.$i}}" value="{{ $djelatnik->id }}">
				@for($a = 0; $a < 10; $a++)
					<td class="evid">
						<select name="oznaka_id{{'_'.$i}}">
							<option value="R">R</option>
							<option value="G">G</option>
							<option value="B">B</option>
							<option value="S">S</option>
						</select>
					</td>
				@endfor
			</tr>
			<?php $i++; ?>
			@endforeach

	</table>
	<input name="_token" value="{{ csrf_token() }}" type="hidden">
    <input class="btn btn-lg btn-primaryk" type="submit" value="Upiši">
	</form>
</div>

@stop