@extends('layouts.admin')

@section('title', 'Nova obavijest')

@section('content')
<div class="page-header">
  <h2>Upis nove obavijesti</h2>
</div> 
<div class="">
	<div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
		<div class="panel panel-default">
			<div class="panel-body">
				 <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.notices.store') }}">
					<input name="employee_id" type="hidden" class="form-control" value="{{ $user }}" >

					<div class="form-group {{ ($errors->has('subject')) ? 'has-error' : '' }}">
						<label>Subjekt:</label>
						<input name="subject" type="text" class="form-control">
						{!! ($errors->has('subject') ? $errors->first('subject', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<div class="form-group {{ ($errors->has('notice')) ? 'has-error' : '' }}">
						<label>Obavijest:</label>
						<textarea rows="10" name="notice" type="text" class="form-control"></textarea>
						{!! ($errors->has('notice') ? $errors->first('notice', '<p class="text-danger">:message</p>') : '') !!}
					</div>
				<!--	<div class="form-group">
						<input name="" class="date form-control" type="text" value = "{{ Carbon\Carbon::now()->format('d-m-Y') }}">
						{!! ($errors->has('datum_rodjenja') ? $errors->first('datum_rodjenja', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<script type="text/javascript">
								$('.date').datepicker({  
								   format: 'dd-mm-yyyy'
								 });  
					</script> -->
					
					<input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Pošalji obavijest" id="stil1">
				</form>
			</div>
		</div>
	</div>
</div>

@stop