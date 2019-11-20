package org.apache.jsp.Administrador;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;

public final class MenuPrincipal_jsp extends org.apache.jasper.runtime.HttpJspBase
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

      out.write("<!DOCTYPE html>\n");
      out.write("<html>\n");
      out.write("<head>\n");
      out.write("  <meta charset=\"utf-8\">\n");
      out.write("  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n");
      out.write("  <title>Menu Principal</title>\n");
      out.write("  <!-- Tell the browser to be responsive to screen width -->\n");
      out.write("  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n");
      out.write("  <!-- Font Awesome -->\n");
      out.write("  <link rel=\"stylesheet\" href=\"../VENDOR/plugins/fontawesome-free/css/all.min.css\">\n");
      out.write("  <!-- Ionicons -->\n");
      out.write("  <link rel=\"stylesheet\" href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\">\n");
      out.write("  <!-- Tempusdominus Bbootstrap 4 -->\n");
      out.write("  <link rel=\"stylesheet\" href=\"../VENDOR/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css\">\n");
      out.write("  <!-- iCheck -->\n");
      out.write("  <link rel=\"stylesheet\" href=\"../VENDOR/plugins/icheck-bootstrap/icheck-bootstrap.min.css\">\n");
      out.write("  <!-- JQVMap -->\n");
      out.write("  <link rel=\"stylesheet\" href=\"../VENDOR/plugins/jqvmap/jqvmap.min.css\">\n");
      out.write("  <!-- Theme style -->\n");
      out.write("  <link rel=\"stylesheet\" href=\"../VENDOR/dist/css/adminlte.min.css\">\n");
      out.write("  <!-- overlayScrollbars -->\n");
      out.write("  <link rel=\"stylesheet\" href=\"../VENDOR/plugins/overlayScrollbars/css/OverlayScrollbars.min.css\">\n");
      out.write("  <!-- Daterange picker -->\n");
      out.write("  <link rel=\"stylesheet\" href=\"../VENDOR/plugins/daterangepicker/daterangepicker.css\">\n");
      out.write("  <!-- summernote -->\n");
      out.write("  <link rel=\"stylesheet\" href=\"../VENDOR/plugins/summernote/summernote-bs4.css\">\n");
      out.write("  <!-- Google Font: Source Sans Pro -->\n");
      out.write("  <link href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700\" rel=\"stylesheet\">\n");
      out.write("</head>\n");
      out.write("<body class=\"hold-transition sidebar-mini layout-fixed\">\n");
      out.write("<div class=\"wrapper\">\n");
      out.write("\n");
      out.write("  <!-- Navbar -->\n");
      out.write("  <nav class=\"main-header navbar navbar-expand navbar-white navbar-light\">\n");
      out.write("    \n");
      out.write("\n");
      out.write("    <ul class=\"navbar-nav\">\n");
      out.write("      <li class=\"nav-item\">\n");
      out.write("        <a class=\"nav-link\" data-widget=\"pushmenu\" href=\"#\"><i class=\"fas fa-bars\"></i></a>\n");
      out.write("      </li>\n");
      out.write("     \n");
      out.write("    </ul>\n");
      out.write("\n");
      out.write("  </nav>\n");
      out.write("  <!-- /.navbar -->\n");
      out.write("\n");
      out.write("  <!-- Main Sidebar Container -->\n");
      out.write("  <aside class=\"main-sidebar sidebar-dark-primary elevation-4\">\n");
      out.write("    <!-- Brand Logo -->\n");
      out.write("    <a href=\"index3.html\" class=\"brand-link\">\n");
      out.write("      <img src=\"../VENDOR/dist/img/AdminLTELogo.png\" alt=\"AdminLTE Logo\" class=\"brand-image img-circle elevation-3\"\n");
      out.write("           style=\"opacity: .8\">\n");
      out.write("      <span class=\"brand-text font-weight-light\">Administrador</span>\n");
      out.write("    </a>\n");
      out.write("\n");
      out.write("    <!-- Sidebar -->\n");
      out.write("    <div class=\"sidebar\">\n");
      out.write("      <!-- Sidebar user panel (optional) -->\n");
      out.write("      <div class=\"user-panel mt-3 pb-3 mb-3 d-flex\">\n");
      out.write("        <div class=\"image\">\n");
      out.write("          <img src=\"../VENDOR/dist/img/user2-160x160.jpg\" class=\"img-circle elevation-2\" alt=\"User Image\">\n");
      out.write("        </div>\n");
      out.write("        <div class=\"info\">\n");
      out.write("          <a href=\"#\" class=\"d-block\">Alexander Pierce</a>\n");
      out.write("        </div>\n");
      out.write("      </div>\n");
      out.write("\n");
      out.write("      <!-- Sidebar Menu -->\n");
      out.write("      <nav class=\"mt-2\">\n");
      out.write("        <ul class=\"nav nav-pills nav-sidebar flex-column\" data-widget=\"treeview\" role=\"menu\" data-accordion=\"false\">\n");
      out.write("          \n");
      out.write("          <li class=\"nav-item\">\n");
      out.write("            <a href=\"pages/calendar.html\" class=\"nav-link active\">\n");
      out.write("              <i class=\"nav-icon fas fa-tachometer-alt\"></i>\n");
      out.write("              <p>\n");
      out.write("                Menu Principal\n");
      out.write("              </p>\n");
      out.write("            </a>\n");
      out.write("          </li>\n");
      out.write("          <li class=\"nav-item\">\n");
      out.write("            <a href=\"ListadoPeticiones.jsp\" class=\"nav-link\">\n");
      out.write("              <i class=\"nav-icon fas fa-table\"></i>\n");
      out.write("              <p>\n");
      out.write("                Listado Peticiones\n");
      out.write("              </p>\n");
      out.write("            </a>\n");
      out.write("          </li>\n");
      out.write("          \n");
      out.write("        \n");
      out.write("        </ul>\n");
      out.write("      </nav>\n");
      out.write("      <!-- /.sidebar-menu -->\n");
      out.write("    </div>\n");
      out.write("    <!-- /.sidebar -->\n");
      out.write("  </aside>\n");
      out.write("\n");
      out.write("  <!-- Content Wrapper. Contains page content -->\n");
      out.write("  <div class=\"content-wrapper\">\n");
      out.write("   \n");
      out.write("\n");
      out.write("    <!-- Main content -->\n");
      out.write("    <section class=\"content\">\n");
      out.write("      <div class=\"container-fluid\">\n");
      out.write("       \n");
      out.write("        <!-- Main row -->\n");
      out.write("        <div class=\"row\">\n");
      out.write("          <!-- right col (We are only adding the ID to make the widgets sortable)-->\n");
      out.write("          <section class=\"col-lg-12\" style='margin-top:150px;'>\n");
      out.write("              <h1 style='text-align:center;font-size: 4em;'>BIENVENIDOS AL SISTEMA WEB A LO PAISA.</h1>\n");
      out.write("          </section>\n");
      out.write("\n");
      out.write("          <!-- right col -->\n");
      out.write("        </div>\n");
      out.write("        <!-- /.row (main row) -->\n");
      out.write("      </div><!-- /.container-fluid -->\n");
      out.write("    </section>\n");
      out.write("    <!-- /.content -->\n");
      out.write("  </div>\n");
      out.write("  <!-- /.content-wrapper -->\n");
      out.write("  <footer class=\"main-footer\">\n");
      out.write("    <strong>Copyright &copy; 2019 <a href=\"http://adminlte.io\"></a> Restaurant a lo Paisa.</strong>\n");
      out.write("   \n");
      out.write("  </footer>\n");
      out.write("\n");
      out.write("  <!-- Control Sidebar -->\n");
      out.write("  <aside class=\"control-sidebar control-sidebar-dark\">\n");
      out.write("    <!-- Control sidebar content goes here -->\n");
      out.write("  </aside>\n");
      out.write("  <!-- /.control-sidebar -->\n");
      out.write("</div>\n");
      out.write("<!-- ./wrapper -->\n");
      out.write("\n");
      out.write("<!-- jQuery -->\n");
      out.write("<script src=\"../VENDOR/plugins/jquery/jquery.min.js\"></script>\n");
      out.write("<!-- jQuery UI 1.11.4 -->\n");
      out.write("<script src=\"../VENDOR/plugins/jquery-ui/jquery-ui.min.js\"></script>\n");
      out.write("<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->\n");
      out.write("<script>\n");
      out.write("  $.widget.bridge('uibutton', $.ui.button)\n");
      out.write("</script>\n");
      out.write("<!-- Bootstrap 4 -->\n");
      out.write("<script src=\"../VENDOR/plugins/bootstrap/js/bootstrap.bundle.min.js\"></script>\n");
      out.write("<!-- ChartJS -->\n");
      out.write("<script src=\"../VENDOR/plugins/chart.js/Chart.min.js\"></script>\n");
      out.write("<!-- Sparkline -->\n");
      out.write("<script src=\"../VENDOR/plugins/sparklines/sparkline.js\"></script>\n");
      out.write("<!-- JQVMap -->\n");
      out.write("<script src=\"../VENDOR/plugins/jqvmap/jquery.vmap.min.js\"></script>\n");
      out.write("<script src=\"../plugins/jqvmap/maps/jquery.vmap.usa.js\"></script>\n");
      out.write("<!-- jQuery Knob Chart -->\n");
      out.write("<script src=\"../VENDOR/plugins/jquery-knob/jquery.knob.min.js\"></script>\n");
      out.write("<!-- daterangepicker -->\n");
      out.write("<script src=\"../VENDOR/plugins/moment/moment.min.js\"></script>\n");
      out.write("<script src=\"../VENDOR/plugins/daterangepicker/daterangepicker.js\"></script>\n");
      out.write("<!-- Tempusdominus Bootstrap 4 -->\n");
      out.write("<script src=\"../VENDOR/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js\"></script>\n");
      out.write("<!-- Summernote -->\n");
      out.write("<script src=\"../VENDOR/plugins/summernote/summernote-bs4.min.js\"></script>\n");
      out.write("<!-- overlayScrollbars -->\n");
      out.write("<script src=\"../VENDOR/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js\"></script>\n");
      out.write("<!-- AdminLTE App -->\n");
      out.write("<script src=\"../VENDOR/dist/js/adminlte.js\"></script>\n");
      out.write("<!-- AdminLTE dashboard demo (This is only for demo purposes) -->\n");
      out.write("<script src=\"../VENDOR/dist/js/pages/dashboard.js\"></script>\n");
      out.write("<!-- AdminLTE for demo purposes -->\n");
      out.write("<script src=\"../VENDOR/dist/js/demo.js\"></script>\n");
      out.write("</body>\n");
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
