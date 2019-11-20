package ec.com.agripublic.dao;

import java.util.Date;
import java.util.List;

import javax.persistence.EntityManager;

import org.zkoss.zk.ui.Executions;

import ec.com.agripublic.dto.InProducto;
import ec.com.agripublic.dto.PrFormula;
import ec.com.agripublic.dto.SeUsuario;
import ec.com.agripublic.em.EntityManagerUtil;

public class ProduccionDAO extends EntityManagerUtil{
	
	private static EntityManager em;
	private SeUsuario objUsuarioSession=null;
	
	{
		objUsuarioSession=(SeUsuario) Executions.getCurrent().getSession().getAttribute("usuarioSes");
	}
	
	
	
	public List<PrFormula> listarFormulas() throws Exception
	{
		List<PrFormula> lsFormulas=null;
		
		try {
			em=obtenerEntity();
			
			lsFormulas=em.createQuery("select p from PrFormula p").getResultList();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsFormulas;
	}
	
	public String guardarFormula(PrFormula objFormula)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			int valor=(int) em.createQuery("select max(p.idFormula) from PrFormula p").getSingleResult();
			objFormula.setIdFormula(valor+1);
			objFormula.setFechaCreacion(new Date());
			objFormula.setUsuarioCreacion(objUsuarioSession.getIdUsuario());
			em.persist(objFormula);
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
	
	public String actualizarFormula(PrFormula objFormula)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			objFormula.setFechaActualizacion(new Date());
			objFormula.setUsuarioActualizacion(objUsuarioSession.getIdUsuario());
			em.merge(objFormula);
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

}
