/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import java.sql.Statement;

/**
 *
 * @author Ivan Mata
 */
public class ModelsEditarProducto extends Conexion{
    
    public static boolean EditarProducto(int idProducto,String estado){
        boolean respuesta=false;
        Statement stm=null;
      
      try {
          String sql="UPDATE productos SET estado='"+estado+"' WHERE id_producto='"+idProducto+"'";
          stm=conectar().prepareStatement(sql);
          stm.executeUpdate(sql);
          respuesta=true;
      } catch (Exception e) {
          respuesta=false;
      }finally{
           try {
               stm.close();
               conectar().close();
           } catch (Exception e) {
           }
       }
      return respuesta;
  }
    
    public static void main(String[] args) {
        ModelsEditarProducto mo = new ModelsEditarProducto();
        System.out.println(mo.EditarProducto(1, "A"));
    }
    
}
