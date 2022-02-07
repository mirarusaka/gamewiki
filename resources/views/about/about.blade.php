@extends('layouts.app')

@section('title', 'このサイトについて')

@section('content')
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    <div class="row">
    	<div class="mb-3">
			<h2>このサイトについて</h2>
			<h6>
				サイトの利用について詳しく解説しております。<br>
				分からない事があれば、まずはこちらをご確認ください。
			</h6><br>
			<h4>●利用方法</h4>
			<h5>１．作品を遊ぼう！</h5>
			<h6>
				記事一覧から、好きな作品を探す事が出来ます。<br>
				ジャンル等を限定して探したい方は、記事検索からどうぞ。<br>
				まずは様々な作品に触れてみましょう。
			</h6><br>
			<h5>２．作品を評価しよう！</h5>
			<h6>
				プレイした作品の中で、良いと思った作品には『いいね』を付けてみましょう。<br>
				作者さんの応援にもなります。<br>
				また、コメント欄に作品のレビューも書いてみましょう。<br>
				他の方のプレイに対する参考にも、作者さんのモチベーションにもつながります。<br>
				ただし、アカウント登録が必要なのでご注意ください。
			</h6><br>
			<h5>３．自分で記事を作成しよう！</h5>
			<h6>
				もし、このサイトに掲載されていない作品があれば、自分で記事を作成してみましょう。<br>
				あなたの作品に対する熱い想いを込めた記事を作成すれば、<br>
				そこのゲームの人口がさらに増えるかもしれません。<br>
				記事作成は<a href="/pages/create">こちら</a>からできます。<br>
			</h6>
			<hr size="3">
			<h4>●利用規約</h4>
			<h5>１．なりすまし禁止</h5>
			<h6>
				作者さんになりすます行為はやめましょう。（コメント、記事の内容等）<br>
				余計な誤解を招き、作者さんに迷惑が掛かります。
			</h6><br>
			<h5>２．誹謗中傷禁止</h5>
			<h6>
				このサイトは様々な方が見ております。<br>
				見られても恥ずかしくないよう、節度を持ってコメントしましょう。<br>
				特定の人物を非難するような事や、個人情報の記入は禁止です。
			</h6><br>
			<h5>３．削除依頼等は問い合わせフォームから</h5>
			<h6>
				有害な記事や荒らしが現れた場合は、問い合わせフォームからご連絡ください。<br>
				内容を慎重に確認したうえで、対応させていただきます。
			</h6><br>
			<h5>４．トラブルについて</h5>
			<h6>
				ユーザー間で発生したトラブルにおきましては、当サイトは一切の責任を負いません。<br>
			</h6><br>
			<hr size="3">
			<h4>簡単なＱ＆Ａ</h4>
			<table class="table table-bordered border-dark table-hover" style="font-size: 12pt;">
					<tr>
						<th width="40%">質問</th>
						<th>回答</th>
					</tr>
					<tr>
						<th>記事を作成したい</th>
						<th>ログインする必要があります。<br>
							メニューバーにある『新規登録/ログイン』ボタンを押して登録してください。</th>
					</tr>
					<tr>
						<th>アップロードした画像のサイズがおかしい</th>
						<th>640×480のサイズを基準に設定してあります。<br>
							画像サイズを変更して再度アップロードしてみてください。</th>
					</tr>
					<tr>
						<th>画像の更新が出来ない</th>
						<th>アップロードボタンの下にチェックボックスがあるので、<br>
							そこをチェックしてから編集完了ボタンを押してみてください。</th>
					</tr>
					<tr>
						<th>ログインパスワードを忘れた</th>
						<th>ログイン画面に『パスワードを忘れましたか？』というボタンがありますので、<br>
							そちらからお手続きください。</th>
					</tr>
					<tr>
						<th>編集の際、誤って前の画像を上書きしてしまった</th>
						<th>編集したページは以前の状態に戻すことが出来ません。<br>
							どうしても戻したい場合は、問い合わせフォームからご連絡ください。</th>
					</tr>
				</table>
			<a href="{{route('form.contact')}}">
			<button type="button" class="btn btn-link">
			さらに詳しいお問い合わせはこちらから
			</button></a>
			<hr size="3">
			<h4>●ここの管理人</h4>
	    </div>
    </div>
	<div class="row">
    	<div class="col-md-4">
			<img src="../../../storage/page/kanri.jpg" class="img-fluid" width="320" height="240">
	    </div>
		<div class="col-md-7">
			<table class="table table-$indigo-100" style="font-size: 14pt;">
				<tr>
					<th>名前：</th><th>69safe</th>
				</tr>
				<tr>
					<th>生息地：</th><th>埼玉県</th>
				</tr>
				<tr>
					<th>趣味：</th><th>ゲーム製作</th>
				</tr>
				<tr>
					<th>経歴：</th><th>某住設メーカーの営業職</th>
				</tr>
				<tr>
					<th>画像：</th><th>ある方からの頂きもの。</th>
				</tr>
				<tr>
					<th>ひとこと：</th><th>IT業界に憧れがあり、エンジニアを目指しています。</th>
				</tr>
			</table>
	    </div>
    </div>
@endsection