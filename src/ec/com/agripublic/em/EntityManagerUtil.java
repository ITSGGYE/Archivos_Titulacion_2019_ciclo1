package ec.com.agripublic.em;

import java.sql.Connection;
import java.sql.DriverManager;
import java.util.Locale;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import javax.persistence.criteria.CriteriaQuery;

public class EntityManagerUtil {
	
	private static EntityManager em;
	private static EntityManagerFactory emf;
	
	
	public static EntityManager obtenerEntity() throws Exception
	{
		
		emf=Persistence.createEntityManagerFactory("agripublic");
		em=emf.createEntityManager();
		return em;
	}

	
	
private  Connection conn;
	
	public  Connection getConexion()
	{
		try {
            // We register the MySQL (MariaDB) driver
            // Registramos el driver de MySQL (MariaDB)
            try {
                Class.forName("com.mysql.jdbc.Driver");
            } catch (ClassNotFoundException ex) {
                System.out.println("Error al registrar el driver de MySQL: " + ex);
            }
            
            // Database connect
            // Conectamos con la base de datos
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/agripublic_db","root", "root");
           
          
        } catch (java.sql.SQLException sqle) {
            System.out.println("Error: " + sqle);
        }
		return conn;
	}
	
	
	
	
public static void main(String[] args) {
		
		try {
			emf=Persistence.createEntityManagerFactory("agripublic");
			em=emf.createEntityManager();
			
			
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		
	}
	
}
