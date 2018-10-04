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
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
            <div class="panel-heading">
				<h3>{{ $employee_termination->employee['first_name'] . ' ' . $employee_termination->employee['last_name'] }}</h3>
				<hr>
				<p><b>Datum prijave: </b>{{ date('d.m.Y', strtotime($registration->datum_prijave )) }}</p>
				<p><b>Datum odjave: </b>{{ date('d.m.Y', strtotime($employee_termination->datum_odjave)) }}</p>
				<p><b>Vrsta otkaza: </b>{{ $employee_termination->termination['naziv']  }}</p>
				<hr>
				<p><b>Ime oca, majke: </b>{{ $employee_termination->employee['ime_oca']. ', ' . $employee_termination->employee['ime_majke'] }}</p>
				<p><b>OIB: </b>{{ $employee_termination->employee['oib'] }}</p>
				<p><b>Osobna iskaznica: </b>{{ $employee_termination->employee['oi'] }}</p>
				<p><b>Datum isteka osobne iskaznice: </b>{{ date('d.m.Y', strtotime( $employee_termination->employee['oi_istek'] )) }}</p>
				<p><b>Datum rođenja: </b>{{ date('d.m.Y', strtotime($employee_termination->employee['datum_rodjenja'])) }}</p>
				<p><b>Mjesto rođenja: </b>{{ $employee_termination->employee['mjesto_rodjenja']  }}</p>
				<p><b>Mobitel: </b>{{ $employee_termination->employee['mobitel'] }}</p>
				<p><b>Privatan mobitel: </b>{{ $employee_termination->employee['priv_mobitel'] }}</p>
				<p><b>E-mail: </b>{{ $employee_termination->employee['email'] }}</p>
				<p><b>privatan e-mail: </b>{{ $employee_termination->employee['priv_email'] }}</p>
				</br>
				<p><b>Prebivalište: </b>{{ $employee_termination->employee['prebivaliste_adresa']  . ', ' . $employee_termination->employee['prebivaliste_grad']  }}</p>
				@if( $employee_termination->employee['boravište_adresa']  )
				<p><b>Boravište: </b>{{ $employee_termination->employee['boravište_adresa'] . ', ' . $employee_termination->employee['boravište_grad']  }}</p>
				@endif
				</br>
				<p><b>Zvanje: </b>{{ $employee_termination->employee['zvanje']  }}</p>
				<p><b>Stručna sprema: </b>{{ $employee_termination->employee['sprema']  }}</p>
				<p><b>Konfekcijski broj: </b>{{ $employee_termination->employee['konf_velicina']  }}</p>
				<p><b>Veličina cipela: </b>{{$employee_termination->employee['broj_cipela']  }}</p>
				<p><b>Staž kod prošlog poslodavca: </b>{{ $employee_termination->staz  }}</p>
				<p><b>Napomena: </b>{{ $employee_termination->napomena }}</p>
				</br>
				<p><b>Bračno stanje: </b>{{ $employee_termination->employee['bracno_stanje']  }}</p>
				<p><b>Broj djece: </b>{{ DB::table('kids')->where('employee_id', $employee_termination->employee_id )->count() }}</p>
				
				@if(DB::table('kids')->where('employee_id', $employee_termination->employee_id )->count())
					@foreach(DB::table('kids')->where('employee_id', $employee_termination->employee_id )->get() as $kid)
					<p id="padding">{{ $kid->ime . ' '.  $kid->prezime . ', '.  date('d.m.Y', strtotime($kid->datum_rodjenja))  }}</p>
					@endforeach
				@endif
				</br>
				<p><b>Radno mjesto: </b>{{  $registration->odjel . ' - '. $registration->naziv }}</p>
				<p><b>Liječnički pregled: </b>{{ date('d.m.Y', strtotime($employee_termination->employee['lijecn_pregled'] ))  }}</p>
				<p><b>Zaštita na radu: </b>{{ date('d.m.Y', strtotime($employee_termination->employee['ZNR'] ))  }}</p>
				</br>
				<p><b>Zadužena oprema: </b>
				@foreach(DB::table('employee_equipments')->where('employee_id', $employee_termination->employee_id )->get() as $oprema)
				<p id="padding">{{ DB::table('equipment')->where('id', $oprema->equipment_id)->value('naziv') . ' - '.  $oprema->kolicina . ' kom'}}
					@if($oprema->datum_povrata)
					{{' - razduženo: ' . $oprema->datum_povrata }}
					@endif
					</p>
				@endforeach
				</br>
				</br>
				
			</div>
           	
        </div>

    </div>
	
	</body>
</html>
