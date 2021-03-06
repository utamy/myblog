<div class="page-header">
	<h4>Tags</h4>
</div>

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Slug</th>
      <th width="65">Action</th>
    </tr>
  </thead>
  <tbody>
	<?php 
	$no = 1; 
	?>
  	@foreach($tags as $tag)
		<tr>
	      <th scope="row">{!! $no++ !!}</th>
	      <td>{!! $tag->name !!}</td>
	      <td>{!! $tag->slug !!}</td>
	      <td>
			{{ Form::open([
	      			'method' => 'DELETE',
	      			'route' => ['tags.destroy', $tag->id], 
	      			'class' => 'pull-right', 
	      			'id' => 'my-form-' . $no
	      	]) }}
				<button class="my-form-{{ $no }} btn btn-danger btn-xs btn-delete" type="submit" title="Delete">
					<i class="fa fa-trash"></i> 
				</button> 
	      	{{ Form::close() }}
	      	<a href="{{ url('tags/'.$tag->id.'/edit') }}" class="btn btn-default btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
	      </td>
	    </tr>
  	@endforeach

  </tbody>
</table>
