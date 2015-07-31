@extends('app')

@section('content')

	<!-- <img src="https://graph.facebook.com/facebook_user_id/picture?type=small"> -->
	<h2>Tus Preguntas</h2>
	
	@if ($questions)
		<ul class="list questions-list">
			@foreach($questions as $question)
				<li class="question">
					<p><a href="#" data-question-id="{{$question->id}}">{{ $question->text }}</a></p>
				</li>
			@endforeach
		</ul>
	@else
		<div class="alert alert-info" role="alert">A&uacute;n no tienes preguntas!</div>
	@endif

@endsection