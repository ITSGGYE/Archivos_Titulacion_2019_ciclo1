/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

/**
 *
 * @author Ivan Mata
 */
public class Conexion {
    
    public static Connection conectar(){
        Connection cn=null;
        try {
              Class.forName("com.mysql.jdbc.Driver");
               cn = DriverManager.getConnection("jdbc:mysql://localhost:3306/WebRestaurant","root","");
               System.out.println("Conexion Satisfactoria");
        } catch (Exception e) {
            System.out.println("Error de conexión" + e);
            
        }
        return cn;
    }
    
    
    public int loguear(String us,String pass){
        
        PreparedStatement pst;
        ResultSet rs;
        int nivel=0;
         try {
              String sql="Select nivel from login where usuario='"+us+"' and contrasena='"+pass+"'"; 
               pst=conectar().prepareStatement(sql);
            rs=pst.executeQuery();
            while(rs.next()){
                nivel=rs.getInt(1);
            }
            conectar().close();
         } catch (Exception e) {
         }
       
        
        return nivel;
     }
    
    
    
    public static void main(String[] args) {
        Conexion co = new Conexion();
        System.out.println(co.loguear("igma23", "123456"));
        
    }
}
