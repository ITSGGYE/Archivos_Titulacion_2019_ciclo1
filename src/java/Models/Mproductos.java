/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import Clases.Producto;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

/**
 *
 * @author Ivan Mata
 */
public class Mproductos extends Conexion{
    
    public static ArrayList<Producto> getAllProductos(){
        ArrayList<Producto> productos = new ArrayList<>();
        PreparedStatement pst = null;
        ResultSet rs = null;
        try {
            String sql = "select * from productos WHERE estado='A'";
            pst = conectar().prepareStatement(sql);
            rs = pst.executeQuery();
            while(rs.next()){
                productos.add(new Producto(rs.getInt("id_producto"), rs.getString("nombre"), rs.getString("img_producto"), rs.getInt("id_categoria"), rs.getDouble("precio"),rs.getInt("stock"),rs.getString("estado")));
            }
        } catch (Exception e) {
            
        } finally{
            try {
                if(rs != null) rs.close();
                if(pst != null) pst.close();
                if(conectar() != null) conectar().close();
            } catch (Exception e) {
            }
        }       
        return productos;        
    }
    public Producto getProducto(int id){
        Producto producto = null;
        PreparedStatement pst = null;
        ResultSet rs = null;
        try {
            String sql = " select * from productos where id_producto='"+id+"' ";
            pst = conectar().prepareStatement(sql);
            //pst.setInt(1, id);
            rs = pst.executeQuery();
            while(rs.next()){
                producto = new Producto(rs.getInt("id_producto"), rs.getString("nombre"), rs.getString("img_producto"), rs.getInt("id_categoria"), rs.getDouble("precio"),rs.getInt("stock"),rs.getString("estado"));
            }
        } catch (Exception e) {
            
        } finally{
            try {
                if(rs != null) rs.close();
                if(pst != null) pst.close();
                if(conectar() != null) conectar().close();
            } catch (Exception e) {
            }
        }       
        return producto;
        
    } 
   
    public static void main(String[] args) {
        Mproductos mo = new Mproductos();
        System.out.println(mo.getProducto(1));
        
    }
    
    
}
