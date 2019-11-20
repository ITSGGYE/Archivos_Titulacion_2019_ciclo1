<?php include("vistas/incluir/autenticacion.php"); ?> 

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
			include('vistas/incluir/menu.php'); 
		?>
	</header>

	<!--================Banner secundario=================-->
    <section class="banner_micro">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="banner_content">
                    <div class="page_link"> 
                        <a>Registrando nuevo Cliente </a>
                        <a href="<?php echo $helper->url('clientes', 'lista'); ?>">Volver</a> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout_area section_gap_min">
		<div class="container">
			<div class="billing_details">
				<div class="row">
					<div class="col-md-12">
						<h3>Datos del Cliente</h3>
						<form class="row contact_form" action="<?php echo $helper->url('clientes','crear'); ?>" method="post" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres y Apellidos" required>
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="text" class="form-control" id="cedula" name="cedula" maxlength="10" onkeypress="if (isNaN( String.fromCharCode(event.keyCode))) return false;" placeholder="No. de cedula">
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electronico">
							</div>							
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="telefonos" name="telefonos" placeholder="Telefonos">
							</div>
							<div class="col-md-12 text-right">
	                            <button type="submit" value="submit" class="btn submit_btn">Guardar</button>
	                        </div>
						</form>
					</div>
				</div>	
			</div>
    	</div>
    </section>

	<?php 
		include('vistas/incluir/jscripts.php');
	?>
	<script type="text/javascript">        
        function validarCedula(cedula) {
        	var digito_region = cedula.substring(0,2);
	        //Pregunto si la region existe ecuador se divide en 24 regiones
	        if( digito_region >= 1 && digito_region <=24 ){
	          // Extraigo el ultimo digito
	          var ultimo_digito   = cedula.substring(9,10);
	          //Agrupo todos los pares y los sumo
	          var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));
	          //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
	          var numero1 = cedula.substring(0,1);
	          var numero1 = (numero1 * 2);
	          if( numero1 > 9 ){ var numero1 = (numero1 - 9); }

	          var numero3 = cedula.substring(2,3);
	          var numero3 = (numero3 * 2);
	          if( numero3 > 9 ){ var numero3 = (numero3 - 9); }

	          var numero5 = cedula.substring(4,5);
	          var numero5 = (numero5 * 2);
	          if( numero5 > 9 ){ var numero5 = (numero5 - 9); }

	          var numero7 = cedula.substring(6,7);
	          var numero7 = (numero7 * 2);
	          if( numero7 > 9 ){ var numero7 = (numero7 - 9); }

	          var numero9 = cedula.substring(8,9);
	          var numero9 = (numero9 * 2);
	          if( numero9 > 9 ){ var numero9 = (numero9 - 9); }

	          var impares = numero1 + numero3 + numero5 + numero7 + numero9;
	          //Suma total
	          var suma_total = (pares + impares);
	          //extraemos el primero digito
	          var primer_digito_suma = String(suma_total).substring(0,1);
	          //Obtenemos la decena inmediata
	          var decena = (parseInt(primer_digito_suma) + 1)  * 10;
	          //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
	          var digito_validador = decena - suma_total;
	          //Si el digito validador es = a 10 toma el valor de 0
	          if(digito_validador == 10)
	            var digito_validador = 0;
	          //Validamos que el digito validador sea igual al de la cedula
	          if(digito_validador == ultimo_digito){
	            return true;
	          }else{
	            return false;
	          }
	        }else{
	        	return false;
	        }
      	}
    </script>      	
</body>	

</html>