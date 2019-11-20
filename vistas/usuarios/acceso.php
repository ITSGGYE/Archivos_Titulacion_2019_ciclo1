<!doctype html>
<html lang="es">

<head>
	<?php 
		include('vistas/incluir/cabecera.php'); 
	?>	
</head>

<body>

	<!--================ Encabezado - Menu =============-->
	<header class="header_area">
		<?php 
			include('vistas/incluir/p_menu.php'); 
		?>
	</header>

	<!--================Banner secundario=================-->
    <section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Acceso de usuarios</h2>
					<div class="page_link">
						<a href="<?php echo $helper->url('tienda','inicio'); ?>">Inicio </a>
						<a >Acceder</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--================Area de acceso=================-->
	<section class="login_box_area">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="otros/img/login.jpg" alt="">
						<div class="hover">
							<h4>Area administrativa</h4>
							<p>Digite su correo electronico y contraseña para valida su ingreso</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Digite sus credenciales</h3>
						<p id="msj"></p>
						<div class="row login_form" id="formAcceso" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electronico">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
							</div>
							<div class="col-md-12 form-group">
								<button id="btnAcceso" data-accion="<?php echo $helper->url('usuarios','acceso'); ?>" data-destino="<?php echo $helper->url('agenda','lista'); ?>" class="btn submit_btn">Acceder</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!--================ Pie de pagina =================-->
	<footer class="subscription-area section_gap"> 
		<?php 
			include('vistas/incluir/p_pie.php');			
		?>
	</footer>

	<?php 
		include('vistas/incluir/jscripts.php');
	?>
	<script type="text/javascript">
		$("#btnAcceso").click(function() {
			var urla = $("#btnAcceso").attr("data-accion");
			var urlg = $("#btnAcceso").attr("data-destino");
			var cor = $('#correo').val();
            var cla = $('#clave').val();
            $.ajax({
                type: "GET",
                dataType: 'json;',
                url: urla,
                data: {
                    correo: cor,
                    clave: cla,
                },
                complete: function(data) {
            		var id = parseInt(data.responseText);
            		if (data.status == 200 && id > 0) {
            			window.location.href = urlg;
            		} else {
            			alert("El usuario y/o la contraseña son invalidos.");
            		}
            	}
            });
		});
	</script>
</body>	

</html>