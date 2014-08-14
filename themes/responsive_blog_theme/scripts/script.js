(function($) {
  $(function() {

	$(".field-name-field-big-image").each(function(){
	    $(this).closest('.node-teaser').prepend(this);
	});

  });
})(jQuery);