jQuery(document).ready(function($) {

	var login_form = $(".login_form_home"),
		registration_form = $("#registration_form"),
		error = $(".error_message"),
		success = $(".success_message"),
		info = $(".info_message"),
		login_progress_bar = $(".login_progress");

	// the login form ajax methods
	login_form.on("submit",function(e){

		var him = $(this),
			data = him.serialize(),
			url = him.attr('action'),
			method = him.attr("method");

		// hide the progress bar
		login_progress_bar.hide().find(".progress-bar").css("width",'10%');

		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: data,
		})
		.done(function(result) {
			if(result.form_error){
				error.fadeIn("slow")
				.find(".alert-content")
				.html(result.form_error);
				
				// hide the un-needed methods
				success.hide();
				info.hide();
			}

			if(result.form_success){
				success.fadeIn("slow").slideDown('slow')
				.find(".alert-content")
				.html(result.form_success);

				// hide the un-needed methods
				error.hide();
				info.hide();
			}

			if(result.info){
				info.fadeIn("slow").slideDown('slow')
				.find(".alert-content")
				.html(result.info);

				// hide the un-needed methods
				success.hide();
				error.hide();
			}

			if(result.newLocation) {
				login_progress_bar.show("slow",function(){
					$(this).find(".progress-bar")
					.addClass('active')
					.animate({width: '100%'}, 1500);
				});

				login_form.find(".btn.btn-flat")
				.html("<i class=\"fa fa-circle-o-notch fa-spin\"></i>")
				.attr('disabled', 'disabled');

				setTimeout(function(){
					window.location = result.newLocation;
				}, 3500);
			}
		})
		.fail(function(result) {
			info.fadeIn("slow").slideDown('slow')
			.find(".alert-content")
			.html("The Login Form has failed to respond please try again.");

			// hide the un-needed methods
			success.hide();
			error.hide();
		});
		

		e.preventDefault();
	});

	//registration form
	registration_form.on("submit",function(e){

		var him = $(this),
			url = him.attr("action"),
			content = him.serialize();

		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: content,
		})
		.done(function(result) {
			if(result.register_error) {
				$(".register_fail").fadeIn("slow",function(){
					$(this).html("<h3><i class=\"fa fa-info-circle\"></i> Alert </h3>" + result.register_error);
					$(".register_success").hide();
				});
			} 
			else if(result.register_success) {
				$(".register_success").fadeIn('slow', function() {
					$(this).html("<h3><i class=\"fa fa-ok-circle\"></i> Success </h3>" + result.register_success);
					$(".register_fail").hide();
				});
			}

			if(result.newLocation) {

				registration_form.find(".btn.btn-flat")
				.html("<i class=\"fa fa-circle-o-notch fa-spin\"></i>");

				setTimeout(function(){
					window.location = result.newLocation;
				}, 3500);
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function(result) {
			if(result.responseText){
				console.log(result.responseText);
			} else {
				console.log(result);
			}
		});
		
		
		// prevent the default submit action to take place
		e.preventDefault();
	});
});