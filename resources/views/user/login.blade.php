@extends('app')

@section('content')

	<form method="post" action="{{ $fb_helper->getLoginUrl($fb_scopes) }}">
		<input type='submit' value="Iniciar sesión con facebook" />
	</form>

@endsection