/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import Clases.InventarioPedidos;
import java.sql.*;
import java.util.ArrayList;

/**
 *
 * @author Ivan Mata
 */
public class ModelsConsultarCompraProductos extends Conexion{
    
    
    public static ArrayList<InventarioPedidos>ListadoInventarioPedidos(){
        ArrayList<InventarioPedidos> objPeticion = new ArrayList<>();
        PreparedStatement pst = null;
        ResultSet rs = null;
        
        try {
            String sql = " select * from inventarioproductos";
            pst = conectar().prepareStatement(sql);
            rs = pst.executeQuery();
            while(rs.next()){
                objPeticion.add(new InventarioPedidos(rs.getInt("idseq"), rs.getInt("idProducto"), rs.getString("nombreProducto"), rs.getInt("cantidadProducto"),
                        rs.getDouble("precioProducto"), rs.getDouble("valorTotal"), rs.getString("fechaPedido"), rs.getString("usuario")));
                
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
        
        return objPeticion;
    }
    
}
