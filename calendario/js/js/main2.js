$(document).ready(function(){
		$(".enlaces").click(function(){
			var valor = $(this).attr("data-nombre");

			if (valor == "todos") {
				$(".filtro").show(1000);
			} else {
				$(".filtro").not("."+ valor).hide(1000);
				$(".filtro").filter("."+ valor).show(1000);
			}

		$("ul .enlaces").click(function(){
			$(this).addClass("active").siblings().removeClass("active");
		});
	});
});