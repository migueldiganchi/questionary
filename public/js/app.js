var _server_data = {
	APP_ID: null, 
	APP_SCOPES: null, 
	APP_FACEBOOK_VERSION: null
}

$(document).ready(function() {

	$.ajaxSetup({ cache: true });

	$.getScript('//connect.facebook.net/es_AR/sdk.js', function(){

		// fb initialization
		FB.init({
			appId: '917191974988880',	
			status: true,
			cookie: true,
			version: 'v2.3'
		});
 	
		// getting login status
		FB.getLoginStatus(handleFacebookResponse);

		// FB methods
		function doLogin() {
			FB.login(handleFacebookResponse, { scope: 'public_profile, email, read_custom_friendlists, user_friends' });
		}

		function handleFacebookResponse(fb_response){

			if (fb_response.status === 'connected') {

				$.get('/auth/facebook', null, function(app_response) {

					if ( !app_response.success ) {
						
						var message = (typeof app_response.error != 'undefined')
							 ? 'Error ' + app_response.error.code + ': ' + app_response.error.message 
							 : 'Unknown Error'

						alert(message);

						return;
					}

					// success
					alert("hide login panel, show main form & get the user profile with: " + app_response.data.session_id);

					// 1. hide login panel

					// 2. show questions panel

				}, 'json');

			} else if (fb_response.status === 'not_authorized') {
				alert("El usuario no esta autorizado para acceder a la aplicación.");
			} else {
				alert("hide other panels & show login form");
			}
		}

		// control events
		$('form#login_form').submit(function() {
			
			doLogin();

			// ajax request
			return false;
		});

	});

});