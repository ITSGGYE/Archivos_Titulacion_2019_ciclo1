/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import static Models.Conexion.conectar;
import java.sql.PreparedStatement;

/**
 *
 * @author Ivan Mata
 */
public class ModelsGuardarUsuario extends Conexion{
    
    
    public static boolean GuardarUsuario(String usuario,String contrasena, int nivel){
     
        PreparedStatement pst = null;
        
        try {
            
            String sql= "Insert into login (usuario,contrasena,nivel) values(?,?,?) ";
            pst = conectar().prepareStatement(sql);
            
            pst.setString(1, usuario);
            pst.setString(2, contrasena);
            pst.setInt(3, nivel);
            
            if(pst.executeUpdate()== 1){
                
                return true;
            }
            
        } catch (Exception e) {
            System.err.println("Error al guardar Usuario"+ e);
            
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
