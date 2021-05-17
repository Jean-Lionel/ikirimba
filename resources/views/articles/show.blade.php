@extends('layouts.base')

@section('content')

<div class="container">

	<h2>{{ $article->title }}</h2>

	<div>
		<img src="{{ asset('images/'.$article->image_link) }}" class="img-fluid" alt="">
	</div>

	<div>
		{!! $article->description !!}
	</div>
	
</div>


@stop