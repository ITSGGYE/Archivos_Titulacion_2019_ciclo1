/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import java.sql.*;

/**
 *
 * @author Ivan Mata
 */
public class ModelsGuardarCompraProductos extends Conexion{
    
    public boolean GuardarProductos(int idproducto, String nombreproducto,int cantidad,double precioproducto,double valorTotal,String fechaPedido,String usuario){
        
        PreparedStatement pst = null;
        
        try {
            
            String sql= "Insert into inventarioProductos (idproducto,nombreProducto,cantidadProducto,precioProducto,valorTotal,fechaPedido,usuario) values(?,?,?,?,?,?,?) ";
            pst = conectar().prepareStatement(sql);
            
            pst.setInt(1, idproducto);
            pst.setString(2, nombreproducto);
            pst.setInt(3, cantidad);
            pst.setDouble(4, precioproducto);
            pst.setDouble(5, valorTotal);
            pst.setString(6, fechaPedido);
            pst.setString(7, usuario);
            
            if(pst.executeUpdate()== 1){
                
                return true;
            }
            
        } catch (Exception e) {
            System.err.println("Error al guardar Pedido de compra"+ e);
        }finally{
            try {
                if(conectar()!=null)conectar().close();
                if(pst!=null)pst.close();
            } catch (Exception e) {
                System.err.println("Error"+ e);
            }
        }
        
        return false;
    }
    
    
}
