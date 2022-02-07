@extends('layouts.app')

@section('title', '作成ページ確認')

@section('content')
	@if(Auth::check())
	<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
	<div class="row">
		<div class="mb-3">
		<h3>作成ページ確認</h3>
		この内容でよろしければ、作成完了ボタンを押してくださいね。<br>
		<hr size="4">
        <form action="/create/done" method="post" enctype="multipart/form-data">
            @csrf
			<div class="mb-3">
				タグ：
				<table cellpadding="0" cellspacing="30">
					<tr>
						<td>
							<button type="button" class="badge bg-light text-dark">{{$page['tool']}}</button>
						</td>
						<td>
							<button type="button" class="badge bg-light text-dark">{{$page['janru']}}</button>
						</td>
					</tr>
				</table>
				<br>
			<h2>{{$page['title']}}</h2>
			作者：<button type="button" class="badge bg-primary">{{ ($page['creater']) }}</button>
        	</div>
		<div class="mb-3"> <!-- ここ、ダウンロードリンク -->
			<button type="button" class="btn btn-dark btn-sm">ダウンロード</button>
			<button type="button" class="btn btn-primary btn-sm">いいね</button>
                <hr size="3">
        </div>
        <div class="mb-3"> <!-- ここ、タイトル画像 -->
					<img src="../../../storage/{{ $page['titlegamen'] }}" class="rounded mx-auto d-block" width="640" height="480">
                    <hr size="3">
        </div>
				<h5>概要</h5>
		<div class="mb-3"> <!-- ここ、記事本文 -->
					{!! nl2br($page['body']) !!}
                    <hr size="3">
		</div>
				<h5>スクリーンショット</h5>
				<div class="mb-3"> <!-- ここ、スクリーンショット -->
					@if($gazou == 3)
						スクリーンショットがありません。
					@else
						<table cellpadding="20" cellspacing="30" align="center">
							<tr>
								<td>
									@if($page['gamen1'] == "null")
										NoImage1. 
									@else
										<img src="../../../storage/{{ $page['gamen1'] }}" class="rounded mx-auto d-block" width="320" height="240">
									@endif
								</td>
								<td>
									@if($page['gamen2'] == "null")
										NoImage2. 
									@else
										<img src="../../../storage/{{ $page['gamen2'] }}" class="rounded mx-auto d-block" width="320" height="240">
									@endif	
								</td>
								<td>
									@if($page['gamen3'] == "null")
										NoImage3. 
									@else
										<img src="../../../storage/{{ $page['gamen3'] }}" class="rounded mx-auto d-block" width="320" height="240">
									@endif
								</td>
							</tr>
						</table>
					@endif
				</div>
				<h5>このゲームに関するコメント</h5>
		<div class="mb-3"> <!-- レビュー一覧 -->
				--<br>
				ここに記事に関するコメントが表示されます。
				<br><br>
				ここにコメント投稿フォームが表示されます。
					
				<input name="title" value="{{ $page['title'] }}" type="hidden">
				<input name="dl" value="{{ $page['dl'] }}" type="hidden">
				<input name="tool" value="{{ $page['tool'] }}" type="hidden">
				<input name="creater" value="{{ $page['creater'] }}" type="hidden">
				<input name="janru" value="{{ $page['janru'] }}" type="hidden">
				<input name="body" value="{{ $page['body'] }}" type="hidden">
				<input name="titlegamen" value="{{ $page['titlegamen'] }}" type="hidden">
				@if(isset($page['gamen1']))
					<input name="gamen1" value="{{ $page['gamen1'] }}" type="hidden">
				@endif
				@if(isset($page['gamen1']))
					<input name="gamen2" value="{{ $page['gamen2'] }}" type="hidden">
				@endif
				@if(isset($page['gamen1']))
					<input name="gamen3" value="{{ $page['gamen3'] }}" type="hidden">
				@endif
				<hr size="4">
				<div class="d-grid gap-2">
                <button type="submit" class="btn btn-secondary" name="action" value="back">手直し</button>
                <button type="submit" class="btn btn-primary" name="action" value="submit">作成完了</button>
				</div>
            </form>
	</div>
	@else
	<h3>ページの作成・編集にはユーザ登録が必要です。</h3>
	<h5>アカウントをお持ちでない方</h5>
	ユーザ登録は、<a href="/register">こちら</a>からできます。<br><br>
	<h5>アカウントをお持ちの方</h5>
	<a href="/login">こちら</a>からログインしてください。
	@endif
@endsection