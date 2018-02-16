@extends('layouts.admin')

@section('title', 'Zaduženje opreme')

@section('content')

<?php 
$employee_id = substr(URL::full(),strpos(URL::full(),'?')+1);
$employee = $employees->where('id', $employee_id)->first();
?>
<div class="row">
</br>
</br>
</br>
</br>
  <h1>Zaduženje radne opreme</h1>
</div> 
<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body">
				 <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.employee_equipments.store') }}">
				 
					<div class="form-group">
                        <span><b>Ime i prezime:</b></span>
						<span>{{ $employee->first_name . ' ' . $employee->last_name }}</span>
						<input type="hidden" name="employee_id" type="text" class="form-control" value="{{ $employee_id }}">
						{!! ($errors->has('employee_id') ? $errors->first('employee_id', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<div class="form-group">
                        <label>Oprema</label>
						
						@foreach(DB::table('equipment')->orderBy('User_id','ASC')->get() as $oprema)
						<div class="checkbox">
							<label>
								<input type="checkbox" name="equipment_id" value="{{ $oprema->id }}">
									{{ $oprema->naziv }}
							</label>
						</div>
						@endforeach
					</div>
					<div class="form-group {{ ($errors->has('kolicina'))  ? 'has-error' : '' }}">
                        <label>Količina</label>
						<input name="kolicina" type="text" class="form-control" value="{{ old('količina_monter') }}">
						{!! ($errors->has('kolicina') ? $errors->first('kolicina', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<div class="form-group">
                        <label>Napomena</label>
						<textarea class="form-control" name="napomena"></textarea>
					</div>
					<!--<div class="form-group {{ ($errors->has('User_id'))  ? 'has-error' : '' }}"">
                        <label>Zadužen djelatnik</label>
						<select class="form-control" name="User_id" id="sel1" value="{{ old('User_id') }}">
							<option selected="selected"></option>
						@foreach(DB::table('users')->orderBy('last_name','ASC')->get() as $user)
							<option name="User_id" value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>
						@endforeach
						</select>
						{!! ($errors->has('User_id') ? $errors->first('User_id', '<p class="text-danger">:message</p>') : '') !!}
					</div>-->
					<input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Zaduži opremu" id="stil1">
				</form>
			</div>
		</div>
	</div>
</div>

@stop