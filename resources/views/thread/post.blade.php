@extends('layouts.bbs')
@section('title', 'スレッド新規作成')
@section('content')
	<div class="col-md-8 mx-auto">
		<div="">
			<h2>スレッド新規作成</h2>
				
			<form action="{{ action('ThreadController@create') }}" method="post" enctype="multipart/form-date">
			@csrf
			
			@if (count($errors) > 0)
				<ul>
					@foreach($errors->all() as $e)
						<li>{{ $e }}</li>
					@endforeach
				</ul>
			@endif
			
				<div class="form-group row">
					<label for="thread_title" class="col-md-2 col-form-label">タイトル</label>
					<div class="col-md-6">
						<input type="thread_title" class="form-control" name="thread_title" value="{{ old('thread_title') }}">
					</div>
				</div>
					
				<div class="form-group row">
					<label for="category_id" class="col-md-2 col-form-label">カテゴリー</label>
					<div class="col-md-6">
						<select name="category_id" type="text" class="category_id">
							<option></option>
							<option value="1" name="1">お知らせ</option>
							<option value="2" name="2">宿題</option>
							<option value="3" name="3">部活</option>
							<option value="4" name="4">生徒</option>
							<option value="5" name="5">友達</option>
						</select>
					</div>
				</div>
					
				<div class="form-group row">
					<label for="body" class="col-md-2 col-form-label">本文</label>
					<div class="col-md-6">
						<textarea class="form-control" name="body">{{ old('body') }}</textarea>
					</div>
				</div>
				
				<div class="">
					<button type="submit" class="btn btn-primary">スレッドを作成する</button>
				</div>
				
			</form>
				
		</div>
	</div>
@endsection