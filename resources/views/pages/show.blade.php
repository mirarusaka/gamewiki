@extends('layouts.app')

@section('title', $page->title)

@section('content')
<div class="row">
        <div class="mb-3"> <!-- ここ、タイトル名 -->
        @if(Auth::check())
        <a href="{{route('pages.edit', $page->title)}}">編集</a>/<a href="{{route('pages.del', $page->title)}}">削除</a><br>
		@endif
		</div>
		<div class="mb-3">
			<table cellpadding="0" cellspacing="30">
				<tr>
					<td>
						タグ：
					</td>
					<td>
					<form action="{{route('search_find')}}" method="post">
						@csrf
						<button type="submit" class="badge bg-light text-dark">{{$page->tool}}</button>
						<input name="search" value="tool" type="hidden">
						<input name="keyword" value="{{ $page->tool }}" type="hidden">
					</form>
					</td>
					<td>
					<form action="{{route('search_find')}}" method="post" name="keyword">
						@csrf
						<button type="submit" class="badge bg-light text-dark" value="{{$page->janru}}">{{$page->janru}}</button>
						<input name="search" value="janru" type="hidden">
						<input name="keyword" value="{{ $page->janru }}" type="hidden">
					</form>
					</td>
				</tr>
			</table>
			<br>
			<h2>{{$page->title}}</h2>
			<form action="{{route('search_find')}}" method="post" name="keyword">
				@csrf
				作者：<button type="submit" class="badge bg-primary" value="{{$page->creater}}">{{$page->creater}}</button>
				<input name="search" value="creater" type="hidden">
				<input name="keyword" value="{{ $page->creater }}" type="hidden">
			</form>
        </div>
		<div class="mb-3"> <!-- ここ、ダウンロードリンク -->
			<table>
				<tr>
					<td>
						<button type="button" class="btn btn-dark btn-sm" onclick="location.href='{{$page->dl}}'">ダウンロード</button>
					</td>
					<td>
						@if(Auth::check())
							<form action="{{route('pages_ine'), $page->title}}" method="post">
								@csrf
								<button type="submit" class="btn btn-primary btn-sm">
								いいね <span class="badge bg-danger">{{$page->ine}}</span>
								</button>
								<input name="title" value="{{ $page['title'] }}" type="hidden">
							</form>
						@else
							<button type="submit" class="btn btn-primary btn-sm" onclick="location.href='{{route('toroku')}}'">
							いいね<span class="badge bg-danger">{{$page->ine}}</span>
							</button>
						@endif
					</td>
				</tr>
			</table>
                <hr size="3">
        </div>
        <div class="mb-3"> <!-- ここ、タイトル画像 -->
					<img src="../../../storage/{{ $page['titlegamen'] }}" class="rounded mx-auto d-block" width="640" height="480">
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
				<table cellpadding="20" cellspacing="30" align="center">
					<tr>
						<td>
							@if($page['gamen1'] == "null")
							@else
								<img src="../../../storage/{{ $page['gamen1'] }}" class="rounded mx-auto d-block" width="320" height="240">
							@endif
						</td>
						<td>
							@if($page['gamen2'] == "null")
							@else
								<img src="../../../storage/{{ $page['gamen2'] }}" class="rounded mx-auto d-block" width="320" height="240">
							@endif	
						</td>
						<td>
							@if($page['gamen3'] == "null")
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
				@foreach ($comments as $comment)
				<li>
				{{$comment->comment}} -- {{ $comment->created_at }}<br>
				</li>
				@endforeach
				{{ $comments->links() }}
				<br>
					コメント投稿
					@error('comment')
                    <br>
                <div class="text-white bg-danger">
                        コメントを入力して下さい。
        </div>
                	@enderror
					<form action="{{route('pages.comment'), $page->title}}" method="post">
					@csrf
						<textarea name="comment" class="form-control" rows="3"></textarea>
						<button type="submit" class="btn btn-primary" name="action" value="submit">
                    	投稿する
                		</button>
						<input name="pagetitle" value="{{$page->id}}" type="hidden">
						<input name="title" value="{{$page->title}}" type="hidden">
					</form>
	</div>
</div>
@endsection