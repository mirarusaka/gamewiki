@extends('layouts.app')

@section('title', '送信完了')

@section('content')
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    <div class="row">
      <div class="mb-3">
	  <h1>{{ __('お問い合わせを受け付けました') }}</h1>
	  <h5>内容によってはこちらからご連絡させていただきます。<br>
	  ありがとうございました。</h5>
	    </div>
    </div>
@endsection