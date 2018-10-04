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

<div class="">
    <div class="page-header">
        <h1>Popis zadužene radne opreme</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
              <div class="table-responsive" id="tblData">
			@if(count($employeeEquipments) > 0)
                <table id="table_id" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th >Zaduženi djelatnik</th>
							<th >Radna oprema</th>
                            <th >Količina</th>
							<th>Datum zaduženja</th>
							<th >Datum razduženja</th>
							<th >Napomena</th>
                            <th class="not-export-column">Opcije</th>
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
                                    <a href="{{ route('admin.employee_equipments.edit', $employeeEquipment->id) }}" class="{{  $employeeEquipment->datum_povrata ? 'disabled' : '' }}">
											Razduži
                                    </a>
									<a href="{{ route('admin.employee_equipments.destroy', $employeeEquipment->id) }}" class="btn-block action_confirm {{  $employeeEquipment->datum_povrata ? 'disabled' : '' }}" data-method="delete" data-token="{{ csrf_token() }}" >
										<i class="far fa-trash-alt"></i>
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
