<h2>Tus Partidas</h2>

@if (!$matches->isEmpty())
	<ul class="list matches-list">
		@foreach($matches as $match)
			<li class="match">
				<p>
					<a href="#" data-match-id="{{$match->id}}">
						@if ($match->host_id == $user->id) {{ $match->guest->name }} @else {{ $match->host->name }} @endif
						-
						{{ date('d-m-Y H:i:s', strtotime($match->created_at)) }}
					</a>
				</p>
			</li>
		@endforeach
	</ul>
@else
	<div class="alert alert-info" role="alert">A&uacute;n no tienes partidas!</div>
@endif
