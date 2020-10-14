function take_survey()
{
	var user_browser		=	navigator.userAgent;
	var	user_browser_device	=	navigator.platform;	
	var param				= 	{'user_browser':user_browser, 'user_device':user_browser_device }
	$.ajax({

			type:'GET',
			url:'takeSurvey',
			data:{'user_info':param},
			headers: { '_token' : $("input[name='_token']").val() },
	        dataType: "json",
	        success:function(data)
	        {
	        	console.log(data);
	        	window.location.href = "survey?id="+data;
	        },
	        error:function()
	        {
	        	console.log('Failed to open survey');
	        }
	})
	
}
