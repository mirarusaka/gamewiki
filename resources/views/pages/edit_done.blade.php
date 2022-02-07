@extends('layouts.app')

@section('title', '編集完了')

@section('content')
	<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
	<div class="row">
		<div class="col-6 col-md-10">
			<h1>編集完了</h1>
			編集したページを確認してください。<br>
			<a href="{{ $page->url }}">{{ $page->title }}</a>
		</div>
	</div>
@endsection