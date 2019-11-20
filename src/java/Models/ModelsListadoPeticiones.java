/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import Clases.Peticiones;
import java.sql.*;
import java.util.ArrayList;

/**
 *
 * @author Ivan Mata
 */
public class ModelsListadoPeticiones extends Conexion{
 
    public static ArrayList<Peticiones>ListadoPeticiones(){
        ArrayList<Peticiones> objlistPeticion = new ArrayList<>();
        PreparedStatement pst = null;
        ResultSet rs = null;
        
        try {
            String sql = " select * from listapeticiones";
            pst = conectar().prepareStatement(sql);
            rs = pst.executeQuery();
            while(rs.next()){
                objlistPeticion.add(new Peticiones(rs.getInt("id_Peticiones"), rs.getString("Mensaje_Peticiones"), rs.getString("usuarioPeticion"), rs.getString("fechaPeticion")));
                
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
        
        return objlistPeticion;
    }
    
    
}
