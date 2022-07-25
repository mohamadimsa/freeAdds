@extends('layouts.default')

@section('title', 'Result for : ' . $keyword)

@section('content')

<h1>Result for " {{$keyword}} "</h1>
<div class="mt-5 container text-left">
	@foreach ($ads as $ad)
		<div class="mt-5 card bg-dark">
			<div class="row ">
				<div class="col-md-4">
						<img src="{{ asset("storage/" . $ad->image[0]->image) }}" width="350" height="350" class="w-100" alt="{{$ad->title}}">
				</div>
				<div class="col-md-8 px-3">
					<div class="card-block px-3">
						<br><br>
						<h4 class="card-title">{{$ad->title}}</h4>
						<p>$ {{$ad->price}} - <small>By {{$ad->user->name}}</small></p>
						<br>
						<p class="card-text">{{substr($ad->content, 0, 200)}}</p>
						<a href="{{ route('annonce.show', ['id' => $ad->id]) }}" class="btn btn-primary">Read More</a>
					</div>
				</div>
			</div>
		</div>
@endforeach
<div class="cover-container mt-5">
		{{$ads->render()}}
	</div>
</div>
@endsection