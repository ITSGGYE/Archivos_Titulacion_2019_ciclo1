	$(document).ready(function(){
		$(".btn-menu").click(function(){
			var filtro = $(this).attr("data-filter");

			if (filtro == "todos") {
				$(".box-img").addClass('hide');
			   setTimeout(function(){
				$(".box-img").removeClass('hide');
			   }, 300);
			    $(".box-img").addClass('hide');
			   setTimeout(function(){
				$(".box-img").removeClass('hide');
			   }, 300);
				$(".box-img").addClass('hide');
			   setTimeout(function(){
				$(".box-img").removeClass('hide');
			   }, 300);
			} else {
				$(".box-img").addClass('hide');
				setTimeout(function(){
					$("."+filtro).removeClass('hide');
				}, 300);
				$(".box-img").addClass('hide');
				setTimeout(function(){
					$("."+filtro).removeClass('hide');
				}, 300);
				$(".box-img").addClass('hide');
				setTimeout(function(){
					$("."+filtro).removeClass('hide');
				}, 300);		
		}
	});
   });