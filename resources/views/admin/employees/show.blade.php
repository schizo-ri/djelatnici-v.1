@extends('layouts.admin')

@section('title', 'Kandidat')
<style>
#padding {
    padding-left: 1cm;
}
</style>
@section('content')
</br>
</br>
</br>
    <div class="container">
        <div class='btn-toolbar'>
            <a class="btn btn-primary btn-lg" href="{{ url()->previous() }}"  id="stil1">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                Natrag
            </a>
			
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
            <div class="panel-heading">
				<h3>{{ $employee->first_name . ' ' . $employee->last_name }}</h3>
				</br>
				<p><b>Ime oca, majke: </b>{{ $employee->ime_oca . ', ' . $employee->ime_majke}}</p>
				<p><b>OIB: </b>{{ $employee->oib }}</p>
				<p><b>Osobna iskaznica: </b>{{ $employee->oi }}</p>
				<p><b>Datum rođenja: </b>{{ $employee->datum_rodjenja }}</p>
				<p><b>Mjesto rođenja: </b>{{ $employee->mjesto_rodjenja }}</p>
				<p><b>Mobitel: </b>{{ $employee->mobitel }}</p>
				<p><b>E-mail: </b>{{ $employee->email }}</p>
				</br>
				<p><b>Prebivalište: </b>{{ $employee->prebivaliste_adresa . ', ' . $employee->prebivaliste_grad }}</p>
				@if( $employee->boravište_adresa )
				<p><b>Boravište: </b>{{ $employee->boravište_adresa . ', ' . $employee->boravište_grad }}</p>
				@endif
				</br>
				<p><b>Zvanje: </b>{{ $employee->zvanje }}</p>
				<p><b>Konfekcijski broj: </b>{{ $employee->konf_velicina }}</p>
				<p><b>Veličina cipela: </b>{{ $employee->broj_cipela }}</p>
				<p><b>Napomena: </b>{{ $employee->napomena }}</p>
				</br>
				<p><b>Bračno stanje: </b>{{ $employee->bracno_stanje }}</p>
				<p><b>Broj djece: </b>{{ DB::table('kids')->where('employee_id', $employee->id)->count() }}</p>
				
				@if(DB::table('kids')->where('employee_id', $employee->id)->count())
					@foreach(DB::table('kids')->where('employee_id', $employee->id)->get() as $kid)
					<p id="padding">{{ $kid->ime . ' '.  $kid->prezime . ', '.  date('d.m.Y', strtotime($kid->datum_rodjenja))  }}</p>
					@endforeach
				@endif
				</br>
				<p><b>Radno mjesto: </b>{{ $employee->work['odjel'] . ' - '. $employee->work['naziv'] }}</p>
				<p><b>Liječnički pregled: </b>{{ date('d.m.Y', strtotime($employee->lijecn_pregled))  }}</p>
				<p><b>Zaštita na radu: </b>{{ date('d.m.Y', strtotime($employee->ZNR))  }}</p>
				
			</div>
           	
        </div>

    </div>
	
	

@stop
