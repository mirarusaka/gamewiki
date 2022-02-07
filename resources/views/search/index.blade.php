@extends('layouts.app')

@section('title', '記事検索')

@section('content')
	<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
	<div class="row">
		<div class="mb-3">
			<h1>記事検索</h1>
			<br>
			<h4>フリーワード検索</h4>
			<form action="{{route('search_find')}}" method="post">
				@csrf
            	@error('name')
            		<br>
            		<div class="text-white bg-danger">
                		未入力です。
                	</div>
            	@enderror
            	<input type="text" class="form-control" name="keyword" placeholder="検索したいワードを入力して下さい。">
				<input type="submit" class="form-control btn btn-primary btn-sm" value="検索">
				<input name="search" value="name" type="hidden">
			</form>
			<br>
			<h4>作者名で検索</h4>
			<form action="{{route('search_find')}}" method="post">
				@csrf
            	@error('creater')
            		<br>
            		<div class="text-white bg-danger">
                		未入力です。
                	</div>
            	@enderror
            	<input type="text" class="form-control" name="keyword" placeholder="検索したいワードを入力して下さい。">
				<input type="submit" class="form-control btn btn-primary btn-sm" value="検索">
				<input name="search" value="creater" type="hidden">
			</form>
			<br>
			<h4>プラットフォームで検索</h4>
			<form action="{{route('search_find')}}" method="post">
				@csrf
				@error('tool')
				<br>
					<div class="text-white bg-danger">
						未選択です。
					</div>
				@enderror
				<div class="form-group">
					<select  class="form-select" aria-label="Default select example" name="keyword">
						<option></option>
						<option value="ツクール系">ツクール系</option>
						<option value="ブラウザーゲーム">ブラウザーゲーム</option>
						<option value="スマホゲーム">スマホゲーム</option>
						<option value="PCゲーム">PCゲーム</option>
						<option value="その他">その他</option>
					</select>
				</div>
				<input type="submit" class="form-control btn btn-primary btn-sm" value="検索">
				<input name="search" value="tool" type="hidden">
			</form>
			<br>
			<h4>ジャンルで検索</h4>
			<form action="{{route('search_find')}}" method="post">
				@csrf
				@error('janru')
				<br>
					<div class="text-white bg-danger">
						未選択です。
					</div>
				@enderror
				<div class="form-group">
					<select  class="form-select" aria-label="Default select example" name="keyword">
                        <option></option>
                        <option value="RPG">RPG</option>
                        <option value="アクション">アクション</option>
                        <option value="シミュレーション">シミュレーション</option>
                        <option value="ホラー">ホラー</option>
                        <option value="アドベンチャー">アドベンチャー</option>
                        <option value="シューティング">シューティング</option>
                        <option value="パズル">パズル</option>
                        <option value="スポーツ">スポーツ</option>
                        <option value="レース">レース</option>
                        <option value="恋愛">恋愛</option>
                        <option value="音楽">音楽</option>
					</select>
				</div>
				<input type="submit" class="form-control btn btn-primary btn-sm" value="検索">
				<input name="search" value="janru" type="hidden">
			</form>
		</div>
	</div>
@endsection