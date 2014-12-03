			jQuery(
				function(){
					jQuery('.link-icons .fa').randomClasses({
						classes : ['red', 'blue', 'green', 'yellow', 'pink']
					});

					// @TODO - actually make this kinda nice.
					jQuery('[data-toggler]').click(
						function(){
							var val = jQuery(this).attr('data-toggler');
							jQuery('[data-togglee]').removeClass('active');
							jQuery('[data-toggle="*'+val+'*"]').addClass('active');							
						}
					);

					// Fade in the View Repo CTAs - because we like pointless prettiness like that.
					jQuery('.view-repo').each(function(i){
						jQuery(this).delay(i*500).fadeIn(250);
					});
				}
			);
