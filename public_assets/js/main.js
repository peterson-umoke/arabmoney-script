jQuery(document).ready(function($) {

	// to make ajax calls work
	$(document).ajaxStart(function() { Pace.restart(); });

	// load the your-account content into the main view
	$("li.ajaxify_link a").click(function(e){

		// prevent the link from actually functioning
		e.preventDefault();

		// main data attributes
		var url = $(this).attr('href');
		var ajax_container = $(".content-wrapper");
		var parent_elem = $(this).parent();

		// ajaxify the link
		$.ajax({
			url: url,
			// type: 'GET',
			dataType: 'json',
		})
		.done(function(result) {

			// data from the result
			var title = result.title;
			var content  = result.content_site;
			var site_name = result.site_name;
			var meta_description = result.seo_description;

			if(result.title != "") {
				$("title").text(title + " | " + site_name);
			} else {
				$('title').text(site_name);
			}

			// adjust html as needed
			$("meta[name='description']").attr('content', meta_description);
			ajax_container.html(content);

			// set an active record on the parent element
			// parent_elem.addClass('active').removeClass('active');
		})
		.fail(function(result) {
			console.log("An error occurred" + result.status);
		})
		.always(function(result) {
			// console.log(result);
		});
												
	});

	// for the autoscroll event on the homepage
	$(".scroll").click(function(event){		
		// event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},2000);
	});
});