jQuery(document).ready(function($) {

	// to make ajax calls work
	$(document).ajaxStart(function() { Pace.restart(); });

	// for the autoscroll event on the homepage
	$(".scroll").click(function(event){		
		// event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},2000);
	});
});