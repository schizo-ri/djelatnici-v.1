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
</br>
</br>
<div class="container">
    <div class="page-header">
        <div class='btn-toolbar pull-right' >
            <a class="btn btn-primary btn-lg" href="{{ route('admin.equipments.create') }}"  id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Unesi novu opremu
            </a>
        </div>
		</br>
        <h1>Popis radne opreme</h1>
		<input class="form-control" id="myInput" type="text" placeholder="Traži..">
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($equipments) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="150">Naziv</th>
							<th width="100">Napomena</th>
                            <th width="50">Količina (monteri) </th>
							<th width="50">Količina (inženjeri) </th>
							<th width="80">Odgovorni djelatnik</th>
                            <th width="100">Opcije</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($equipments as $equipment)
                            <tr>
                                <td>{{ $equipment->naziv }}</td>
								<td>{{ $equipment->napomena }}</td>
								<td>{{ $equipment->količina_monter }}</td>
								<td>{{ $equipment->količina_inženjer }}</td>
								<td>{{ $equipment->user['first_name'] . ' ' . $equipment->user['last_name'] }}</td>
								<td>
                                    <a href="{{ route('admin.equipments.edit', $equipment->id) }}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Ispravi
                                    </a>
                                    <a href="{{ route('admin.equipments.destroy', $equipment->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
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
			{!! $equipments->render() !!}
        </div>
    </div>
</div>

@stop
