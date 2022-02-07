@extends('layouts.app')

@section('title', 'フリーワード検索')

@section('content')
	<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
	<div class="row">
		<div class="col-6 col-md-10">
		<h1>ジャンル別検索</h1>
		<br>
		検索したいジャンルを選んでください。

		<h4>ジャンル１で検索</h4>
		<form action="{{route('search_find')}}" method="post">
		@csrf
            @error('tool')
            <br>
            	<div class="text-white bg-danger">
                    未入力です。
                </div>
            @enderror
			<div class="form-group">
                <select class="form-control" name="keyword">
                    <option></option>
                    <option value="ツクール系">ツクール系</option>
                    <option value="フラッシュゲーム">フラッシュゲーム</option>
                    <option value="ブラウザーゲーム">ブラウザーゲーム</option>
                    <option value="インディーゲーム">インディーゲーム</option>
                    <option value="携帯ゲーム">携帯ゲーム</option>
                    <option value="スマホゲーム">スマホゲーム</option>
                </select>
            </div>
			<input type="submit" class="form-control btn btn-primary btn-sm" value="検索">
			<input name="search" value="tool" type="hidden">
		</form>
		<br>
		<h4>ジャンル２で検索</h4>
		<form action="{{route('search_find')}}" method="post">
		@csrf
            @error('tool')
            <br>
            	<div class="text-white bg-danger">
                    未入力です。
                </div>
            @enderror
			<div class="form-group">
                <select class="form-control" name="keyword">
                    <option></option>
                    <option value="アクション">アクション</option>
                    <option value="ロールプレイング">ロールプレイング</option>
                    <option value="パズル">パズル</option>
                    <option value="ボード">ボード</option>
                    <option value="シミュレーション">シミュレーション</option>
                    <option value="シミュレーションRPG">シミュレーションRPG</option>
                    <option value="アドベンチャー">アドベンチャー</option>
                    <option value="シューティング">シューティング</option>
                    <option value="スポーツ">スポーツ</option>
                    <option value="レース">レース</option>
                    <option value="音楽">音楽</option>
                </select>
            </div>
			<input type="submit" class="form-control btn btn-primary btn-sm" value="検索">
			<input name="search" value="janru1" type="hidden">
		</form>
		<br>
		<h4>ジャンル３で検索</h4>
		<form action="{{route('search_find')}}" method="post">
		@csrf
            @error('tool')
            <br>
            	<div class="text-white bg-danger">
                    未入力です。
                </div>
            @enderror
			<div class="form-group">
                <select class="form-control" name="keyword">
                    <option></option>
                    <option value="ファンタジー">ファンタジー</option>
                    <option value="SF">SF</option>
                    <option value="ホラー">ホラー</option>
                    <option value="恋愛">恋愛</option>
                    <option value="歴史">歴史</option>
                    <option value="現代">現代</option>
                </select>
            </div>
			<input type="submit" class="form-control btn btn-primary btn-sm" value="検索">
			<input name="search" value="janru2" type="hidden">
		</form>
		</div>
	</div>
@endsection