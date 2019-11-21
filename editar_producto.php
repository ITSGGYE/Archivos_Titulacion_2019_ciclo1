<?php
include("php/inicio_sesion.php");
usuario_adm();
//include("php/inicio_sesion.php");
include("php/conexion.php");
$x_id=$_REQUEST['id'];

//echo $x_id;
$conexion=conexion();
$cadena="SELECT tipo_pro_id,
    tipo_pro_nombre
FROM tipo_producto order by tipo_pro_nombre ASC;";
$cadena_variedad="SELECT variedad_id,
    variedad_nombre,
    variedad_creado,
    variedad_actualizado,
    variedad_status
FROM variedad;";

$cadena_producto="SELECT prod_id,
   pro_nombre,
    pro_valor,
    pro_tipo,
    pro_foto,
    pro_descripcion,
    pro_visible,
    pro_presentacion,
    pro_variedad,
    pro_peso,
    pro_creado,
    pro_actualizado
FROM producto
WHERE prod_id=$x_id;";

//echo $cadena_producto;

$result_variedad=mysqli_query($conexion,$cadena_variedad);
$result=mysqli_query($conexion,$cadena);
$result_producto=mysqli_query($conexion,$cadena_producto);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="css/style.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css">
 <link rel="stylesheet" href="css/stylesheet.css">
 <script src="js/parser_rules/advanced.js" ></script>
 <script src="js/dist/wysihtml5-0.3.0.js" ></script>
 <script language='javascript' src='js/deber.js'></script>
 <script>
					function abrirpopup(url,ancho,alto){
	
					//Ajustar horizontalmente
					var x=(screen.width/2)-(ancho/2);
					//Ajustar verticalmente
					var y=(screen.height/2)-(alto/2);
					window.open(url, 'popup', 'width=' + ancho + ', height=' + alto + ', left=' + x + ', top=' + y +'');
					}

					//Enviamos a la función la url, el ancho y el alto de la ventana
					
				</script>   
<title>Editar Producto</title>
</head>

<body>


<section>
	<div class="container-fluid">
    	<div class="container">
        <div class="col-sm-12">
                       	  <h1 class="titulo_h1">EDITAR Producto</h1>
                         </div>
        	<div class="form-box">
            	<form action="php/update_producto.php" method="post" enctype="multipart/form-data">
                	<div class="row">
                    	
                         <div class="row">
                         	<div class="col-sm-4">
                            	<div class="inputbox">
                                	<!--Ingreso de datos de la base SQL-->
                                     <?php
											//Ingreso de los tipos de productos a elegir de la tabla tipo productos
											 while ($row = mysqli_fetch_assoc($result_producto)){
//buscar tipo_variedad
$temp_variedad="SELECT variedad_id,
    variedad_nombre 
	from variedad 
	where variedad_id='$row[pro_variedad]'";
	
	$x_variedad=mysqli_query($conexion,$temp_variedad);
	while ($row_var = mysqli_fetch_row($x_variedad)){ 
											 	$x_var_temp=$row_var[1]; 
											} 
											
																							  ?>
                                             <input type="number" name="id" value="<?php echo $row['prod_id'];?>" hidden="true" />
                                    <div class="InputText ">Nombre Producto</div>
                                    	<input type="text" name="nproducto" id="nproducto" class="input"  onKeyUp='mayus(this)' autofocus="autofocus" onKeyPress='return soloLetras(event)' value="<?php echo $row['pro_nombre'];?>"/>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            	<div class="inputbox">
                                <div class="InputText focus">Precio Producto</div>
                                    	<input type="text" name="precio" id="precio" maxlength="6" class="input"  onblur="return NumCheck(event, this)" value="<?php echo $row['pro_valor']; ?>" onKeyPress='return soloNumeros(event)'/>
                                	
                                </div>
                            </div>
                             <div class="col-sm-4">
                            	<div class="inputbox">
                                	<div class="InputText" >Presentacion</div>
                                   <div class="custom-select" style="width:200px;">
                                    <select class="input" name="presentacion">
                                            <option value="<?php echo $row['pro_presentacion'];?>"><?php echo $row['pro_presentacion'];?></option>
                                            <option value="Caja">Caja</option>
                                            <option value="Funda">Funda</option>
                                            </select>
                                            
                                	</div>
                                 </div>
                               </div>
                         </div>
                         
                         <div class="row">
                         	<div class="col-sm-4">
                            	<div class="inputbox">
                                	<div class="InputText" onclick="abrirpopup('variedad.html','420','190');">Variedad</div>
                                    <div class="custom-select" style="width:200px;">
                                          <select class="input" name="variedad">
                                            <option value="<?php echo $row['pro_variedad'];?>"><?php 
										echo $x_var_temp;	?></option>
                                            <?php
											//Ingreso de los tipos de productos a elegir de la tabla tipo productos
											 while ($row_variedad = mysqli_fetch_row($result_variedad)){ 
											 	echo "<option value='".$row_variedad[0]."'>" .$row_variedad[1]."</option>"; 
											} 

            								?>     
        
                                          </select>
                                        </div>
                                    
                                 </div>
                               </div>
                               <div class="col-sm-4">
                            	<div class="inputbox">
                                	<div class="InputText" onclick="abrirpopup('emergente.html','420','190');">Peso(lb)</div>
                                    <input type="text" name="peso" id="peso" maxlength="2" class="input" onKeyPress='return soloNumeros(event)' value="<?php echo $row['pro_peso'];?>" />
                                 </div>
                               </div>
                             <div class="col-sm-4">
                            	<div class="inputbox">
                                	<div class="InputText" onclick="abrirpopup('emergente.html','420','190');">Tipo Producto</div>
                                    	<div class="custom-select" style="width:200px;">
                                          <select class="input" name="tipo">
                                            <option value="<?php echo $row['pro_tipo'];?>"><?php
								$cadena_temp_prod="SELECT tipo_pro_id,
    tipo_pro_nombre
FROM tipo_producto where tipo_pro_id='$row[pro_tipo]';"; 

//echo $row['pro_tipo'];
$result_temp=mysqli_query($conexion,$cadena_temp_prod);
while ($row_tipo = mysqli_fetch_row($result_temp)){ 
											 	
echo $row_tipo[1];}
												?></option>
                                            <?php
											//Ingreso de los tipos de productos a elegir de la tabla tipo productos
											 while ($row_tipo = mysqli_fetch_row($result)){ 
											 	echo "<option value='".$row_tipo[0]."'>" .$row_tipo[1]."</option>"; 
											} 

            								?>     
        
                                          </select>
                                      
                                        </div>
                                </div>
                            </div> 
                          </div>
                          
                         
                         
                         <div class="row">
                         	
                            <div class="col-sm-12" >
                            	<div class="inputbox">
                                	<div class="InputText" >Foto Producto</div>
                                  	<div class="col-lg-7" align="center">	 	
                   <img src="images/producto/<?php echo $row['pro_foto'];?>" style="width:50%; left:50%;"/>
                                        <input type="file" name="imagen" id="imagen" accept="image/*" class="btn btn-default" style="margin-top:10px !important; "/>
                                    </div>    
                                </div>
                            </div>
                         </div>
                         <div class="row">
                         	<div class="col-sm-12">
                            	<div class="inputbox">
                                	<div class="InputText" >Descripcion Producto</div>
                                    <br />
                                    <?php // echo $row['pro_descripcion']?>	
                                    <div id="wysihtml5-editor-toolbar" style="margin-top:30px;">
      
        <ul class="commands">
          <li data-wysihtml5-command="bold" title="Make text bold (CTRL + B)" class="command"></li>
          <li data-wysihtml5-command="italic" title="Make text italic (CTRL + I)" class="command"></li>
          <li data-wysihtml5-command="insertUnorderedList" title="Insert an unordered list" class="command"></li>
          <li data-wysihtml5-command="insertOrderedList" title="Insert an ordered list" class="command"></li>
          <li data-wysihtml5-command="createLink" title="Insert a link" class="command"></li>
          <li data-wysihtml5-command="insertImage" title="Insert an image" class="command"></li>
          <li data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" title="Insert headline 1" class="command"></li>
          <li data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" title="Insert headline 2" class="command"></li>
         
         
          <li data-wysihtml5-command="insertSpeech" title="Insert speech" class="command"></li>
          <li data-wysihtml5-action="change_view" title="Show HTML" class="action"></li>
        </ul>
      
      <div data-wysihtml5-dialog="createLink" style="display: none;">
        <label>
          Link:
          <input data-wysihtml5-dialog-field="href" value="http://">
        </label>
        <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
      </div>

      <div data-wysihtml5-dialog="insertImage" style="display: none;">
        <label>
          Image:
          <input data-wysihtml5-dialog-field="src" value="http://">
        </label>
        <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
      </div>
    </div>
									<textarea id="wysihtml5-editor" name="descripcion" spellcheck="false" wrap="off" placeholder="Ingrese descripcion del producto ..."><?php  echo $row['pro_descripcion']?></textarea>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                         	<div class="col-sm-6" align="center">
                            	<div class="inputbox">
                          			<input type="submit" name="grabar" value="Grabar" class="btton btn-lg text-center" />
                                </div>
                            </div>
                            <div class="col-sm-6" align="center">
                            	<div class="inputbox">
                          			<input  type="reset" name="cancelar" value="Cancelar" class="btton btn-lg text-center" onclick="location.href = 'lista_edicion_tprod.php'" />
                                </div>
                            </div>
                          </div>
                     </div>
                     <?php 
					 }
					 ?>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
	$(".input").focus(function(){
		$(this).parent().addClass("focus");
	}).blur(function(){
		if($(this).val()===''){
		$(this).parent().removeClass("focus");		
		}
		else
		{
			$(this).parent().addClass("focus");}
		})
</script>
<script>
      var editor = new wysihtml5.Editor("wysihtml5-editor", {
        toolbar:     "wysihtml5-editor-toolbar",
        stylesheets: ["http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css", "css/editor.css"],
        parserRules: wysihtml5ParserRules
      });
      
      editor.on("load", function() {
        var composer = editor.composer;
        composer.selection.selectNode(editor.composer.element.querySelector("h1"));
      });
    </script>
 <script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
</body>
</html>