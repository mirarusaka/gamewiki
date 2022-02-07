@extends('layouts.app')

@section('title', '記事編集')

@section('content')
@if(Auth::check())
<div class="row">
    <div class="mb-3">
		<h2>記事編集</h2>
				記事の要素を変更して下さい。<br>
                更新完了ボタンを押すと、入力内容が反映されます。
            <hr size="4">
            <form action="{{route('pages.update', $page->title)}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    ゲームタイトル：
                    @error('title')
                        <br>
                        <div class="text-white bg-danger">
                            ゲームタイトルは入力必須かつ、重複しないようにして下さい。
                        </div>
                      @enderror
                    <input type="text" class="form-control" name="title" value="{{$page->title}}" placeholder="ゲームタイトル">
                </div>
                <div class="mb-3">
                    リンク（ダウンロード先、プレイできるURL）：
                    @error('dl')
                        <br>
                        <div class="text-white bg-danger">
                            リンクを正しく入力して下さい。
                        </div>
                      @enderror
                    <input type="text" class="form-control" name="dl" value="{{$page->dl}}" placeholder="リンクを入力">
                </div>
            作者名：
                @error('creater')
                    <br>
                    <div class="text-white bg-danger">
                        作者名が未記入です。
                    </div>
                @enderror
                <input type="text" class="form-control" name="creater" value="{{$page->creater}}" placeholder="作者名">
        <br>
        <div class="mb-3">
            プラットフォーム：
                @error('tool')
                    <br>
                    <div class="text-white bg-danger">
                        プラットフォームが未選択です。
                    </div>
                @enderror
                @switch($page->tool)
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
        ジャンル：        
        @error('janru')
            <br>
            <div class="text-white bg-danger">
                ジャンルが未選択です。
            </div>
        @enderror
        @switch($page->janru)
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
        <br>
        <div class="form-group">
            <label>ゲームの紹介文：</label>
                @error('body')
                    <br>
                    <div class="text-white bg-danger">
                        本文が未入力です。
                    </div>
                @enderror
            <textarea name="body" class="form-control" rows="10">{{$page->body}}</textarea>
        </div>
        <br>
        <div class="mb-3">
            <label>ゲームタイトル画面</label>
            <span class="text-danger">
                @if($page->titlegamen == "null")
                @elseif(isset($page->titlegamen))
                    （画像登録済です。新規アップロードすると更新されます）
                @else
                @endif
            </span>
                <input type="file" name="titlegamen" class="form-control">
        </div>
        <div class="mb-3">
            <label>スクリーンショット１</label>
            <span class="text-danger">
                @if($page->gamen1 == "null")
                @elseif(isset($page->gamen1))
                    （画像登録済です。新規アップロードすると更新されます）
                @else
                @endif
            </span>
                <input type="file" name="gamen1" class="form-control">
        </div>
        <div class="mb-3">
            <label>スクリーンショット２</label>
            <span class="text-danger">
                @if($page->gamen2 == "null")
                @elseif(isset($page->gamen2))
                    （画像登録済です。新規アップロードすると更新されます）
                @else
                @endif
            </span>
                <input type="file" name="gamen2" class="form-control">
        </div>
        <div class="mb-3">
            <label>スクリーンショット３</label>
            <span class="text-danger">
                @if($page->gamen3 == "null")
                @elseif(isset($page->gamen3))
                    （画像登録済です。新規アップロードすると更新されます）
                @else
                @endif
            </span>
                <input type="file" name="gamen3" class="form-control">
        </div>
        アップロードした画像に更新する <input type="checkbox" name="gazou" value="update">
        <br>
        <span class="text-danger">
            ※ 更新前の状態には戻せません。念のためご確認下さい。<br>
            （アップロードされていない部分は更新されません）
        </span>
        <br>
        <input name="old" value="{{ $page['old'] }}" type="hidden">
        <input type="submit" class="form-control btn-primary" value="更新完了">
    </form>
    <div class="d-grid gap-2">
        <button class="btn btn-secondary" type="button" onclick="location.href='{{route('pages')}}'">更新を中断</button>
    </div>
	@else
	<h3>ページの作成・編集にはユーザ登録が必要です。</h3>
	<h5>アカウントをお持ちでない方</h5>
	ユーザ登録は、<a href="/register">こちら</a>からできます。<br><br>
	<h5>アカウントをお持ちの方</h5>
	<a href="/login">こちら</a>からログインしてください。
	@endif
@endsection