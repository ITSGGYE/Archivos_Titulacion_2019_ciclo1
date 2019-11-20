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
public class ModelsGuardarPeticiones extends Conexion{
    
    
    public boolean GuardarPeticion(String mensajePeticion,String usuarioPeticion, String fechaPeticion){
     
        PreparedStatement pst = null;
        
        try {
            
            String sql= "Insert into listapeticiones (Mensaje_Peticiones,usuarioPeticion,fechaPeticion) values(?,?,?) ";
            pst = conectar().prepareStatement(sql);
            
            pst.setString(1, mensajePeticion);
            pst.setString(2, usuarioPeticion);
            pst.setString(3, fechaPeticion);
            
            if(pst.executeUpdate()== 1){
                
                return true;
            }
            
        } catch (Exception e) {
            System.err.println("Error al guardar Peticion"+ e);
            
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
