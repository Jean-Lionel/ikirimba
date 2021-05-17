@extends('layouts.base')

@section('content')

<div class="container">
	<div class="row">
		<div>
			<a href="{{ route('articles.create') }}">Nouvel Article</a>
		</div>
		@foreach ($articles as $article)
			{{-- expr --}}

			<div class="col-md-12">
				
				<h3>{{ $article->title }}</h3>
				<a href="{{ route('articles.show') }}">
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