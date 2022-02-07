@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
  <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
  	<div class="row">
		<div class="mb-3">
			<h1>フリーゲームWikiへようこそ！</h1>
				<h5>			
					ここは、各地にあるフリーゲームを作者や第三者が紹介記事を作成して、<br>
					宣伝・交流を行っていくことを目的としたサイトです。
				</h5>
		</div>
  	</div>
<hr size="3">
  <!-- Columns are always 50% wide, on mobile and desktop -->
<div class="mb-3">
	<h3>新規投稿された記事</h3>
	@if($page_count == 0)
		※記事が存在しません。
	@else
		<div class="d-flex justify-content-between">
			@for($i = 0; $i < $page_count; $i++)
			<div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
				<button class="btn btn-light" type="button" onclick="location.href='pages/{{($page[$i]->title)}}'">{{($page[$i]->title)}}</button>
				<div class="card-body">
					<a href="pages/{{($page[$i]->title)}}">
					<img src="../../../storage/{{ $page[$i]->titlegamen }}" class="card-img-top" width="320" height="240">
					</a>
				</div>
			</div>
			@endfor
		</div>
	@endif
</div>
<hr size="3">
<div class="mb-3">
	<h3>人気記事</h3>
	@if($ine_count == 0)
		※記事が存在しません。
	@else
		<div class="d-flex justify-content-between">
			@for($j = 0; $j < $ine_count; $j++)
				<div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
					<button class="btn btn-light" type="button" onclick="location.href='pages/{{($ine[$j]->title)}}'">{{($ine[$j]->title)}}</button>
					<div class="card-body">
						<a href="pages/{{($ine[$j]->title)}}">
						<img src="storage/{{ $ine[$j]->titlegamen }}" class="card-img-top" width="320" height="240">
						</a>
					</div>
				</div>
			@endfor
		</div>
	@endif
</div>
@endsection