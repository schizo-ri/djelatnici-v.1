@extends('layouts.admin')

@section('title', 'Radna oprema')

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

<div class="">
    <div class="page-header">
        <div class='btn-toolbar pull-right' >
            <a class="btn btn-primary btn-lg" href="{{ route('admin.equipments.create') }}"  id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Unesi novu opremu
            </a>
        </div>

        <h1>Popis radne opreme</h1>
		
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($equipments) > 0)
                <table id="table_id" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th width="150">Naziv</th>
							<th width="100">Napomena</th>
                            <th width="50">Količina (monteri) </th>
							<th width="50">Količina (inženjeri) </th>
							<th width="80">Odgovorni djelatnik</th>
                            <th width="100" class="not-export-column">Opcije</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($equipments as $equipment)
                            <tr>
                                <td>{{ $equipment->naziv }}</td>
								<td>{{ $equipment->napomena }}</td>
								<td>{{ $equipment->količina_monter }}</td>
								<td>{{ $equipment->količina_inženjer }}</td>
								<td>{{ $equipment->users['first_name'] . ' ' . $equipment->users['last_name'] }}</td>
								<td>
                                    <a href="{{ route('admin.equipments.edit', $equipment->id) }}" >
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </a>
                                    <a href="{{ route('admin.equipments.destroy', $equipment->id) }}" class="action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                       <i class="far fa-trash-alt"></i>
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
        </div>
    </div>
</div>
@stop
