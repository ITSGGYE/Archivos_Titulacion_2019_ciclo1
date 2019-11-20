<%@page import="Models.Conexion"%>
<%@page import="java.util.ArrayList"%>
<%@page import="java.text.SimpleDateFormat"%>
<%@page import="java.util.Date"%>
<%@page import="java.text.DateFormat"%>
<%@page import="Clases.Producto"%>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Carrito Compras</title>

        <script src="js/jquery.js"></script>
        <script src="js/GuardarPeticiones.js" type="text/javascript"></script>


        <!-- Diseños CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!-- // -->

        <link href="imagenes/logo.png" rel="shortcut icon" type="images/x-icon"/>
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <%
            DateFormat formato = new SimpleDateFormat("YYYY-MM-dd  HH:mm:ss");
            String fechaActual = formato.format(new Date());

        %>
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
                                        HttpSession sesion = request.getSession();

                                        String usuario = "";
                                        String nivel = "";
                                        if (sesion.getAttribute("user") != null && sesion.getAttribute("nivel") != null) {
                                            usuario = sesion.getAttribute("user").toString();
                                            nivel = sesion.getAttribute("nivel").toString();
                                    %>

                                    <li Style='color: black;'><%out.print("<h5><i class='fa fa-user'></i> BIENVENID@: " + usuario + "</h5>"); %> </li>
                                    <li><a href="cart.jsp"><i class="fa fa-shopping-cart"></i> Carrito</a></li>

                                    <li><% out.print("<a href='index.jsp?cerrar=true'><li><i class='fa fa-times'></i> Cerrar Sesión</li></a>");%></li>

                                 <%} else {
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
                        <div class="col-sm-12">
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
                            <div class='mainmenu pull-right'>
                                <ul class='nav navbar-nav navbar-right'>
                                    <li style='float: right'>
                                        <button class='btn btn-success' data-toggle="modal" data-target="#VentanaAtencion">Atención Personalizada</button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- Modal -->
        <div class="modal fade" id="VentanaAtencion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Mensaje de Información</h4>
                    </div>
                    <div class="modal-body">
                        Su solicitud de atención personalizada esta en proceso
                        desea esperar 5 minutos?...
                    </div>
                    <div class="modal-footer">
                        <input type='hidden' id='usuario' value='<%= usuario %>'>
                        <input type='hidden' id='mensaje'  value='Peticion de solicitud de mesero'>
                        <input type='hidden' id='fechaActual' value='<%= fechaActual %>'>
                        <button type="button" class="btn btn-default" id="cerrarModal" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-success" onclick='GuardarPeticion()'>Si</button>
                    </div>
                </div>
            </div>
        </div>
        
        <section>
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 padding-right">
                        <div class="features_items"><!--Productos-->
                            <h2 class="title text-center">Almuerzos</h2>
                            <table>
                                <%
                                    ArrayList<Producto> productos = Models.Mproductos.getAllProductos();

                                    for (Producto p : productos) {%>
                                <div class="col-sm-3"> 
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<%= p.getImg()%>" alt="" />
                                                <h2>$<%= p.getPrecio()%></h2>
                                                <p><%= p.getNombre()%></p>
                                                <form method="post" action="ServletProducto">
                                                    <input type="hidden" name="idproducto" value="<%=p.getId()%>">
                                                    <input type="hidden" name="img" value="<%=p.getImg()%>">
                                                    <input type="hidden" name="nombre" value="<%=p.getNombre()%>">
                                                    <input type="hidden" name="precio" value="<%=p.getPrecio()%>">
                                                    <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Comprar</button>
                                                </form>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2><%= p.getPrecio()%></h2>
                                                    <p><%= p.getNombre()%></p>
                                                    <form method="post" action="ServletProducto">
                                                        <input type="hidden" name="idproducto" value="<%=p.getId()%>">
                                                        <input type="hidden" name="img" value="<%=p.getImg()%>">
                                                        <input type="hidden" name="nombre" value="<%=p.getNombre()%>">
                                                        <input type="hidden" name="precio" value="<%=p.getPrecio()%>">
                                                        <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Comprar</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href=""></a></li>
                                                <li><a href=""></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <%}
                                %>
                            </table>


                        </div><!--features_items-->
                    </div>
                </div>
            </div>
        </section>







        
        <script src="js/bootstrap.min.js"></script>
      
    </body>
</html>