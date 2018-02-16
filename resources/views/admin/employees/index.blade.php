@extends('layouts.admin')

@section('title', 'Zapošljavanje')

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
            <a class="btn btn-primary btn-lg" href="{{ route('admin.employees.create') }}"  id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Unesi novog kandidata
            </a>
        </div>
		</br>
        <h1>Kandidati za zapošljavanje</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($employees) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="150">Radno mjesto</th>
							<th width="100">Ime i prezime</th>
                            <th width="80">Datum rođenja</th>
                            <th width="100">Opcije</th>
							<th width="70">Prijava</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
						@if(!DB::table('registrations')->where('employee_id',$employee->id)->first() )
                            <tr>
                                <td>
									<p>{{ $employee->work['odjel']}}</p>
									<p id="padding1">{{ $employee->work['naziv']}}</p>
								</td>
								<td>
									<a href="{{ route('admin.employees.show', $employee->id) }}">
										{{ $employee->first_name . ' ' . $employee->last_name }}
									</a>
								</td>
                                <td>{{ date('d.m.Y', strtotime($employee->datum_rodjenja)) }}</td>
                                <td>
                                    <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Ispravi
                                    </a>
                                    <a href="{{ route('admin.employees.destroy', $employee->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Obriši
                                    </a>
                                </td>
								<td>
									<a href="{{ route('admin.registrations.create', $employee->id) }}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Prijavi radnika
                                    </a>
								</td>
                            </tr>
							@endif
                        @endforeach
                    </tbody>
                </table>
				@else
					{{'Nema podataka!'}}
				@endif
            </div>
			{!! $employees->render() !!}
        </div>
    </div>
</div>

@stop
