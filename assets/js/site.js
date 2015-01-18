$('form').on('submit', function(event) {
	var that = this;
	event.preventDefault();
	$('.bootstrap-growl').remove();

	var post_data = $(this).serialize();
	var url = $(this).attr('action') + '_validation';

	$.ajax({type: 'POST',url: url,data: post_data, success:
		function(response) {
		
			if (response.success == true) {
				/* success - now we can really submit the form */
				$(that).unbind('submit').submit();
			} else {
				/*
				fail - you can display these however you like
				*/
				var err_msg = '';
				
				for (variable in response.errors) {
					err_msg += response.errors[variable] + '<br>';
				}

				$.bootstrapGrowl(err_msg, {
          type: 'danger',
          align: 'right',
          width: 'auto',
          delay: 99999,
          allow_dismiss: true
        });

			}
		}
	});
});