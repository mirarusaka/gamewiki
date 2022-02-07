@extends('layouts.app')

@section('title', 'フリーワード検索')

@section('content')
	<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
	<div class="row">
		<div class="col-6 col-md-10">
		<h1>フリーワード検索</h1>
		<br>
		検索したいワードを入力して下さい。
		<form action="{{route('search_find')}}" method="post">
		@csrf
            @error('name')
            <br>
            	<div class="text-white bg-danger">
                    未入力です。
                </div>
            @enderror
            <input type="text" 
            class="form-control" 
            name="keyword" 
        	placeholder="(例)スーパーマリオ">
			<input type="submit" class="form-control btn btn-primary btn-sm" value="検索">
			<input name="search" value="name" type="hidden">
		</form>
		</div>
	</div>
@endsection