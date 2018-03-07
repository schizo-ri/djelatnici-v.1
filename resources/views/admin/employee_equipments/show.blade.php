<!DOCTYPE html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
		<!-- Bootstrap - Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	 
<style>
body { 
	font-family: DejaVu Sans, sans-serif;
	font-size: 14px;
	padding-left: 30px;
	padding-right: 30px;
}
#padding1{
	padding-left: 30px;
	padding-top: 5px;
}
#padding2{
	padding-left: 500px;
}
h4{
	text-align: center;
}
th{
	text-align: center;
	font-weight: normal;
	font-size: 12px;
}
td{
	font-weight: bold;
}
</style>
	<body>
		<div class="col-lg-8">
			<br/>
			<img src="/img/Logo_Duplico.jpg" style="width:120px" />
			<br/>
			<h4>UPISNIK ZADUŽENJA</h4>
			<h4>OSOBNIH ZAŠTITNIH SREDSTAVA</h4>
				
			<br/>			
			<div>
				Osobnim zaštitnim sredstvima smatraju se odjevni i drugi predmeti i uređaji koje na sebi nose zaposlenici, a služe za sprečavanje ozljeda, profesionalnih i drugih bolesti, kao i drugih štetnih posljedica, a vijek trajanja im je određen posebnim propisom ili uputom proizvođača.
			</div>
			<div>
				Osobna zaštitna sredstva trebaju namjenski koristiti samo zaposlenici kojima su povjerena, o čemu se vodi posebna evidencija.
			</div>
			<br/>
			<div><b>
				I.	PODACI O KORISNIKU
			</b></div>
			<div id="padding1">
				Prezime (očevo ime) ime: <b>{{ $employee->last_name . ' (' . $employee->ime_oca . ') ' . $employee->first_name}}</b>
			</div>
			<div id="padding1">
				OIB: <b>{{ $employee->oib}}</b>
			</div>
			<div id="padding1">
				Radno mjesto: <b>{{ $radnoMjesto->naziv }}</b>
			</div>
			<div id="padding1">
				Organizacijska jedinica: <b>{{ $radnoMjesto->odjel }}</b>
			</div>
			<br/>

			<div><b>
				II.	EVIDENCIJA O PREUZETIM SREDSTVIMA
			</b></div>

			<div class="table-striped" id="padding1">
				<table class="table table-striped">
				
				  <tr>
					<th width="50">Redni broj</th>
					<th width="200">Naziv osobnog zaštitnog sredstva ili uređaja</th> 
					<th width="50">Količina</th>
					<th width="100">Datum izdavanja</th>
					<th width="150">Potpis radnika</th>
					<th width="100">Datum vraćanja</th>
				  </tr>
				  <?php $i=1; ?>
				 @foreach($equipments as $equipment)
				  @foreach($employeeEquipment as $oprema)
				  @if($equipment->id == $oprema->equipment_id)
				  @if($oprema->employee_id == $registration->employee_id )
					<tr>
						<td align="right" >{{ $i }}.</td>
						<td>{{ $equipment->naziv }}</td>
						<td>{{ $oprema->kolicina }}</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php $i++; ?>
				  @endif
				  @endif
				  @endforeach
				  @endforeach
				  <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				</table>
			</div>
			<br/>
			<div><b>
				III.	PROSTOR ZA PRIMJEDBE I BILJEŠKE
			</b></div>

			<div class="table" id="padding1">
				<table class="table table-striped">
					<tr border="1px solid black">
						<th height="100"></th>
					</tr>
					<tr border="1px solid black">
						<th height="5"></th>
					</tr>
				</table>
			</div>
			<div id="padding2">
				Voditelj upisnika:
			</div>
			<br/>
			<br/>
			<div id="padding2">
				____________________________
			</div>
			<div id="padding2">
				(prezime, ime i vlastoručni potpis)
			</div>
			
		</div>
	</body>
	
</html>