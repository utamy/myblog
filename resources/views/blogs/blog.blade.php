@extends('layouts.master')

@section('content')
	
	@if (count($posts) > 0)
		@foreach($posts as $post)
			<article>
				<header>
					<h1><a href="{{ url('blog/'.$post->slug) }}">{{ $post->title }}</a></h1>
					<p class="article-info">
						<i class="fa fa-calendar"></i> &nbsp; {{ $post->created_at }} &nbsp; <i class="fa fa-user"></i> &nbsp; {{ $post->author->name }} &nbsp;
						<i class="fa fa-folder"></i> &nbsp;
						<?php 
						$categoryList = '';
						foreach ($post->categories as $category) {
							$categoryList .= "<a href='/search/category/$category->slug'>$category->name</a>, ";
						}
						$categoryList = rtrim($categoryList, ', '); 
						?>
						{!! !empty($categoryList) ? $categoryList : 'Uncategorized' !!}
					</p>
				</header>			
				<?php
				// Remove html tag from content 
				$content = strip_tags($post->content);
				$content = strlen($content) > 300 ? substr($content, 0, 300) . "..." : $content;
				?>
				{!! $content !!}
				<footer>
					<i class="fa fa-tags"></i> &nbsp;
					<?php 
					$tagList = '';
					foreach ($post->tags as $tag) {
						$tagList .= "<a href='/search/tag/$tag->slug'>$tag->name</a>, ";
					}
					$tagList = rtrim($tagList, ', '); 
					?>
					{!! !empty($tagList) ? $tagList : 'Untagged' !!}
					<span class="pull-right">
						<i class="fa fa-comment"></i> <a href="{{ url('blog/'.$post->slug) . '#disqus_thread' }}" data-disqus-identifier="{{ $post->slug }}">Comments</a>
					</span>
				</footer>
			</article>
		@endforeach
		
		{!! $posts->links() !!}
	@else
		<article>
			<header>
				<h1>Ooops...</h1>
				<p>No post available right now...</p>
			</header>
		</article>
	@endif
@endsection