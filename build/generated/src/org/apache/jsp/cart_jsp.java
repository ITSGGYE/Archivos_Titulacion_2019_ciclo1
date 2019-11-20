package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import Clases.Producto;
import Models.Mproductos;
import Clases.Articulo;
import java.util.ArrayList;

public final class cart_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final JspFactory _jspxFactory = JspFactory.getDefaultFactory();

  private static java.util.List<String> _jspx_dependants;

  private org.glassfish.jsp.api.ResourceInjector _jspx_resourceInjector;

  public java.util.List<String> getDependants() {
    return _jspx_dependants;
  }

  public void _jspService(HttpServletRequest request, HttpServletResponse response)
        throws java.io.IOException, ServletException {

    PageContext pageContext = null;
    HttpSession session = null;
    ServletContext application = null;
    ServletConfig config = null;
    JspWriter out = null;
    Object page = this;
    JspWriter _jspx_out = null;
    PageContext _jspx_page_context = null;

    try {
      response.setContentType("text/html");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;
      _jspx_resourceInjector = (org.glassfish.jsp.api.ResourceInjector) application.getAttribute("com.sun.appserv.jsp.resource.injector");

      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");

    HttpSession sesion = request.getSession(true);
    ArrayList<Articulo> articulos = sesion.getAttribute("carrito") == null ? null : (ArrayList) sesion.getAttribute("carrito");


      out.write("\n");
      out.write("\n");
      out.write("<!DOCTYPE html>\n");
      out.write("<html lang=\"en\">\n");
      out.write("    <head>\n");
      out.write("        <meta charset=\"utf-8\">\n");
      out.write("        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n");
      out.write("        <meta name=\"description\" content=\"\">\n");
      out.write("        <meta name=\"author\" content=\"\">\n");
      out.write("        <title>Carrito Compras</title>\n");
      out.write("\n");
      out.write("        <script src=\"js/jquery.js\"></script>\n");
      out.write("        <script src=\"js/carrito.js\" type=\"text/javascript\"></script>\n");
      out.write("\n");
      out.write("        <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">\n");
      out.write("        <link href=\"css/font-awesome.min.css\" rel=\"stylesheet\">\n");
      out.write("        <link href=\"css/prettyPhoto.css\" rel=\"stylesheet\">\n");
      out.write("        <link href=\"css/price-range.css\" rel=\"stylesheet\">\n");
      out.write("        <link href=\"css/animate.css\" rel=\"stylesheet\">\n");
      out.write("        <link href=\"css/main.css\" rel=\"stylesheet\">\n");
      out.write("        <link href=\"css/responsive.css\" rel=\"stylesheet\">\n");
      out.write("\n");
      out.write("        <link href=\"imagenes/logo.png\" rel=\"shortcut icon\" type=\"images/x-icon\"/>\n");
      out.write("        <link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"images/ico/apple-touch-icon-144-precomposed.png\">\n");
      out.write("        <link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"images/ico/apple-touch-icon-114-precomposed.png\">\n");
      out.write("        <link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"images/ico/apple-touch-icon-72-precomposed.png\">\n");
      out.write("        <link rel=\"apple-touch-icon-precomposed\" href=\"images/ico/apple-touch-icon-57-precomposed.png\">\n");
      out.write("    </head><!--/head-->\n");
      out.write("\n");
      out.write("    <body>\n");
      out.write("        <header id=\"header\"><!--header-->\n");
      out.write("            <div class=\"header-middle\"><!--header-middle-->\n");
      out.write("                <div class=\"container\">\n");
      out.write("                    <div class=\"row\">\n");
      out.write("                        <div class=\"col-sm-4\">\n");
      out.write("                            <div class=\"logo pull-left\">\n");
      out.write("\n");
      out.write("                                <a href=\"CarritoCompras.jsp\"><img src=\"imagenes/logo.png\" alt=\"\" Style=\"width: 120px;\" /></a>\n");
      out.write("                            </div>\n");
      out.write("\n");
      out.write("                        </div>\n");
      out.write("                        <div class=\"col-sm-8\">\n");
      out.write("                            <div class=\"shop-menu pull-right\">\n");
      out.write("                                <ul class=\"nav navbar-nav\">\n");
      out.write("                                    ");
                                        String usuario = "";
                                        String nivel = "";
                                        if (sesion.getAttribute("user") != null && sesion.getAttribute("nivel") != null) {
                                            usuario = sesion.getAttribute("user").toString();
                                            nivel = sesion.getAttribute("nivel").toString();
                                    
      out.write("\n");
      out.write("\n");
      out.write("                                    <li Style='color: black;'>");
out.print("<h5><i class='fa fa-user'></i> BIENVENID@: " + usuario + "</h5>"); 
      out.write(" </li>\n");
      out.write("                                    <li><a href=\"cart.jsp\"><i class=\"fa fa-shopping-cart\"></i> Carrito</a></li>\n");
      out.write("                                    <li>");
 out.print("<a href='index.jsp?cerrar=true'><li><i class='fa fa-times'></i> Cerrar Sesión</li></a>");
      out.write("</li>\n");
      out.write("\n");
      out.write("                                    ");
} else {
                                        out.print("<script>location.replace('index.jsp');</script>");
                                    }
      out.write(" \n");
      out.write("                                </ul>\n");
      out.write("                            </div>\n");
      out.write("                        </div>\n");
      out.write("                    </div>\n");
      out.write("                </div>\n");
      out.write("            </div><!--/header-middle-->\n");
      out.write("\n");
      out.write("            <div class=\"header-bottom\"><!--header-bottom-->\n");
      out.write("                <div class=\"container\">\n");
      out.write("                    <div class=\"row\">\n");
      out.write("                        <div class=\"col-sm-9\">\n");
      out.write("                            <div class=\"navbar-header\">\n");
      out.write("                                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">\n");
      out.write("                                    <span class=\"sr-only\">Toggle navigation</span>\n");
      out.write("                                    <span class=\"icon-bar\"></span>\n");
      out.write("                                    <span class=\"icon-bar\"></span>\n");
      out.write("                                    <span class=\"icon-bar\"></span>\n");
      out.write("                                </button>\n");
      out.write("                            </div>\n");
      out.write("                            <div class=\"mainmenu pull-left\">\n");
      out.write("                                <ul class=\"nav navbar-nav collapse navbar-collapse\">\n");
      out.write("                                    <li><a href=\"CarritoCompras.jsp\">Inicio</a></li>\n");
      out.write("                                    <li class=\"dropdown\"><a href=\"#\" class=\"active\">Tienda<i class=\"fa fa-angle-down\"></i></a>\n");
      out.write("                                        <ul role=\"menu\" class=\"sub-menu\">\n");
      out.write("\n");
      out.write("                                            <li><a href=\"product-details.jsp\">Detalle de Productos</a></li>\n");
      out.write("                                            <li><a href=\"cart.jsp\">Carrito</a></li> \n");
      out.write("\n");
      out.write("                                        </ul>\n");
      out.write("                                    </li> \n");
      out.write("\n");
      out.write("                                </ul>\n");
      out.write("                            </div>\n");
      out.write("                        </div>\n");
      out.write("\n");
      out.write("                    </div>\n");
      out.write("                </div>\n");
      out.write("            </div><!--/header-bottom-->\n");
      out.write("        </header><!--/header-->\n");
      out.write("\n");
      out.write("        <section id=\"cart_items\">\n");
      out.write("            <div class=\"container\">\n");
      out.write("                <div class=\"breadcrumbs\">\n");
      out.write("                    <ol class=\"breadcrumb\">\n");
      out.write("                        <li><a href=\"#\">Inicio</a></li>\n");
      out.write("                        <li class=\"active\">Carrito Compras</li>\n");
      out.write("                    </ol>\n");
      out.write("                </div>\n");
      out.write("                <div class=\"table-responsive cart_info \" id=\"cart-container\">\n");
      out.write("                    <table class=\"table table-condensed\" id=\"shop-table\">\n");
      out.write("                        <thead>\n");
      out.write("                            <tr class=\"cart_menu\">\n");
      out.write("                                <td class=\"image\">Almuerzo</td>\n");
      out.write("                                <td class=\"description\"></td>\n");
      out.write("                                <td class=\"price\">Precio</td>\n");
      out.write("                                <td class=\"quantity\">Cantidad</td>\n");
      out.write("                                <td class=\"total\">valor Total</td>\n");
      out.write("                                <td></td>\n");
      out.write("                            </tr>\n");
      out.write("                        </thead>\n");
      out.write("                        <tbody>\n");
      out.write("                            ");

                                Mproductos mp = new Mproductos();
                                double total = 0;
                                if (articulos != null) {

                                    for (Articulo a : articulos) {
                                        Producto producto = mp.getProducto(a.getIdproducto());
                                        total += a.getCantidad() * producto.getPrecio();
                            
      out.write("\n");
      out.write("\n");
      out.write("                            <tr style=\"text-align: center;\">\n");
      out.write("                                <td class=\"cart_product\">\n");
      out.write("                                    <a href=\"\"><img src=\"");
      out.print(producto.getImg());
      out.write("\" Style=\"width: 120px;\" alt=\"\"></a>\n");
      out.write("                                </td>\n");
      out.write("                                <td class=\"cart_description\">\n");
      out.write("                                    <h4><a href=\"\">");
      out.print(producto.getNombre());
      out.write(" </a></h4>\n");
      out.write("\n");
      out.write("                                </td>\n");
      out.write("                                <td style=\"display: none;\"> ");
      out.print(producto.getId());
      out.write("</td>\n");
      out.write("                                <td class=\"cart_price\">\n");
      out.write("                                    <p>$");
      out.print(producto.getPrecio());
      out.write("</p>\n");
      out.write("                                </td>\n");
      out.write("                                <td class=\"cart_quantity\">\n");
      out.write("                                    ");
      out.print(a.getCantidad());
      out.write("\n");
      out.write("                                </td>\n");
      out.write("                                <td class=\"cart_total\">\n");
      out.write("                                    <p class=\"cart_total_price\" >$");
      out.print(Math.round(producto.getPrecio() * a.getCantidad() * 100.0) / 100.0);
      out.write("</p>\n");
      out.write("                                </td>\n");
      out.write("                                <td class=\"cart_delete\">\n");
      out.write("                                    <span id=\"idarticulo1\" Style=\"display: none;\">");
      out.print( producto.getId());
      out.write("</span>\n");
      out.write("                                    <a class=\"cart_quantity_delete\" id=\"deleteitem\" href=\"\"><i class=\"fa fa-times\"></i></a>\n");
      out.write("                                </td>\n");
      out.write("                            </tr>\n");
      out.write("                            ");
}
                                                    }
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("                        </tbody>\n");
      out.write("\n");
      out.write("                    </table>\n");
      out.write("                    ");
  if (articulos == null) { 
      out.write("\n");
      out.write("                    <h4>No hay Articulos en el Carro</h4>\n");
      out.write("                    ");
}
      out.write("             \n");
      out.write("                </div>\n");
      out.write("\n");
      out.write("                <a href=\"javascript:window.history.go(-2);\" style=\"font-size: 1.4em;\"><i class=\"fa fa-shopping-cart\"></i> Seguir Comprando</a>\n");
      out.write("            </div>\n");
      out.write("        </section> <!--/#cart_items-->\n");
      out.write("\n");
      out.write("        <section id=\"do_action\">\n");
      out.write("            <div class=\"container\">\n");
      out.write("\n");
      out.write("                <div class=\"row\">\n");
      out.write("                    <div class=\"col-sm-6\">\n");
      out.write("\n");
      out.write("                    </div>\n");
      out.write("                    <div class=\"col-sm-6\">\n");
      out.write("                        <div class=\"total_area\">\n");
      out.write("                            <ul>\n");
      out.write("                                <li>Carrito Sub Total <span id=\"tt-subtotal\">$");
      out.print(Math.round(total * 100.0) / 100.0);
      out.write("</span></li>\n");
      out.write("\n");
      out.write("                                <li>Costo Envio <span>0.0</span></li>\n");
      out.write("                                <li>Valor Total <span id=\"tt-total\">$");
      out.print(Math.round(total * 100.0) / 100.0);
      out.write("</span></li>\n");
      out.write("                            </ul>\n");
      out.write("\n");
      out.write("                        </div>\n");
      out.write("                    </div>\n");
      out.write("                </div>\n");
      out.write("                <div class=\"row\">\n");
      out.write("                    <div class=\"col-md-6\">\n");
      out.write("\n");
      out.write("                    </div>\n");
      out.write("                    <div class=\"col-md-6\">\n");
      out.write("                        <button class=\"btn btn-primary\" style=\"float: right\" onclick=\"GuardarPedidoCompra()\">Realizar Pedido</button>\n");
      out.write("                    </div>\n");
      out.write("                </div>\n");
      out.write("            </div>\n");
      out.write("        </section><!--/#do_action-->\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("        <script src=\"js/bootstrap.min.js\"></script>\n");
      out.write("        <script src=\"js/jquery.scrollUp.min.js\"></script>\n");
      out.write("        <script src=\"js/jquery.prettyPhoto.js\"></script>\n");
      out.write("        <script src=\"js/main.js\"></script>\n");
      out.write("\n");
      out.write("    </body>\n");
      out.write("</html>");
    } catch (Throwable t) {
      if (!(t instanceof SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          out.clearBuffer();
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
