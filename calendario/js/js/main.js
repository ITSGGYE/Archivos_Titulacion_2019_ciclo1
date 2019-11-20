$('document').ready(function(){ 
     /* validation */
	 $("#login-form").validate({
      rules:
	  {
			user_password: {
			required: true,
			},
			user_email: {
            required: true,
            email: true
            },
	   },
       messages:
	   {
            user_password:{
                      required: "Please enter your password"
                     },
            user_email: "Please enter your email address",
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#login-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'administrador/login.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-signup").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#btn-signup").html('<img src="imagen/btn-ajax-loader.gif" /> &nbsp; Signing In ...');
						setTimeout(' window.location.href = "../administrador/Admin/index.php"; ',4000);
					}
					else{
									
						$("#error").fadeIn(1000, function(){						
							$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
							$("#btn-signup").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
									});
					},
			  },
			});
				return false;
		}
	   /* login submit */
});