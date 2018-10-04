@extends('layouts.admin')

@section('title', 'Otkazi')

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
    <div class="">
        <div class='btn-toolbar pull-right' >
            <a class="btn btn-primary btn-lg" href="{{ route('admin.terminations.create') }}" id="stil1" >
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Unesi novu vrstu otkaza
            </a>
        </div>
		</br>
        <h1>Otkazi</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($terminations) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="150">Naziv</th>
                            <th width="100">Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terminations as $termination)
                            <tr>
                                <td>{{ $termination->naziv }}</td>
                                <td>
                                    <a href="{{ route('admin.terminations.edit', $termination->id) }}">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </a>
                                    <a href="{{ route('admin.terminations.destroy', $termination->id) }}" class="action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
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
			{!! $terminations->render() !!}
        </div>
    </div>
</div>

@stop
