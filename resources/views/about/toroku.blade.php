@extends('layouts.app')

@section('title', '新規登録/ログイン')

@section('content')
	<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
	<div class="row">
		<div class="col-6 col-md-10">
			<h3>この機能を利用するにはユーザ登録が必要です。</h3>
			ユーザ登録をすることで、ページ作成・編集・いいね・コメントが可能になります。
			<br><br>
			<h5>アカウントをお持ちでない方</h5>
				ユーザ登録は、<a href="/register">こちら</a>からできます。<br><br>
			<h5>アカウントをお持ちの方</h5>
			<a href="/login">こちら</a>からログインしてください。
		</div>
	</div>
@endsection