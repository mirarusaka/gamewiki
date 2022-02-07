@extends('layouts.app')

@section('title', 'テストページ')

@section('content')
	<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
	<div class="row">
		<div class="col-6 col-md-10">

		@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form method="post" action="{{ route('upload_image') }}" enctype="multipart/form-data">
	@csrf
	<input type="file" name="image" accept="image/png, image/jpeg" />
	<input type="submit" value="よし、じゃあぶち込んでやるぜ">
</form>
		</div>
	</div>
@endsection