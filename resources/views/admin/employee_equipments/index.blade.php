@extends('layouts.admin')

@section('title', 'Zadužena radna oprema')

<style>
#padding1 {
    padding-left: 30px;
}
th {
    font-size: 12px;
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
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($employeeEquipments) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="150">Zaduženi djelatnik</th>
							<th width="100">Radna oprema</th>
                            <th width="50">Količina</th>
							<th width="80">Napomena</th>
                            <th width="100">Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employeeEquipments as $employeeEquipment)
                            <tr>
                                <td>{{ $employeeEquipment->employee['first_name'] . ' ' . $employeeEquipment->employee['last_name'] }}</td>
								<td>{{ $employeeEquipment->equipment['naziv'] }}</td>
								<td>{{ $employeeEquipment->količina }}</td>
								<td>{{ $employeeEquipment->napomena }}</td>
								<td>
                                    <a href="{{ route('admin.employee_equipments.edit', $employeeEquipment->id) }}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Ispravi
                                    </a>
                                    <a href="{{ route('admin.employee_equipments.destroy', $employeeEquipment->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Obriši
                                    </a>
                                </td>
                            </tr>
                        @endforeach
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
