@extends('layouts.app')

@section('title', '削除完了')

@section('content')
	<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
	<div class="row">
		<div class="col-6 col-md-10">
			<h1>削除完了</h1>
			ページを削除しました。<a href="{{route('pages')}}">ページ一覧に戻る。</a>
		</div>
	</div>
@endsection