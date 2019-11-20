

<%@page import="Clases.Producto"%>
<% 

Integer idproducto = (Integer)session.getAttribute("idproducto");
String img = (String)session.getAttribute("img");
String nombre = (String)session.getAttribute("nombre");
Double precio = (Double)session.getAttribute("precio");
    %>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Detalle Productos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link href="imagenes/logo.png" rel="shortcut icon" type="images/x-icon"/>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		 <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                
                                <a href="CarritoCompras.jsp"><img src="imagenes/logo.png" alt="" Style="width: 120px;" /></a>
                            </div>
                            
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <% 
                                  HttpSession sesion=request.getSession();
                                 
                                String usuario="";
                                String nivel="";
                                if(sesion.getAttribute("user")!=null && sesion.getAttribute("nivel")!=null){
                                    usuario=sesion.getAttribute("user").toString();
                                    nivel=sesion.getAttribute("nivel").toString();   
                              %>
                                    
                                    <li Style='color: black;'><%out.print("<h5><i class='fa fa-user'></i> BIENVENID@: "+usuario+"</h5>"); %> </li>
                                    <li><a href="cart.jsp"><i class="fa fa-shopping-cart"></i> Carrito</a></li>
                                    
                                    <li><% out.print("<a href='index.jsp?cerrar=true'><li><i class='fa fa-times'></i> Cerrar Sesión</li></a>");%></li>
                                    
                                <%}else{
                                    out.print("<script>location.replace('index.jsp');</script>");
                                }%> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->
		
		
	
		 <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="CarritoCompras.jsp">Inicio</a></li>
                                    <li class="dropdown"><a href="#" class="active">Tienda<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            
                                            <li><a href="product-details.jsp">Detalle de Productos</a></li>
                                            <li><a href="cart.jsp">Carrito</a></li> 
                                            
                                        </ul>
                                    </li> 
                                    
                                </ul>
                            </div>
                        </div>
                       
                </div>
            </div>
            </div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<%=img %>">
								
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><%=nombre %> </h2>
                                                                <img src="images/product-details/rating.png" alt=""/>
                                                                <form action="ServletAgregarCarrito" method="post">
                                                                    <span>
                                                                        <span>US $<%=precio%></span>
                                                                        <label>Cantidad:</label>
                                                                        <input type="hidden" value="<%= nombre%>" name="nombreproducto" />
                                                                         <input type="hidden" value="<%= precio%>" name="precioproducto" />
                                                                        <input type="hidden" value="<%= idproducto%>" name="idproducto" />
                                                                        <input type="text" value="1" id="Prod-cantidad" name="cantidad" />
                                                                        <button type="submit" class="btn btn-fefault cart">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                            Agregar Carrito
                                                                        </button>
                                                                    </span>

                                                                </form>
								
								
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					
					
					
					
				</div>
			</div>
		</div>
	</section>
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>