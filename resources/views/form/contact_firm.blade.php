@extends('layouts.app')

@section('title', '内容確認')

@section('content')
  <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
  <div class="row">
    <div class="mb-3">
		<h3>お問い合わせ内容確認</h3>
        <form action="{{route('contact_thanks')}}" method="post">
            @csrf
                <div class="mb-3">
                      件名：<br>
                      {{ $inputs['title'] }}
                        <input
                        name="title"
                        value="{{ $inputs['title'] }}"
                        type="hidden">
                </div>
                <div class="mb-3">
                      メールアドレス：<br>
                      {{ $inputs['email'] }}
                        <input
                        name="email"
                        value="{{ $inputs['email'] }}"
                        type="hidden">
                </div>
                <div class="mb-3">
                      問い合わせ内容：<br>
                      {!! nl2br(e($inputs['body'])) !!}
                        <input
                        name="body"
                        value="{{ $inputs['body'] }}"
                        type="hidden">
                </div>
                --
                <button type="submit" class="form-control btn-secondary" name="action" value="back">
                    入力内容修正
                </button>
                <button type="submit" class="form-control btn-primary" name="action" value="submit">
                    送信する
                </button>
            </form>
	</div>
  </div>
@endsection