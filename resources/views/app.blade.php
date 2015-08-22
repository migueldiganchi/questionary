<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Questionary</title>

	<link href="/css/bootstrap.css" rel="stylesheet">
	<!-- <link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet"> -->
	<link href="/css/app.css" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:/ -->
	<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div id="ajax-locker">
		<div class="transp-dark radius-5" id="ajax-loader">
			<!-- @todo: <i class="loader"></i> -->
			<span>Cargando...</span>
		</div>
	</div>

	<div class="container-fluid">

		<div class="row" id="header">
			<div class="col-md-12">
				<h1 class="logo" alt="Questionary">Questionary</h1>
			</div>
		</div>

		<div class="row hidden" id="login">
			<div class="col-md-12">
				<form id="login_form" method="post" action="#" >
					<input type='submit' class="btn" value="Iniciar sesión con facebook" />
				</form>
			</div>
		</div>

		<div class="row" id="main">
			<div class="col-md-offset-2 col-md-8">

				<div class="row">

					<div class="col-md-3">

						<div class="btn-group-vertical hidden" role="group" id="options-menu">
							<a href="/" class="btn btn-default home active" data-panel-id="home">Inicio</a>
							<a href="/question" class="btn btn-default questions" data-panel-id="questions">Tus preguntas</a>
							<a href="/match-invitation" class="btn btn-default invitations" data-panel-id="invitations">Invitaciones</a>
							<a href="/match" class="btn btn-default matches" data-panel-id="matches">Partidas</a>
						</div>

					</div>

					<div class="col-md-9">

						<div class="panel panel-default hidden" id="home">
							<div class="panel-body">
								<!-- @todo: 1) check credentials -->
								<!-- @todo: 2) render home partial view -->
							</div>
						</div>

						<div class="panel panel-default hidden" id="questions">
							<div class="panel-body">
								questions
							</div>
						</div>

						<div class="panel panel-default hidden" id="invitations">
							<div class="panel-body">
								invitations
							</div>
						</div>

						<div class="panel panel-default hidden" id="matches">
							<div class="panel-body">
								matches
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.2.17/jquery.timepicker.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
	<script src="/js/jquery.history.js"></script>
	<script src="/js/jquery.cookie.js"></script>
	<script src="/js/env.js"></script>
	<script src="/js/app.js"></script>
</body>
</html>