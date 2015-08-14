<h2>Tus Preguntas</h2>

@if ($questions)
	<ul class="list questions-list">
		@foreach($questions as $question)
			<li class="question">
				<p><a href="#" data-question-id="{{ $question->id }}">{{ $question->text }}</a></p>
				@if ($question->answers)
				<ol class="list answers-list">
					@foreach($question->answers as $answer)
						<li><p>{{ $answer->text }}</p></li>
					@endforeach
				</ol>
				@endif
			</li>
		@endforeach
	</ul>
@else
	<div class="alert alert-info" role="alert">A&uacute;n no tienes preguntas!</div>
@endif
