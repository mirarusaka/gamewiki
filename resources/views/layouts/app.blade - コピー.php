<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<style>
		body {
		  background-color: #CCCCCC;
		}
	</style>
</head>
<body>
<div class="container">
    <div style="background-color:#EEEEEE">
	    <h1><a href="/">フリーゲームWiki</a></h1>
	    <hr size="3">
    @if(Auth::check())
    ログイン中...
    @else
    ログインしていません
    @endif
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="">メニュー一覧</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	  	<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">トップページ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">このサイトについて</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pages">記事一覧</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="/create">記事作成</a>
        </li>
    <li class="nav-item">
          <a class="nav-link" href="/serach">記事検索</a>
    </li>
		<li class="nav-item">
          <a class="nav-link" href="/contact">お問い合わせ</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="/links">関連リンク</a>
        </li>
          @if(Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">ログアウト</a>
          </li>
          @else
        	<li class="nav-item">
            <a class="nav-link" href="/toroku">新規登録/ログイン</a>
          </li>
          @endif
    </ul>
    </div>
  </div>
</nav>
            <hr size="3">
            @yield('content')
            <hr size="7">
            このサイトに関するお問い合わせは<a href="/contact">こちら</a>から。<br>
			@copyright 2021 Norihisa Oyama.
            <hr size="7">
    </div>
</div>
</body>
</html>