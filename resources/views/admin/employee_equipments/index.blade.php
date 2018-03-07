@extends('layouts.admin')

@section('title', 'Zadužena radna oprema')

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
            <!--<a class="btn btn-primary btn-lg" href="{{ route('admin.employee_equipments.create') }}"  id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Zaduži opremu
            </a>-->
        </div>
		</br>
        <h1>Popis zadužene radne opreme</h1>
		<input class="form-control" id="myInput" type="text" placeholder="Traži..">
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
			@if(count($employeeEquipments) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="100">Zaduženi djelatnik</th>
							<th width="100">Radna oprema</th>
                            <th width="50">Količina</th>
							<th width="70">Datum zaduženja</th>
							<th width="70">Datum razduženja</th>
							<th width="100">Napomena</th>
                            <th width="80">Opcije</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
					
                        @foreach ($employeeEquipments as $employeeEquipment)
						
                            <tr>
                                <td>{{ $employeeEquipment->employee['first_name'] . ' ' . $employeeEquipment->employee['last_name'] }}</td>
								<td>{{ $employeeEquipment->equipment['naziv'] }}</td>
								<td>{{ $employeeEquipment->kolicina }}</td>
								<td>{{ date('d.m.Y.', strtotime($employeeEquipment->datum_zaduzenja)) }}
								<td>
								@if($employeeEquipment->datum_povrata)
								{{ date('d.m.Y.', strtotime($employeeEquipment->datum_povrata)) }}
								@endif
								</td>
								<td>{{ $employeeEquipment->napomena }}</td>
								<td>
                                    <a href="{{ route('admin.employee_equipments.destroy', $employeeEquipment->id) }}" class="btn btn-danger btn-block action_confirm {{  $employeeEquipment->datum_povrata ? 'disabled' : '' }}" data-method="delete" data-token="{{ csrf_token() }}" >
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
											Obriši
									</a>
									<a href="{{ route('admin.employee_equipments.edit', $employeeEquipment->id) }}" class="btn btn-default btn-block {{  $employeeEquipment->datum_povrata ? 'disabled' : '' }}" id="btn">
                                        
                                        Vrati zaduženo
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
			{!! $employeeEquipments->render() !!}
        </div>
    </div>
</div>

@stop
