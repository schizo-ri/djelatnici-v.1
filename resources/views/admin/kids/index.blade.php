@extends('layouts.admin')

@section('title', 'Djeca')

@section('content')
</br>
</br>
<div class="container">
    <div class="page-header">
        <div class='btn-toolbar pull-right' >
            <a class="btn btn-primary btn-lg" href="{{ route('admin.kids.create') }}"  id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Unesi novo dijete
            </a>
        </div>
		</br>
        <h1>Djeca zaposlenika</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($kids) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Roditelj</th>
							<th>Ime i prezime</th>
							<th>Datum rođenja</th>
                            <th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kids as $kid)
                            <tr>
                                <td>{{ $kid->employee['first_name'] . ' ' . $kid->employee['last_name'] }}</td>
								<td>{{ $kid->ime . ' ' . $kid->prezime }}</td>
                                <td>{{ date('d.m.Y', strtotime($kid->datum_rodjenja)) }}</td>
                                  <td>
                                    <a href="{{ route('admin.kids.edit', $kid->id) }}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Ispravi
                                    </a>
                                    <a href="{{ route('admin.kids.destroy', $kid->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
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
			{!! $kids->render() !!}
        </div>
    </div>
</div>

@stop
