@extends('layouts.default')

@section('title', 'Edit ' . $ad->title)

@section('content')
<div class="mt-5 container text-left">
	<form action="{{ route('annonce.update', ['id' => $ad->id]) }}" enctype="multipart/form-data" method="POST">
		@csrf
		@method("PUT")
		<div class="card bg-dark">
			<div class="row ">
				<div class="col-md-4">
					<img src="{{ asset("storage/" . $ad->image[0]->image) }}" width="350" height="350" class="w-100" alt="{{$ad->title}}">
				</div>
				<div class="col-md-8 px-3">
					<div class="card-block px-3">
						<br><br>
						<label for="title">Title</label>
						<input type="text" name="title" id="title" class="form-control col-sm-5" value="{{$ad->title}}" />
						<label for="price">Price</label>
						<input type="text" name="price" id="price" class="form-control col-sm-3" value="{{$ad->price}}"/>
						<label for="content">Description</label>
						<textarea rows="5" type="text" name="content" id="content" class="form-control col-sm-10">{{$ad->content}}</textarea>
					</div>
				</div>

			</div>
		</div>

		<div class="row pl-3 pr-3">
			<div class="col-md-12 bg-light text-dark px-5">

			</div>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Edit">
		</div>
	</form>
</div>
@endsection