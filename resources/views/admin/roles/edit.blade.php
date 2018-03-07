@extends('layouts.admin')

@section('title', 'Edit Role')

@section('content')
<div class="row" style="margin-top:80px">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Ispravi dozvole</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('roles.update', $role->id) }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Name" name="name" type="text" value="{{ $role->name }}" />
                        {!! ($errors->has('name') ? $errors->first('name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('slug')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="slug" name="slug" type="text" value="{{ $role->slug }}" />
                        {!! ($errors->has('slug') ? $errors->first('slug', '<p class="text-danger">:message</p>') : '') !!}
                    </div>

                    <h5>Dozvole:</h5>
						<div class="col-md-4 col-md-offset-1">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[users.create]" value="1" {{ $role->hasAccess('users.create') ? 'checked' : '' }}>
									users.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[users.update]" value="1" {{ $role->hasAccess('users.update') ? 'checked' : '' }}>
									users.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[users.view]" value="1" {{ $role->hasAccess('users.view') ? 'checked' : '' }}>
									users.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[users.destroy]" value="1" {{ $role->hasAccess('users.destroy') ? 'checked' : '' }}>
									users.destroy
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[roles.create]" value="1" {{ $role->hasAccess('roles.create') ? 'checked' : '' }}>
									roles.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[roles.update]" value="1" {{ $role->hasAccess('roles.update') ? 'checked' : '' }}>
									roles.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[roles.view]" value="1" {{ $role->hasAccess('roles.view') ? 'checked' : '' }}>
									roles.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[roles.delete]" value="1" {{ $role->hasAccess('roles.delete') ? 'checked' : '' }}>
									roles.delete
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[registrations.create]" value="1" {{ $role->hasAccess('registrations.create') ? 'checked' : '' }}>
									registrations.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[registrations.update]" value="1" {{ $role->hasAccess('registrations.update') ? 'checked' : '' }}>
									registrations.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[registrations.view]" value="1" {{ $role->hasAccess('registrations.view') ? 'checked' : '' }}>
									registrations.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[registrations.delete]" value="1" {{ $role->hasAccess('registrations.delete') ? 'checked' : '' }}>
									registrations.delete
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employees.create]" value="1" {{ $role->hasAccess('employees.create') ? 'checked' : '' }}>
									employees.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employees.update]" value="1" {{ $role->hasAccess('employees.update') ? 'checked' : '' }}>
									employees.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employees.view]" value="1" {{ $role->hasAccess('employees.view') ? 'checked' : '' }}>
									employees.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employees.delete]" value="1" {{ $role->hasAccess('employees.delete') ? 'checked' : '' }}>
									employees.delete
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[equipments.create]" value="1" {{ $role->hasAccess('equipments.create') ? 'checked' : '' }}>
									equipments.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[equipments.update]" value="1" {{ $role->hasAccess('equipments.update') ? 'checked' : '' }}>
									equipments.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[equipments.view]" value="1" {{ $role->hasAccess('equipments.view') ? 'checked' : '' }}>
									equipments.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[equipments.delete]" value="1" {{ $role->hasAccess('equipments.delete') ? 'checked' : '' }}>
									equipments.delete
								</label>
							</div>
							</br>
						</div>	
						<div class="col-md-4 col-md-offset-1">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[kids.create]" value="1" {{ $role->hasAccess('kids.create') ? 'checked' : '' }}>
									kids.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[kids.update]" value="1" {{ $role->hasAccess('kids.update') ? 'checked' : '' }}>
									kids.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[kids.view]" value="1" {{ $role->hasAccess('kids.view') ? 'checked' : '' }}>
									kids.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[kids.delete]" value="1" {{ $role->hasAccess('kids.delete') ? 'checked' : '' }}>
									kids.delete
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[terminations.create]" value="1" {{ $role->hasAccess('terminations.create') ? 'checked' : '' }}>
									terminations.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[terminations.update]" value="1" {{ $role->hasAccess('terminations.update') ? 'checked' : '' }}>
									terminations.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[terminations.view]" value="1" {{ $role->hasAccess('terminations.view') ? 'checked' : '' }}>
									terminations.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[terminations.delete]" value="1" {{ $role->hasAccess('terminations.delete') ? 'checked' : '' }}>
									terminations.delete
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[works.create]" value="1" {{ $role->hasAccess('works.create') ? 'checked' : '' }}>
									works.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[works.update]" value="1" {{ $role->hasAccess('works.update') ? 'checked' : '' }}>
									works.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[works.view]" value="1" {{ $role->hasAccess('works.view') ? 'checked' : '' }}>
									works.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[works.delete]" value="1" {{ $role->hasAccess('works.delete') ? 'checked' : '' }}>
									works.delete
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employee_equipments.create]" value="1" {{ $role->hasAccess('employee_equipments.create') ? 'checked' : '' }}>
									employee_equipments.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employee_equipments.update]" value="1" {{ $role->hasAccess('employee_equipments.update') ? 'checked' : '' }}>
									employee_equipments.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employee_equipments.view]" value="1" {{ $role->hasAccess('employee_equipments.view') ? 'checked' : '' }}>
									employee_equipments.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employee_equipments.delete]" value="1" {{ $role->hasAccess('employee_equipments.delete') ? 'checked' : '' }}>
									employee_equipments.delete
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employee_terminations.create]" value="1" {{ $role->hasAccess('employee_terminations.create') ? 'checked' : '' }}>
									employee_terminations.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employee_terminations.update]" value="1" {{ $role->hasAccess('employee_terminations.update') ? 'checked' : '' }}>
									employee_terminations.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employee_terminations.view]" value="1" {{ $role->hasAccess('employee_terminations.view') ? 'checked' : '' }}>
									employee_terminations.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employee_terminations.delete]" value="1" {{ $role->hasAccess('employee_terminations.delete') ? 'checked' : '' }}>
									employee_terminations.delete
								</label>
							</div>
							</br>
						</div>

                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input name="_method" value="PUT" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Update">
                </fieldset>
                </form>
			</div>
		</div>
	</div>
</div>
@stop
