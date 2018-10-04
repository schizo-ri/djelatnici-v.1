@extends('layouts.admin')

@section('title')
Ispravi {{ $post->title }}
@stop

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Ispravi poruku - {{ $post->title }}</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.posts.update', $post->id) }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
						<select class="form-control" name="to_employee_id" id="sel1" value="{{ old('to_employee_id') }}">
							@foreach ($registrations as $djelatnik)
								@if(!DB::table('employee_terminations')->where('employee_id',$djelatnik->employee_id)->first() )
									<option name="employee_id" value="{{ $djelatnik->employee_id }}" {!! ($djelatnik->employee_id == $post->employee['id'] ? 'selected ': '') !!}>{{ $djelatnik->employee['last_name'] . ' ' . $djelatnik->employee['first_name'] }}</option>
								@endif
							@endforeach	
						</select>
					</div>
					<div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Post title" name="title" type="text" value="{{ $post->title }}" />
                        {!! ($errors->has('title') ? $errors->first('title', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('content')) ? 'has-error' : '' }}">
                       <textarea class="form-control" name="content" id="post-content">{!! $post->content !!}</textarea>
						
                        {!! ($errors->has('content') ? $errors->first('content', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					
					{{ csrf_field() }}
					{{ method_field('PUT') }}
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg  btn-block" type="submit" value="Ispravi" >
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
