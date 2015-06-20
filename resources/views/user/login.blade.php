<!DOCTYPE html>
<html>
<head>
	<title>Questionary app</title>
</head>
<body>

	<form method="post" action="{{ $fb_helper->getLoginUrl() }}">
		<input type='submit' value="Iniciar sesión con facebook" />
	</form>

</body>
</html>