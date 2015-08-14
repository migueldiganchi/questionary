(function() {

	// registramos el history
	var history = window.History;
	if (!history.enabled) {
		return false; // @todo: handle this
	}

})();


$(document).ready(function() {

	// define controls
	var ajax_locker = $('#ajax-locker');
	var ajax_message = $('#ajax-locker #ajax-loader span');

	$.ajaxSetup({ cache: true });

	$.getScript('//connect.facebook.net/es_AR/sdk.js', function() {
		
		// fb initialization
		FB.init({
			appId: _CONFIG.FB_APP_ID,
			status: true,
			cookie: true,
			version: _CONFIG.FB_APP_VERSION
		});
 	
		ajaxLoading(true, 'Verificando conexión...');

		FB.getLoginStatus(handleFacebookResponse);

		// FB methods
		function doLogin() {

			ajaxLoading(true, 'Iniciando sesión...');

			FB.login(handleFacebookResponse, { scope: _CONFIG.FB_APP_SCOPES });
		}

		function handleFacebookResponse(fb_response) {

			if (fb_response.status === 'connected') {

				ajaxLoading(true, 'Autenticando usuario...');

				$.get('/auth/facebook', null, function(app_response) {

					if ( !app_response.success ) {
						
						var message = (typeof app_response.error != 'undefined')
							 ? 'Error ' + app_response.error.code + ': ' + app_response.error.message 
							 : 'Unknown Error'

						showMessage(true, message);

						ajaxLoading(false);

						return;
					}

					$('#login').addClass('hidden');

					$('#home, #options-menu').removeClass('hidden');

					ajaxLoading(false);

				}, 'json');

			} else if (fb_response.status === 'not_authorized') {

				alert("El usuario no esta autorizado para acceder a la aplicación.");

				ajaxLoading(false);

			} else {

				$('#login').removeClass('hidden');

				$('#home').addClass('hidden');

				ajaxLoading(false);

			}
		}

		// control events
		$('form#login_form').submit(function() {
			
			doLogin();

			// ajax request
			return false;
		});

		// questions handlers
		$('.btn-group-vertical .btn').click(function(e) {
			var item = $(this);
			var url = $(this).attr('href');
			// var session_id = 0; // /* @todo: read */ $.cookie('session_id');
			var session_id = Cookies.get('app_key');

			if (!url) {
				showMessage(true, 'Debe indicar una dirección')
				return;
			}

			// cambiamos el state del browser
			history.pushState({}, null, url);

			alert("calling to: " + url);

			// solicitamos al server 
			ajaxLoading(true, 'Cargando pantalla...');
			$.get(url, {
				session_id : session_id
			}, function(response) {

				$(item).siblings().removeClass('active');
				$(item).addClass('active');
			
				console.log(response);
				// $('').html(response);
				ajaxLoading(false);

			}, 'html');

			return false;

		});

	});

	/* __ end facebook api __ */

	function showMessage(show, message, type) {

		if (show) {

			alert(message)

		}
	}

	function ajaxLoading(on, message) {

		if (!on) {

			ajax_message.text('');

			ajax_locker.removeClass('visible');

			return;
		}

		var message = message ? message : 'Cargando...';

		ajax_message.text(message);

		if (!ajax_locker.is('.visible')) {

			ajax_locker.addClass('visible');

		}
	}

});