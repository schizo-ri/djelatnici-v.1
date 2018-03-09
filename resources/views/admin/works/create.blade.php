@extends('layouts.admin')

@section('title', 'Novo radno mjesto')

@section('content')

<div class="row">
</br>
</br>
</br>
</br>
  <h1>Upis novog radnog mjesta</h1>
</div> 
<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body">
				 <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.works.store') }}">
				 
					<div class="form-group {{ ($errors->has('employee_id'))  ? 'has-error' : '' }}">
                        <label>Odjel</label>
						<select class="form-control" name="odjel" id="sel1" value="{{ old('odjel') }}">
							<option name="odjel">{{ 'Zajednički poslovi' }}</option>
							<option name="odjel">{{ 'Odjel informatičkih tehnologija' }}</option>
							<option name="odjel">{{ 'Inženjering'  }}</option>
						</select>
						{!! ($errors->has('employee_id') ? $errors->first('employee_id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group {{ ($errors->has('ime')) ? 'has-error' : '' }}">
						<label>Naziv radnog mjesta:</label>
						<input name="naziv" type="text" class="form-control" value="{{ old('naziv') }}">
						{!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<div class="form-group">
						<label>Pravilnik:</label>
						<select class="form-control" name="pravilnik" id="sel1" value="{{ old('pravilnik') }}">
							<option selected="selected" value=""></option>
							<option name="pravilnik">{{ 'Pravilnik o poslovima s posebnim uvjetima rada, čl. 3.' }}</option>
							<option name="pravilnik">{{ 'Pravilnik o sigurnosti i zaštiti zdravlja pri radu sa računalom' }}</option>
						</select>
					</div>
					<div class="form-group">
						<label>Prema točkama:</label>
						<input name="tocke" type="text" class="form-control" value="{{ old('tocke') }}">
					</div>
					<input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši radno mjesto" id="stil1">
				</form>
			</div>
		</div>
	</div>
</div>

@stop