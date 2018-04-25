@extends('layouts.admin')

@section('title', 'Odjavljeni radnici')

<style>
#padding1 {
    padding-left: 30px;
}
th {
    font-size: 12px;
	text-align: center;
} 
td {
    font-size: 14px;
} 
table, td, th, tr {
    vertical-align: center;
	table-layout: fixed;
} 

</style>

@section('content')
</br>
</br>
<div class="container">
    <div class="page-header">
        <div class='btn-toolbar pull-right' >
            <a class="btn btn-primary btn-lg" href="{{ route('admin.employee_terminations.create') }}"  id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Odjavi radnika
            </a>
        </div>
		</br>
        <h1>Popis odjavljenih radnika</h1>
		<input class="form-control" id="myInput" type="text" placeholder="Traži..">
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
			@if(count($employee_terminations) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="100">Djelatnik</th>
							<th width="100">Vrsta otkaza</th>
                            <th width="50">Otkazni rok</th>
							<th width="70">Datum odjave</th>
							<th width="100">Napomena</th>
                            <th width="80">Opcije</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($employee_terminations as $employee_termination)
                            <tr>
                                <td>{{ $employee_termination->employee['first_name'] . ' ' . $employee_termination->employee['last_name'] }}</td>
								<td>{{ $employee_termination->termination['naziv'] }}</td>
								<td>{{ $employee_termination->otkazni_rok }}</td>
								<td>{{ date('d.m.Y.', strtotime($employee_termination->datum_odjave)) }}
								<td>{{ $employee_termination->napomena }}</td>
								<td>
                                    <a href="{{ route('admin.employee_terminations.edit', $employee_termination->id) }}" class="btn btn-default btn-block">
                                        Ispravi
                                    </a>
									<a href="{{ route('admin.employee_terminations.destroy', $employee_termination->id) }}" class="btn btn-danger btn-block action_confirm" data-method="delete" data-token="{{ csrf_token() }}" >
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
											Obriši
									</a>
									

                                </td>

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
                    </tbody>
                </table>
				@else
					{{'Nema podataka!'}}
				@endif
            </div>
			{!! $employee_terminations->render() !!}
        </div>
    </div>
</div>

@stop
