@extends('layouts.app')

@section('title', '記事作成')

@section('content')
@if(Auth::check())
<div class="row">
    <div class="mb-3">
		<h3>記事作成</h3>
			<h5>
				記事の要素を入力して下さい。
			</h5>
            <hr size="4">
            <form action="/create/firm" method="post" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    ゲームタイトル：
                    @error('title')
                        <br>
                        <div class="text-white bg-danger">
                          ゲームタイトルは入力必須かつ、重複しないようにして下さい。
                        </div>
                      @enderror
                    <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="ゲームタイトル">
                </div>
                <div class="mb-3">
                    リンク（ダウンロード先、プレイできるURL）：
                    @error('dl')
                        <br>
                        <div class="text-white bg-danger">
                            リンクを正しく入力して下さい。
                        </div>
                      @enderror
                    <input type="text" class="form-control" name="dl" value="{{old('dl')}}" placeholder="リンクを入力">
                </div>
                <div class="mb-3">
                    作者名：
                @error('creater')
                        <br>
                        <div class="text-white bg-danger">
                          作者名が未入力です。
                        </div>
                      @enderror
                    <input type="text" class="form-control" name="creater" value="{{old('creater')}}" placeholder="作者名">
                </div>
                <div class="mb-3">
                プラットフォーム：
                @error('tool')
                    <br>
                    <div class="text-white bg-danger">
                        プラットフォームが未選択です。
                    </div>
                @enderror
            @switch(old('tool'))
                @case("ツクール系")
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="tool">
                            <option></option>
                            <option value="ツクール系" selected>ツクール系</option>
                            <option value="ブラウザーゲーム">ブラウザーゲーム</option>
                            <option value="スマホゲーム">スマホゲーム</option>
                            <option value="PCゲーム">PCゲーム</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>
                    @break
                @case("ブラウザーゲーム")
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="tool">
                            <option></option>
                            <option value="ツクール系">ツクール系</option>
                            <option value="ブラウザーゲーム" selected>ブラウザーゲーム</option>
                            <option value="スマホゲーム">スマホゲーム</option>
                            <option value="PCゲーム">PCゲーム</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>
                    @break
                @case("スマホゲーム")
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="tool">
                            <option></option>
                            <option value="ツクール系">ツクール系</option>
                            <option value="ブラウザーゲーム">ブラウザーゲーム</option>
                            <option value="スマホゲーム" selected>スマホゲーム</option>
                            <option value="PCゲーム">PCゲーム</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>
                    @break
                @case("PCゲーム")
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="tool">
                            <option></option>
                            <option value="ツクール系">ツクール系</option>
                            <option value="ブラウザーゲーム">ブラウザーゲーム</option>
                            <option value="スマホゲーム">スマホゲーム</option>
                            <option value="PCゲーム" selected>PCゲーム</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>
                    @break
                @case("その他")
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="tool">
                            <option></option>
                            <option value="ツクール系">ツクール系</option>
                            <option value="ブラウザーゲーム">ブラウザーゲーム</option>
                            <option value="スマホゲーム">スマホゲーム</option>
                            <option value="PCゲーム">PCゲーム</option>
                            <option value="その他" selected>その他</option>
                        </select>
                    </div>
                    @break
                @default
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="tool">
                            <option></option>
                            <option value="ツクール系">ツクール系</option>
                            <option value="ブラウザーゲーム">ブラウザーゲーム</option>
                            <option value="スマホゲーム">スマホゲーム</option>
                            <option value="PCゲーム">PCゲーム</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>
                    @break
            @endswitch
                </div>
        <div class="mb-3">
        ゲームジャンル：
                @error('janru')
                    <br>
                    <div class="text-white bg-danger">
                        ゲームジャンルが未選択です。
                    </div>
                @enderror
            @switch(old('janru'))
                @case("RPG")
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
                        <option></option>
                        <option value="RPG" selected>RPG</option>
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
                @break
                @case("アクション")
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
                        <option></option>
                        <option value="RPG">RPG</option>
                        <option value="アクション" selected>アクション</option>
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
                @break
                @case("シミュレーション")
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
                        <option></option>
                        <option value="RPG">RPG</option>
                        <option value="アクション">アクション</option>
                        <option value="シミュレーション" selected>シミュレーション</option>
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
                @break
                @case("ホラー")
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
                        <option></option>
                        <option value="RPG">RPG</option>
                        <option value="アクション">アクション</option>
                        <option value="シミュレーション">シミュレーション</option>
                        <option value="ホラー" selected>ホラー</option>
                        <option value="アドベンチャー">アドベンチャー</option>
                        <option value="シューティング">シューティング</option>
                        <option value="パズル">パズル</option>
                        <option value="スポーツ">スポーツ</option>
                        <option value="レース">レース</option>
                        <option value="恋愛">恋愛</option>
                        <option value="音楽">音楽</option>
                    </select>
                </div>
                @break
                @case("アドベンチャー")
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
                        <option></option>
                        <option value="RPG">RPG</option>
                        <option value="アクション">アクション</option>
                        <option value="シミュレーション">シミュレーション</option>
                        <option value="ホラー">ホラー</option>
                        <option value="アドベンチャー" selected>アドベンチャー</option>
                        <option value="シューティング">シューティング</option>
                        <option value="パズル">パズル</option>
                        <option value="スポーツ">スポーツ</option>
                        <option value="レース">レース</option>
                        <option value="恋愛">恋愛</option>
                        <option value="音楽">音楽</option>
                    </select>
                </div>
                @break
                @case("シューティング")
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
                        <option></option>
                        <option value="RPG">RPG</option>
                        <option value="アクション">アクション</option>
                        <option value="シミュレーション">シミュレーション</option>
                        <option value="ホラー">ホラー</option>
                        <option value="アドベンチャー">アドベンチャー</option>
                        <option value="シューティング" selected>シューティング</option>
                        <option value="パズル">パズル</option>
                        <option value="スポーツ">スポーツ</option>
                        <option value="レース">レース</option>
                        <option value="恋愛">恋愛</option>
                        <option value="音楽">音楽</option>
                    </select>
                </div>
                @break
                @case("パズル")
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
                        <option></option>
                        <option value="RPG">RPG</option>
                        <option value="アクション">アクション</option>
                        <option value="シミュレーション">シミュレーション</option>
                        <option value="ホラー">ホラー</option>
                        <option value="アドベンチャー">アドベンチャー</option>
                        <option value="シューティング">シューティング</option>
                        <option value="パズル" selected>パズル</option>
                        <option value="スポーツ">スポーツ</option>
                        <option value="レース">レース</option>
                        <option value="恋愛">恋愛</option>
                        <option value="音楽">音楽</option>
                    </select>
                </div>
                @break
                @case("スポーツ")
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
                        <option></option>
                        <option value="RPG">RPG</option>
                        <option value="アクション">アクション</option>
                        <option value="シミュレーション">シミュレーション</option>
                        <option value="ホラー">ホラー</option>
                        <option value="アドベンチャー">アドベンチャー</option>
                        <option value="シューティング">シューティング</option>
                        <option value="パズル">パズル</option>
                        <option value="スポーツ" selected>スポーツ</option>
                        <option value="レース">レース</option>
                        <option value="恋愛">恋愛</option>
                        <option value="音楽">音楽</option>
                    </select>
                </div>
                @break
                @case("レース")
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
                        <option></option>
                        <option value="RPG">RPG</option>
                        <option value="アクション">アクション</option>
                        <option value="シミュレーション">シミュレーション</option>
                        <option value="ホラー">ホラー</option>
                        <option value="アドベンチャー">アドベンチャー</option>
                        <option value="シューティング">シューティング</option>
                        <option value="パズル">パズル</option>
                        <option value="スポーツ">スポーツ</option>
                        <option value="レース" selected>レース</option>
                        <option value="恋愛">恋愛</option>
                        <option value="音楽">音楽</option>
                    </select>
                </div>
                @break
                @case("恋愛")
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
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
                        <option value="恋愛" selected>恋愛</option>
                        <option value="音楽">音楽</option>
                    </select>
                </div>
                @break
                @case("音楽")
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
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
                        <option value="音楽" selected>音楽</option>
                    </select>
                </div>
                @break
                @default
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" name="janru">
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
                @break
            @endswitch
        </div>
        <div class="form-group">
            <label>ゲームの紹介文：</label>
                @error('body')
                    <br>
                    <div class="text-white bg-danger">
                        本文が未入力です。
                    </div>
                @enderror
            <textarea name="body" class="form-control" rows="10">{{old('body')}}</textarea>
        </div>
        <br>
        <div class="mb-3">
            <label>ゲームタイトル画面</label>
            @error('titlegamen')
            <br>
            <div class="text-white bg-danger">
                タイトル画面はアップロード必須です。
            </div>
            @enderror
                <input type="file" name="titlegamen" class="form-control">
        </div>
        <div class="mb-3">
            <label>スクリーンショット１</label>
                <input type="file" name="gamen1" class="form-control">
        </div>
        <div class="mb-3">
            <label>スクリーンショット２</label>
                <input type="file" name="gamen2" class="form-control">
        </div>
        <div class="mb-3">
            <label>スクリーンショット３</label>
                <input type="file" name="gamen3" class="form-control">
        </div>
        ※ 画像の推奨サイズは640×480です。
        <br><br>
        <input type="submit" value="内容確認" class="form-control btn-primary">
    </form>
	@else
	<h3>ページの作成・編集にはユーザ登録が必要です。</h3>
	<h5>アカウントをお持ちでない方</h5>
	ユーザ登録は、<a href="/register">こちら</a>からできます。<br><br>
	<h5>アカウントをお持ちの方</h5>
	<a href="/login">こちら</a>からログインしてください。
	@endif
@endsection