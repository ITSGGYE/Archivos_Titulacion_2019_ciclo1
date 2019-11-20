/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlet;

import Clases.Articulo;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author Ivan Mata
 */
public class ServletAgregarCarrito extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();

        int idproducto = Integer.valueOf(request.getParameter("idproducto"));
        int cantidad = Integer.valueOf(request.getParameter("cantidad"));
        String nombreproducto = request.getParameter("nombreproducto");
        double precioproducto = Double.parseDouble(request.getParameter("precioproducto"));
        
        //creamos un array list, para comprobar si este array list existe en la variable sesion, si ya existe significa que vamos a seguir 
        //añadiendo mas productos al carrito y si no existe se crea uno por primera vez y dices si el carrito es igual a null creas un nuevo array list 
        // con new Arraylist y si existe lo recuperamos nada mas
        HttpSession sesion = request.getSession(true);
        ArrayList<Articulo> articulos = sesion.getAttribute("carrito") == null ? new ArrayList<>() : (ArrayList) sesion.getAttribute("carrito");

        boolean flag = false;

        if (articulos.size() > 0) {
            for (Articulo a : articulos) {
                if (idproducto == a.getIdproducto()) {
                    a.setCantidad(a.getCantidad() + cantidad);
                    flag = true;
                    break;
                }
            }
        }
        if (!flag) {
            articulos.add(new Articulo(idproducto, cantidad,nombreproducto,precioproducto));
        }
        sesion.setAttribute("carrito", articulos);
        response.sendRedirect("cart.jsp");

    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
