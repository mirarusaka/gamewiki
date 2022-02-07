@extends('layouts.app')

@section('title', '削除確認')

@section('content')
@if(Auth::check())
<div class="row">
    <div class="col-6 col-md-10">
		<h3></h3>
			<h5>
				この記事を削除してもよろしいですか？
			</h5>
			--
			<br>
			<table cellpadding="0" cellspacing="30">
				<tr>
					<td>
						タグ：
					</td>
					<td>
						<button type="button" class="badge bg-light text-dark">{{$page->tool}}</button>
					</td>
					<td>
						<button type="button" class="badge bg-light text-dark" value="{{$page->janru}}">{{$page->janru}}</button>
					</td>
				</tr>
			</table>
			<br>
			<h2>{{$page->title}}</h2>
				作者：<button type="button" class="badge bg-primary" value="{{$page->creater}}">{{$page->creater}}</button>
			</form>
        </div>
		<div class="mb-3"> <!-- ここ、ダウンロードリンク -->
			<br>
			<table>
				<tr>
					<td>
						<button type="button" class="btn btn-dark btn-sm">ダウンロード</button>
					</td>
					<td>
						<button type="submit" class="btn btn-primary btn-sm">
						いいね<span class="badge bg-danger">{{$page->ine}}</span>
						</button>
					</td>
				</tr>
			</table>
                <hr size="3">
        </div>
        <div class="mb-3"> <!-- ここ、タイトル画像 -->
					<img src="../../../storage/{{ $page['titlegamen'] }}" class="rounded mx-auto d-block" style="width:50%">
                    <hr size="3">
        </div>
				<h5>概要</h5>
		<div class="mb-3"> <!-- ここ、記事本文 -->
			{!! nl2br($page->body) !!}
                    <hr size="3">
		</div>
				<h5>スクリーンショット</h5>
		<div class="mb-3"> <!-- ここ、スクリーンショット -->
			@if($gazou == 3)
				スクリーンショットがありません。
			@else
				<table cellpadding="0" cellspacing="30">
					<tr>
						<td>
							@if($page['gamen1'] == "null")
								NoImage1. 
							@else
								<img src="../../../storage/{{ $page['gamen1'] }}" class="rounded mx-auto d-block" style="width:100%;">
							@endif
						</td>
						<td>
							@if($page['gamen2'] == "null")
								NoImage2. 
							@else
								<img src="../../../storage/{{ $page['gamen2'] }}" class="rounded mx-auto d-block" style="width:100%;">
							@endif	
						</td>
						<td>
							@if($page['gamen3'] == "null")
								NoImage3. 
							@else
								<img src="../../../storage/{{ $page['gamen3'] }}" class="rounded mx-auto d-block" style="width:100%;">
							@endif
						</td>
					</tr>
				</table>
			@endif
		</div>
			<form action="{{route('remove')}}" method="post">
			@csrf
			<input type="submit" class="form-control btn-danger" value="削除する">
			<input name="id" value="{{$page->id}}" type="hidden">
			</form>
			<br>
    		<div class="d-grid gap-2">
        	<button class="btn btn-secondary" type="button" onclick="location.href='{{ $page->url }}'">削除中止</button>
    </div>
</div>
	@else
	<h3>ページの作成・編集にはユーザ登録が必要です。</h3>
	<h5>アカウントをお持ちでない方</h5>
	ユーザ登録は、<a href="/register">こちら</a>からできます。<br><br>
	<h5>アカウントをお持ちの方</h5>
	<a href="/login">こちら</a>からログインしてください。
	@endif
@endsection