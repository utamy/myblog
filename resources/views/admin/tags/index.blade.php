@extends('admin.master')

@section('title', 'Tag')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="col-md-12 box">
				<div class="page-header">
					<h4>Add Tag</h4>
				</div>
				
				@include('common.errors')

				{{ Form::open(array('url' => 'tags')) }}
					<div class="form-group">
						{{ Form::label('name', 'Name') }}
						{{ Form::text('name', Form::old('name'), array('class' => 'form-control')) }}
				    </div>
				    <div class="form-group">
						{{ Form::label('description', 'Description') }}
						{{ Form::textarea('description', Form::old('desc'), array('class' => 'form-control', 'rows' => '3')) }}
				    </div>
				    <div class="form-group">
						{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
				    </div>
				{{ Form::close() }}
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12 box">
				
				@include('admin.tags.lists')

			</div>
			{!! $tags->links() !!}
		</div>
	</div>

@endsection