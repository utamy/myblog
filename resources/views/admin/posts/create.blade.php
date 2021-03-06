@extends('admin.master')

@section('title', 'Post')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="col-md-12 box">
			<div class="page-header">
				<h4>Add Post</h4>
			</div>
			
			@include('common.errors')

			{{ Form::open(['url' => 'posts']) }}

			    <div class="form-group">
			    	{{ Form::label('title', 'Title') }}
					{{ Form::text('title', Form::old('title'), array('class' => 'form-control')) }}
			    </div>
			    <div class="form-group">
			    	{{ Form::label('image', 'Feature Image') }} <br>
			    	<a class="btn btn-default" onclick="$('.feature-image').click()"><i class="fa fa-picture-o"></i></a>
					{{ Form::hidden('image', Form::old('image'), array('class' => 'form-control feature-image', 'onclick' => 'openKCFinder(this)')) }}
			    </div>
			    <div class="feature-image-view"></div>
				<div class="form-group">
					{{ Form::label('content', 'Content') }}
					<textarea name="content" class="form-control tiny"><?=htmlentities(Form::old('content'))?></textarea>
				</div>
				<div class="form-group col-md-6 no-padding-left no-padding-right-res">
					{{ Form::label('category', 'Category') }}
					{{ Form::select('categories[]', $categories, null, ['class' => 'form-control select2', 'multiple' => 'multiple']) }}
				</div>
				<div class="form-group col-md-6 no-padding-right no-padding-left-res">
					{{ Form::label('tag', 'Tag') }}
					{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2', 'multiple' => 'multiple']) }}
				</div>
				<div style="clear: both"></div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-success">Submit</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

@endsection