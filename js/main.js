jQuery(function(){
	/*/
	 * Randomise the colours
	/*/
	jQuery('.link-icons .fa').randomClasses({
		classes : ['red', 'blue', 'green', 'yellow', 'pink']
	});

	/*/
	 * Filter Repositories by language
	/*/
	jQuery('[data-toggler]').click(
		function(){
			var val = jQuery(this).attr('data-toggler');
			jQuery('[data-togglee]').removeClass('active');
			jQuery('[data-toggle="*'+val+'*"]').addClass('active');							
		}
	);

	/*/
	 * Make the repository icons fade in, individually
	/*/
	jQuery('.view-repo').each(function(i){
		jQuery(this).delay(i*500).fadeIn(250);
	});

	/*/
	 * Send the Event to Google Analytics
	/*/
	$('repo-link').click(function (e){
		e.preventDefault();
		
		var repo = '',
			url = $(this).attr('href');
		
		ga('send', 'event', 'repositoryView', 'click', repo, 
			{
				'hitCallback' : function(){
					document.location = url;
				}	
			}
		);
	});
});