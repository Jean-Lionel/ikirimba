@extends('layouts.base')

@section('content')

<div class="container">
	<div>
			<a href="{{ route('articles.create') }}">Nouvel Article</a>
	</div>
	<div class="row">
		
		@foreach ($articles as $article)
			{{-- expr --}}

			<div class="col-md-3">
			
				<a href="{{ route('articles.show', $article) }}">
				<span>{{ $article->title }}</span>
				<div>
					<img src="{{ asset('images/'.$article->image_link) }}" style="height: 200px;" class="img-thumbnail" alt="">
				</div>
				</a>

				{{-- <div>
					{!! $article->description !!}
				</div> --}}
			</div>

			
		@endforeach
	</div>
</div>

@stop