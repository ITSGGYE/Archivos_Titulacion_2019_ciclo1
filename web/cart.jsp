
<%@page import="Clases.Producto"%>
<%@page import="Models.Mproductos"%>
<%@page import="Clases.Articulo"%>
<%@page import="java.util.ArrayList"%>
<%@page import="java.text.SimpleDateFormat"%>
<%@page import="java.util.Date"%>
<%@page import="java.text.DateFormat"%>
<%
    HttpSession sesion = request.getSession(true);
    ArrayList<Articulo> articulos = sesion.getAttribute("carrito") == null ? null : (ArrayList) sesion.getAttribute("carrito");

%>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Carrito Compras</title>

        <script src="js/jquery.js"></script>
        <script src="js/carrito.js" type="text/javascript"></script>
        <script src="js/GuardarCompraProducto.js" type="text/javascript"></script>
        <script src="js/TotalProductos.js" type="text/javascript"></script>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

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
           <%                                        String usuario = "";
                                        String nivel = "";
                                        if (sesion.getAttribute("user") != null && sesion.getAttribute("nivel") != null) {
                                            usuario = sesion.getAttribute("user").toString();
                                            nivel = sesion.getAttribute("nivel").toString();
                                    %>
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
                                    

                                    <li Style='color: black;'><%out.print("<h5><i class='fa fa-user'></i> BIENVENID@: " + usuario + "</h5>"); %> </li>
                                    <li><a href="cart.jsp"><i class="fa fa-shopping-cart"></i> Carrito</a></li>
                                    <li><% out.print("<a href='index.jsp?cerrar=true'><li><i class='fa fa-times'></i> Cerrar Sesión</li></a>");%></li>
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            
            <%} else {
                                        out.print("<script>location.replace('index.jsp');</script>");
                                    }%> 
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

        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Inicio</a></li>
                        <li class="active">Carrito Compras</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info " id="cart-container">
                    <table class="table table-condensed" id="shop-table">
                        <thead style="text-align: center;">
                            <tr class="cart_menu">
                                <td class="image">Almuerzo</td>
                                <td class="description"></td>
                                <td class="price">Precio</td>
                                <td class="quantity">Cantidad</td>
                                <td class="total">Valor Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="tablaProductos">
                            <%
                                Mproductos mp = new Mproductos();
                                double total = 0;
                                if (articulos != null) {

                                    for (Articulo a : articulos) {
                                        Producto producto = mp.getProducto(a.getIdproducto());
                                        //total += a.getCantidad() * producto.getPrecio();
                            %>

                            <tr style="text-align: center;font-size: 1.4em;">
                                <td class="cart_product">
                                    <a href=""><img src="<%=producto.getImg()%>" Style="width: 120px;" alt=""></a>
                                </td>
                                <td class="cart_description"><%=producto.getNombre()%></td>
                                <td style="display: none;"> <%=producto.getId()%></td>
                                <td class="cart_price">$<%=producto.getPrecio()%></td>
                                <td class="cart_quantity"><%=a.getCantidad()%></td>
                                <td class="cart_total" style="color: orange"><%=Math.round(producto.getPrecio() * a.getCantidad() * 100.0) / 100.0%></td>
                                <td class="cart_delete">
                                    <span id="idarticulo1" Style="display: none;"><%= producto.getId()%></span>
                                    <a class="cart_quantity_delete" id="deleteitem" href=""><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <%}
                                                    }%>



                        </tbody>

                    </table>
                    <%  if (articulos == null) { %>
                    <h4>No hay Articulos en el Carro</h4>
                    <%}%>             
                </div>

                <a href="javascript:window.history.go(-2);" style="font-size: 1.4em;"><i class="fa fa-shopping-cart"></i> Seguir Comprando</a>
            </div>
        </section> <!--/#cart_items-->

        <section id="do_action">
            <div class="container">

                <div class="row">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Carrito Sub Total <span id="tt-subtotal"></span></li>

                                <li>Costo Envio <span>0.0</span></li>
                                <li>Valor Total <span id="tt-total"></span></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <input type="hidden" id="usuario" value="<%= usuario %>">
                        <input type="hidden" id="fechaPedido" value="<%= fechaActual %>">
                        <button class="btn btn-primary" style="float: right" onclick="GuardarPedidoCompra()">Realizar Pedido</button>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->




        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>