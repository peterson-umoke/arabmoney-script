// to make ajax calls work
jQuery(document).ajaxStart(function() { Pace.restart(); });

// when the document is ready
jQuery(document).ready(function($) {
	var ajaxContainer = $("#ajax_holder"),
		newHash = "",
		$wrapper = $("#wrapper");

	// get the required hash url
	$("ul.sidebar-menu").delegate('a', 'click', function() {
		window.location.hash = $(this).attr("href");
        return false;
	});

	$(window).bind('hashchange', function(){
    
        newHash = window.location.hash.substring(1);
        
        if (newHash) {
			var content = newHash + " #ajax_holder";
			$(".content-wrapper").wrapInner('<div class="innerWrap"></div>');
			$(".innerWrap").fadeOut("slow",function(){
				$(".innerWrap").load(content,function(result,status) {
					if(status == "error")
			            alert("Error: " + xhr.status + ": " + xhr.statusText);
			        else
						$(".innerWrap").fadeIn("slow");
						$("ul.sidebar-menu li").removeClass("active");
	                    $("ul.sidebar-menu li > a[href='"+newHash+"']").parent().addClass("active");
				});
			});
        };
        
    });
    
    $(window).trigger('hashchange');

});