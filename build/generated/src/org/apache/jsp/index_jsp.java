package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import Models.Conexion;

public final class index_jsp extends org.apache.jasper.runtime.HttpJspBase
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
      response.setContentType("text/html;charset=UTF-8");
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
      out.write("<!DOCTYPE html>\n");
      out.write("<html>\n");
      out.write("    <head>\n");
      out.write("        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n");
      out.write("        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n");
      out.write("        <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\"/>\n");
      out.write("        <link href=\"css/login.css\" rel=\"stylesheet\" type=\"text/css\"/>\n");
      out.write("        <link href=\"imagenes/logo.png\" rel=\"shortcut icon\" type=\"images/x-icon\"/>\n");
      out.write("        <title>Iniciar Sesion</title>\n");
      out.write("    </head>\n");
      out.write("    <body>\n");
      out.write("       <div class=\"container\">\n");
      out.write("            <div class=\"login-logo off-canvas\">\n");
      out.write("                <center><img src=\"imagenes/logo_paisa.png\"  style=\"width: 200px;border-radius:150px;\"></center>\n");
      out.write("            </div>\n");
      out.write("            <div class=\"form-container off-canvas\">\n");
      out.write("\n");
      out.write("                <form  class=\"form-signin\" action=\"ServletLogin\" method=\"post\">\n");
      out.write("                    <h2>Iniciar Sesión</h2>\n");
      out.write("                    \n");
      out.write("                    <div class=\"form-group\">\n");
      out.write("                        <label for=\"EmailAddress\"><span>*</span> Usuario</label>\n");
      out.write("                        <input type=\"text\" class=\"form-control\" name=\"usuario\" id=\"EmailAddress\" aria-required=\"true\"  required>\n");
      out.write("                    </div>\n");
      out.write("\n");
      out.write("                    <div class=\"form-group\">\n");
      out.write("                        <label for=\"contraseña\"><span>*</span> Contraseña</label>\n");
      out.write("                        <input type=\"password\" class=\"form-control\" name=\"contrasena\" id=\"contraseña\" aria-required=\"true\"  required>\n");
      out.write("                    </div>\n");
      out.write("                    \n");
      out.write("                    \n");
      out.write("                    \n");
      out.write("\n");
      out.write("                    <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\" name=\"btingreso\">Ingresar</button>\n");
      out.write("\n");
      out.write("                </form>\n");
      out.write("              ");
 
             HttpSession sesion=request.getSession();
         Conexion co= new Conexion();
         if(request.getParameter("cerrar")!=null){
            sesion.invalidate();
        }
         
      out.write("\n");
      out.write("                \n");
      out.write("            </div> <!-- /container -->\n");
      out.write("\n");
      out.write("        </div>\n");
      out.write("         <script src=\"js/jquery.js\" type=\"text/javascript\"></script>\n");
      out.write("         <script src=\"js/bootstrap.min.js\" type=\"text/javascript\"></script>\n");
      out.write("    </body>\n");
      out.write("</html>\n");
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
