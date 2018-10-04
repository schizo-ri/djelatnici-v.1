@extends('layouts.admin')

@section('title', 'Zahtjevi')

@section('content')
</br>
</br>
<div class="container">
    <div class="page-header">
        <div class='btn-toolbar pull-right' >
            <a class="btn btn-primary btn-lg" href="{{ route('admin.vacation_requests.create') }}"  id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Unesi 
            </a>
        </div>
		</br>
        <h1>Zahtjevi zaposlenika</h1>
		<input class="form-control" id="myInput" type="text" placeholder="Traži..">
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($requests) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Ime i prezime</th>
							<th>Zahtjev</th>
							<th>Datum zahtjeva</th>
							<th>Napomena</th>
							<th>Datum početka</th>
							<th>Datum završetka</th>
							<th>Vrijeme</th>
                            <th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($requests as $request)
                            <tr class="collapsible">
                                <td>{{ $request->employee['first_name'] . ' ' .  $request->employee['last_name'] }}</td>
								<td>{{ $request->zahtjev }}</td>
								<td>{{ date('d.m.Y', strtotime($request->created_at)) }}</td>
								<td>{{ $request->napomena }}</td>
                                <td>{{ date('d.m.Y', strtotime($request->GOpocetak)) }}</td>
								<td>{{ date('d.m.Y', strtotime($request->GOzavršetak)) }}</td>
								<td>{{ date('H:i', strtotime( $request->GOpocetak. ' '. $request->vrijeme_od))  }} - {{  date('H:i', strtotime( $request->GOpocetak. ' '. $request->vrijeme_do)) }}</td>
                                <td>
                                    <a href="{{ route('admin.vacation_requests.edit', $request->id) }}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Ispravi
                                    </a>
                                    <a href="{{ route('admin.vacation_requests.destroy', $request->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Obriši
                                    </a>
                                </td>
                            </tr>
							
							<tr style="display:none">
							@if($request->odobreno)
								<td>
								Odobrenje:{{ $request->odobreno }}<br>
								{{$request->authorized['first_name'] }}
								{{ $request->authorized['last_name']}}<br>
								@if($request->razlog)
									{{ $request->razlog}} 
								@endif
								</td>
							@endif
							</tr>
							
                        @endforeach
						<script>
						$(document).ready(function(){
						  $("#myInput").on("keyup", function() {
							var value = $(this).val().toLowerCase();
							$("#myTable tr").filter(function() {
							  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
							});
						  });
						});
						</script>
						<script>
						var coll = document.getElementsByClassName("collapsible");
						var i;

						for (i = 0; i < coll.length; i++) {
						  coll[i].addEventListener("click", function() {
							this.classList.toggle("active");
							var content = this.nextElementSibling;
							if (content.style.display === "block") {
							  content.style.display = "none";
							} else {
							  content.style.display = "block";
							}
						  });
						}
						</script>
                    </tbody>
                </table>
				@else
					{{'Nema podataka!'}}
				@endif
            </div>
        </div>
    </div>
</div>

@stop
