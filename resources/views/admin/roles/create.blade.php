@extends('layouts.admin')

@section('title', 'Create New Role')

@section('content')
<div class="page-header">
  <h2>Upiši novu dozvolu</h2>
</div> 
<div class="">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('roles.store') }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Name" name="name" type="text" value="{{ old('name') }}" />
                        {!! ($errors->has('name') ? $errors->first('name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('slug')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="slug" name="slug" type="text" value="{{ old('slug') }}" />
                        {!! ($errors->has('slug') ? $errors->first('slug', '<p class="text-danger">:message</p>') : '') !!}
                    </div>

                    <h5>Permissions:</h5>
						<div class="col-md-4 col-md-offset-1">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[users.create]" value="1">
									users.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[users.update]" value="1">
									users.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[users.view]" value="1">
									users.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[users.destroy]" value="1">
									users.destroy
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[roles.create]" value="1">
									roles.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[roles.update]" value="1">
									roles.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[roles.view]" value="1">
									roles.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[roles.delete]" value="1">
									roles.delete
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[registrations.create]" value="1">
									registrations.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[registrations.update]" value="1">
									registrations.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[registrations.view]" value="1">
									registrations.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[registrations.delete]" value="1">
									registrations.delete
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employees.create]" value="1">
									employees.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employees.update]" value="1">
									employees.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employees.view]" value="1">
									employees.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[employees.delete]" value="1">
									employees.delete
								</label>
							</div>
							</br>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[equipments.create]" value="1">
									equipments.create
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[equipments.update]" value="1">
									equipments.update
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[equipments.view]" value="1">
									equipments.view
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="permissions[equipments.delete]" value="1">
									equipments.delete
								</label>
							</div>
							</br>
						</div>	
					<div class="col-md-4 col-md-offset-1">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[kids.create]" value="1">
								kids.create
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[kids.update]" value="1">
								kids.update
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[kids.view]" value="1">
								kids.view
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[kids.delete]" value="1">
								kids.delete
							</label>
						</div>
						</br>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[terminations.create]" value="1">
								terminations.create
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[terminations.update]" value="1">
								terminations.update
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[terminations.view]" value="1">
								terminations.view
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[terminations.delete]" value="1">
								terminations.delete
							</label>
						</div>
						</br>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[works.create]" value="1">
								works.create
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[works.update]" value="1">
								works.update
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[works.view]" value="1">
								works.view
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[works.delete]" value="1">
								works.delete
							</label>
						</div>
						</br>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[employee_equipments.create]" value="1">
								employee_equipments.create
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[employee_equipments.update]" value="1">
								employee_equipments.update
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[employee_equipments.view]" value="1">
								employee_equipments.view
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[employee_equipments.delete]" value="1">
								employee_equipments.delete
							</label>
						</div>
						</br>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[employee_terminations.create]" value="1">
								employee_terminations.create
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[employee_terminations.update]" value="1">
								employee_terminations.update
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[employee_terminations.view]" value="1">
								employee_terminations.view
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="permissions[employee_terminations.delete]" value="1">
								employee_terminations.delete
							</label>
						</div>
					</div>
					
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Create" id="stil1">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
