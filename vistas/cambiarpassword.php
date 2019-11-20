<?php session_start();?>
<?php  

if(!isset($_SESSION["profesor"]))
{
 header("location:index.php");
 
}
 
$id=$_SESSION['profesor']['id'];
require_once "../clases/conexion.php";
?>

<!DOCTYPE html>
<html>
<head>
	
	<title></title>
	<?php require_once "dependencias.php"; 
	 ?>
</head>
<body >
<?php
if($_SESSION["profesor"]["privilegio"]=='I'){
	require_once "menu2.php";
} else {
	if($_SESSION["profesor"]["privilegio"]=='P'){
require_once "menu3.php";
} else {
	require_once "menunotas.php"; 

}
}

?>
<div class="container-fluid" >
<div class="row">
<div class="col-sm-9" >
<h1>CAMBIAR CONTRASEÑA</h1>
</div>
</div>
<div class="row">
	<div class="col-lg-1"></div>
<div class="col-lg-12 col-sm-offset-3">
<p class="text-center">Use el siguiente formulario para cambiar su contraseña. Su contraseña no puede ser la misma que su nombre de usuario.</p>
<form method="post" id="passwordForm">
	<div class="col-sm-6">
<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
</div>
<div class="row">
<div class="col-sm-4">
<span id="8char" class="fa fa-times" style="color:#FF0004;"></span> Mínimo 8 caracteres<br>
<span id="ucase" class="fa fa-times" style="color:#FF0004;"></span> Una letra Mayúscula
</div>
<div class="col-sm-4">
<span id="lcase" class="fa fa-times" style="color:#FF0004;"></span> Una letra Minúscula<br>
<span id="num" class="fa fa-times" style="color:#FF0004;"></span> Un número
</div>
</div>
<div class="col-sm-6">
<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
</div>
<div class="row">
<div class="col-sm-12">
<span id="pwmatch" class="fa fa-times" style="color:#FF0004;"></span> Passwords Match
</div>
</div>
<input type="hidden" class="input-lg form-control" name="idprofesor" id="idprofesor"  autocomplete="off" value="<?php echo $id ?>" >
<button type="button" class="btn btn-warning" id="btnpass">Change Password</button>


</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>

	
</body>
</html>

<script type="text/javascript">
	$("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
	var lcase = new RegExp("[a-z]+");
	var num = new RegExp("[0-9]+");
	
	if($("#password1").val().length >= 8){
		$("#8char").removeClass("fa fa-times");
		$("#8char").addClass("fa fa-check");
		$("#8char").css("color","#00A41E");
	}else{
		$("#8char").removeClass("fa fa-check");
		$("#8char").addClass("fa fa-times");
		$("#8char").css("color","#FF0004");
	}
	
	if(ucase.test($("#password1").val())){
		$("#ucase").removeClass("fa fa-times");
		$("#ucase").addClass("fa fa-check");
		$("#ucase").css("color","#00A41E");
	}else{
		$("#ucase").removeClass("glyphicon-ok");
		$("#ucase").addClass("a fa-times");
		$("#ucase").css("color","#FF0004");
	}
	
	if(lcase.test($("#password1").val())){
		$("#lcase").removeClass("fa fa-times");
		$("#lcase").addClass("fa fa-check");
		$("#lcase").css("color","#00A41E");
	}else{
		$("#lcase").removeClass("fa fa-check");
		$("#lcase").addClass("fa fa-times");
		$("#lcase").css("color","#FF0004");
	}
	
	if(num.test($("#password1").val())){
		$("#num").removeClass("fa fa-times");
		$("#num").addClass("fa fa-check");
		$("#num").css("color","#00A41E");
	}else{
		$("#num").removeClass("fa fa-check");
		$("#num").addClass("fa fa-times");
		$("#num").css("color","#FF0004");
	}
	
	if($("#password1").val() == $("#password2").val()){
		$("#pwmatch").removeClass("fa fa-times");
		$("#pwmatch").addClass("fa fa-check");
		$("#pwmatch").css("color","#00A41E");
	}else{
		$("#pwmatch").removeClass("fa fa-check");
		$("#pwmatch").addClass("fa fa-times");
		$("#pwmatch").css("color","#FF0004");
	}
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		

			$('#btnpass').click(function(){
			var formData = new FormData(document.getElementById("passwordForm"));

			$.ajax({
					url:"../procesos/Usuarios/actualizarPassword.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					
					if(r==1){
							$('#passwordForm')[0].reset();
						alertify.success("Actualizado con éxito :D");

					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});
	});
</script>

