@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
	<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
	<div class="row">
		<div class="col-6 col-md-10">

			<a href="{{ route('upload_form') }}">Upload</a>
			<hr/>
			
			@foreach($images as $image)
			<div style="width: 18rem; float:left; margin: 16px;">
				<img src="storage/{{ ($image->file_path) }}" style="width:100%;"/>
				<p>{{ $image->file_name }}</p>
			</div>
			@endforeach
		</div>
	</div>
@endsection