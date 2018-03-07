<!DOCTYPE html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
	</head>
<style>
#padding {
    padding-left: 1cm;

}
body { 
	font-family: DejaVu Sans, sans-serif;
	font-size: 14px;
}

</style>

<body id="padding">
</br>
</br>
</br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
            <div class="panel-heading">
				<h3>{{ $registration->employee['first_name'] . ' ' . $registration->employee['last_name'] }}</h3>
				</br>
				<p><b>Ime oca, majke: </b>{{ $registration->employee['ime_oca']. ', ' . $registration->employee['ime_majke'] }}</p>
				<p><b>OIB: </b>{{ $registration->employee['oib'] }}</p>
				<p><b>Osobna iskaznica: </b>{{ $registration->employee['oi'] }}</p>
				<p><b>Datum rođenja: </b>{{ date('d.m.Y', strtotime($registration->employee['datum_rodjenja'])) }}</p>
				<p><b>Mjesto rođenja: </b>{{ $registration->employee['mjesto_rodjenja']  }}</p>
				<p><b>Mobitel: </b>{{ $registration->employee['mobitel'] }}</p>
				<p><b>E-mail: </b>{{ $registration->employee['email'] }}</p>
				</br>
				<p><b>Prebivalište: </b>{{ $registration->employee['prebivaliste_adresa']  . ', ' . $registration->employee['prebivaliste_grad']  }}</p>
				@if( $registration->employee['boravište_adresa']  )
				<p><b>Boravište: </b>{{ $registration->employee['boravište_adresa'] . ', ' . $registration->employee['boravište_grad']  }}</p>
				@endif
				</br>
				<p><b>Zvanje: </b>{{ $registration->employee['zvanje']  }}</p>
				<p><b>Konfekcijski broj: </b>{{ $registration->employee['konf_velicina']  }}</p>
				<p><b>Veličina cipela: </b>{{$registration->employee['broj_cipela']  }}</p>
				<p><b>Staž kod prošlog poslodavca: </b>{{ $registration->staz  }}</p>
				<p><b>Napomena: </b>{{ $registration->napomena }}</p>
				</br>
				<p><b>Bračno stanje: </b>{{ $registration->employee['bracno_stanje']  }}</p>
				<p><b>Broj djece: </b>{{ DB::table('kids')->where('employee_id', $registration->employee_id )->count() }}</p>
				
				@if(DB::table('kids')->where('employee_id', $registration->employee_id )->count())
					@foreach(DB::table('kids')->where('employee_id', $registration->employee_id )->get() as $kid)
					<p id="padding">{{ $kid->ime . ' '.  $kid->prezime . ', '.  date('d.m.Y', strtotime($kid->datum_rodjenja))  }}</p>
					@endforeach
				@endif
				</br>
				<p><b>Radno mjesto: </b>{{  $registration->work['odjel'] . ' - '. $registration->work['naziv'] }}</p>
				<p><b>Liječnički pregled: </b>{{ date('d.m.Y', strtotime($registration->employee['lijecn_pregled'] ))  }}</p>
				<p><b>Zaštita na radu: </b>{{ date('d.m.Y', strtotime($registration->employee['ZNR'] ))  }}</p>
				</br>
				<p><b>Zadužena oprema: </b>
				@foreach(DB::table('employee_equipments')->where('employee_id', $registration->employee_id )->get() as $oprema)
				<p id="padding">{{ DB::table('equipment')->where('id', $oprema->equipment_id)->value('naziv') . ' - '.  $oprema->kolicina . ' kom'}}
					@if($oprema->datum_povrata)
					{{' - razduženo: ' . $oprema->datum_povrata }}
					@endif
					</p>
				@endforeach
				
			</div>
           	
        </div>

    </div>
	
	</body>
</html>
