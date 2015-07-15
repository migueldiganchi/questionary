@extends('app-mobile')

@section('content')

	<form id="login_form" method="post" action="{{ $fb_helper->getLoginUrl($fb_scopes) }}">
		<input type='submit' class="btn" value="Iniciar sesión con facebook" />
	</form>

@endsection