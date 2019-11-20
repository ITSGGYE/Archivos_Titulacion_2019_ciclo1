/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import Clases.Producto;
import java.sql.*;
import java.util.ArrayList;

/**
 *
 * @author Ivan Mata
 */
public class ModelsListadoProductos extends Conexion{
    
    
    public static ArrayList<Producto>ListadoProductos(){
        ArrayList<Producto> objlistProductos = new ArrayList<>();
        PreparedStatement pst = null;
        ResultSet rs = null;
        
        try {
            String sql = " select * from productos";
            pst = conectar().prepareStatement(sql);
            rs = pst.executeQuery();
            while(rs.next()){
                objlistProductos.add(new Producto(rs.getInt("id_producto"), rs.getString("nombre"), rs.getString("img_producto"), rs.getInt("id_categoria"), rs.getDouble("precio"),rs.getInt("stock"),rs.getString("estado")));
             
            }
            
        } catch (Exception e) {
            System.err.println("Error al consultar listado de peticiones"+ e);
        }finally{
            try {
                if(rs != null) rs.close();
                if(pst != null) pst.close();
                if(conectar() != null) conectar().close();
            } catch (Exception e) {
            }
        }
        
        return objlistProductos;
    }
    
}
