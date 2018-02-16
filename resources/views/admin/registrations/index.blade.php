@extends('layouts.admin')

@section('title', 'Duplico djelatnici')

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
        <!--<div class='btn-toolbar pull-right' >
            <a class="btn btn-primary btn-lg" href="{{ route('admin.registrations.create') }}"  id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Unesi novog radnika
            </a>
        </div>-->
		</br>
        <h1>Prijavljeni radnici</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($registrations) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
							<th width="100">Ime i prezime</th>
							<th width="100">Datum prijave</th>
                            <th width="80">Datum rođenja</th>
							<th width="150">Radno mjesto</th>
							<th width="150">Oprema</th>
                            <th width="100">Opcije</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                            <tr>
								<td>
									<a href="">
										{{ $registration->employee['first_name'] . ' '. $registration->employee['last_name'] }}
									</a>
								</td>
                                <td>{{ date('d.m.Y', strtotime($registration->employee['datum_prijave'])) }}</td>
                                </td>
								<td>{{ date('d.m.Y', strtotime($registration->employee['datum_rodjenja'])) }}</td>
								<td>{{ $registration->work['odjel'] . ' - ' . $registration->work['naziv'] }}</td>
								<td>
                                    <a href="{{ route('admin.employee_equipments.create', $registration->employee_id) }}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Zaduži opremu
                                    </a>
								</td>	
                                <td>
                                    <a href="{{ route('admin.registrations.edit', $registration->id) }}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Ispravi
                                    </a>
                                    <a href="{{ route('admin.registrations.destroy', $registration->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
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
			{!! $registrations->render() !!}
        </div>
    </div>
</div>

@stop
