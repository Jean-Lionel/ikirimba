@extends('layouts.base')

@section('content')

<div>
	<h4 class="text-center">Rédiger un article</h4>
	<form class="form" method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
		@csrf
		@method('POST')
		@include('articles.form')
	</form>
</div>


@stop