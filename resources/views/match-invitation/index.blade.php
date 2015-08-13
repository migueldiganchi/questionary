<h2>Tus Preguntas</h2>

@if ($invitations)
	<ul class="list" id="invitations-list">
		@foreach($invitations as $invitation)
			<li class="invitation">
				<p>
					<a href="#" data-invitation-id="{{$invitation->id}}">
						@if ($invitation->host_id == $user->id)
							{{ $invitation->guest->name }} <i class="glyphicon glyphicon-arrow-right"></i>
						@else
							{{ $invitation->host->name }} <i class="glyphicon glyphicon-arrow-left"></i>
						@endif
					</a>
				</p>
			</li>
		@endforeach
	</ul>
@else
	<div class="alert alert-info" role="alert">No tienes invitaciones!</div>
@endif
