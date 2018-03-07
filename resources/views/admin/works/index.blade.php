@extends('layouts.admin')

@section('title', 'Radna mjesta')

@section('content')
</br>
</br>
<div class="container">
    <div class="page-header">
        <div class='btn-toolbar pull-right' >
            <a class="btn btn-primary btn-lg" href="{{ route('admin.works.create') }}"  id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Unesi novo radno mjesto
            </a>
        </div>
		</br>
        <h1>Radna mjesta</h1>
		<input class="form-control" id="myInput" type="text" placeholder="Traži..">
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($works) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Odjel</th>
                            <th>Naziv</th>
                            <th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($works as $work)
                            <tr>
                                <td>{{ $work->odjel }}</td>
                                <td>{{ $work->naziv }}</td>
                                  <td>
                                    <a href="{{ route('admin.works.edit', $work->id) }}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Ispravi
                                    </a>
                                    <a href="{{ route('admin.works.destroy', $work->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
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
			{!! $works->render() !!}
        </div>
    </div>
</div>

@stop
