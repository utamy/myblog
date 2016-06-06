@extends('layouts.master')

@section('content')
	
	@foreach($posts as $post)
		<article>
			<header>
				<h1><a href="{{ url('blog/'.$post->slug) }}">{{ $post->title }}</a></h1>
				<p class="article-info">
					<i class="fa fa-calendar"></i>  {{ $post->created_at }} &nbsp; <i class="fa fa-user"></i> {{ $post->author->name }}
				</p>
			</header>			
			<?php
			// Remove html tag from content 
			$content = strip_tags($post->content);
			$content = strlen($content) > 300 ? substr($content, 0, 300) . "..." : $content;
			?>
			{!! $content !!}
			<footer>
				<i class="fa fa-folder"></i> &nbsp;
				@foreach ($post->categories as $category)
					<a href="{{ url('search/category/'.$category->slug) }}">{{ $category->name }}</a> &nbsp; 
				@endforeach
				<span class="pull-right">
					<i class="fa fa-comment"></i> <a href="{{ url('blog/'.$post->slug) . '#disqus_thread' }}" data-disqus-identifier="{{ $post->slug }}">Comments</a>
				</span>
			</footer>
		</article>
	@endforeach
	
	{!! $posts->links() !!}

@endsection