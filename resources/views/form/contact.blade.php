@extends('layouts.app')

@section('title', '問い合わせ')

@section('content')
  <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
  <div class="row">
    <div class="mb-3">
		<h3>お問い合わせフォーム</h3>
			<h5>
				このサイトについてのお問い合わせは、こちらからお願いいたします。<br>
                内容によってはご対応・ご連絡をさせていただきます。
			</h5>
            <br>
            <form action="{{route('form.contact_firm')}}" method="post">
            @csrf
                <div class="mb-3">
                      件名：
                      @error('title')
                        <br>
                        <div class="text-white bg-danger">
                          件名が未入力です。
                        </div>
                      @enderror
                      <input type="text" 
                      class="form-control" 
                      name="title" value="{{old('title')}}" 
                      placeholder="件名を入力して下さい。">
                </div>
                <div class="mb-3">
                      メールアドレス：
                      @error('email')
                      <br>
                        <div class="text-white bg-danger">
                          メールアドレスが未入力です。
                        </div>
                      @enderror
                      <input type="email" 
                      class="form-control" 
                      name="email" 
                      value="{{old('email')}}" 
                      placeholder="name@example.com">
                </div>
                <div class="mb-3">
                      問い合わせ内容：
                      @error('body')
                        <br>
                        <div class="text-white bg-danger">
                          内容が未入力です。
                        </div>
                      @enderror
                      <textarea type="text"
                      class="form-control" 
                      name="body" rows="5"
                      placeholder="具体的な内容を入力して下さい。">{{old('body')}}</textarea>
                </div>
                      <input type="submit" class="form-control btn-primary" value="入力内容を確認">
            </form>
	</div>
  </div>
@endsection