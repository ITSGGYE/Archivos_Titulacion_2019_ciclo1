package ec.com.agripublic.dao;

import java.util.Date;
import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.Query;

import org.zkoss.zk.ui.Executions;

import ec.com.agripublic.dto.SePersona;
import ec.com.agripublic.dto.SeUsuario;
import ec.com.agripublic.em.EntityManagerUtil;

public class SeguridadDAO extends EntityManagerUtil {
	
	
	private static EntityManager em;
	private SeUsuario objUsuarioSession=null;
	
	{
		objUsuarioSession=(SeUsuario) Executions.getCurrent().getSession().getAttribute("usuarioSes");
	}
	
	public List<SePersona> listarPersonas()
	{
		
		List<SePersona> lsPersonas=null;
		
		try {
			
			em=obtenerEntity();
			
			lsPersonas=em.createQuery("select p from SePersona p").getResultList();
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsPersonas;
	}
	
	
	public String guardarPersonas(SePersona objPersona)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			int valor=(int) em.createQuery("select max(p.idPersona) from SePersona p").getSingleResult();
			objPersona.setIdPersona(valor+1);
			objPersona.setFechaCracion(new Date());
			objPersona.setUsuarioCreacion(objUsuarioSession.getIdUsuario());
			em.persist(objPersona);
			em.getTransaction().commit();
			error=null;
		} catch (Exception e) {
			error=e.getMessage();
			em.getTransaction().rollback();
			// TODO: handle exception
			e.printStackTrace();
		}
		return error;
	}
	
	public String actualizarPersonas(SePersona objPersona)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			objPersona.setFechaActualizacion(new Date());
			objPersona.setUsuarioActualizacion(objUsuarioSession.getIdUsuario());
			em.merge(objPersona);
			em.getTransaction().commit();
			error=null;
		} catch (Exception e) {
			error=e.getMessage();
			em.getTransaction().rollback();
			// TODO: handle exception
			e.printStackTrace();
		}
		return error;
	}
	
	
	public List<SeUsuario> listarUsuarios()
	{
		
		List<SeUsuario> lsUsuarios=null;
		
		try {
			
			em=obtenerEntity();
			
			lsUsuarios=em.createQuery("select p from SeUsuario p").getResultList();
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsUsuarios;
	}
	
	
	public String guardarUsuario(SeUsuario objUsuario)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			
			objUsuario.setFechaCreacion(new Date());
			objUsuario.setUsuarioCreacion(objUsuarioSession.getIdUsuario());
			em.persist(objUsuario);
			em.getTransaction().commit();
			error=null;
		} catch (Exception e) {
			error=e.getMessage();
			em.getTransaction().rollback();
			// TODO: handle exception
			e.printStackTrace();
		}
		return error;
	}
	
	public String actualizarUsuario(SeUsuario objUsuario)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			objUsuario.setFechaActualizacion(new Date());
			objUsuario.setUsuarioActualizacion(objUsuarioSession.getIdUsuario());
			em.merge(objUsuario);
			em.getTransaction().commit();
			error=null;
		} catch (Exception e) {
			error=e.getMessage();
			em.getTransaction().rollback();
			// TODO: handle exception
			e.printStackTrace();
		}
		return error;
	}
	
	
	public SeUsuario autenticarUsuario(String idUsuario)
	{
		SeUsuario objSeUsuario=null;
		try {
			em=obtenerEntity();
			
			objSeUsuario=(SeUsuario) em.createQuery("select p from SeUsuario p where p.idUsuario='"+idUsuario+"'").getSingleResult();
			
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return objSeUsuario;
	}
	
	public SePersona buscarPersona(String identificacion)
	{
		SePersona objPersona=null;
		try {
			em=obtenerEntity();
			Query q =em.createQuery("select p from SePersona p where p.cedula=:q_iden");
			q.setParameter("q_iden", identificacion);
			objPersona=(SePersona) q.getSingleResult();
			
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return objPersona;
	}

}
