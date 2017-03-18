jQuery(document).ready(function($) {
	$(".scroll").click(function(event){		
		// event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},2000);
	});

	$('#responsive').change(function(){
	  $('#responsive_wrapper').width($(this).val());
	});
});