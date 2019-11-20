package ec.com.agripublic.dao;

import javax.persistence.EntityManager;

import org.zkoss.zk.ui.Executions;

import ec.com.agripublic.dto.DetalleFactura;
import ec.com.agripublic.dto.Factura;
import ec.com.agripublic.dto.InKardex;
import ec.com.agripublic.dto.InTipoMovimiento;
import ec.com.agripublic.dto.SeUsuario;
import ec.com.agripublic.em.EntityManagerUtil;

public class VentasDAO extends EntityManagerUtil{
	
	
	private static EntityManager em;
	
	
	public String guardarFactura(Factura factura,InKardex kardex) throws Exception
	{
		
		String error=null;
		try {
			
			em=obtenerEntity();
			
			em.getTransaction().begin();
			int valor=(int) em.createQuery("select max(p.idFactura) from Factura p").getSingleResult();
			
			for (DetalleFactura det:factura.getDetalleFacturas())
			{
				int valorDet=(int) em.createQuery("select max(p.idDetalleFactura) from DetalleFactura p").getSingleResult();
				det.setIdDetalleFactura(valorDet);
			}
			int valorKardex=(int) em.createQuery("select max(p.idKardex) from InKardex p").getSingleResult();
			factura.setIdFactura(valor+1);
			em.persist(factura);
			kardex.setIdKardex(valorKardex+1);
			kardex.setInTipoMovimiento(em.find(InTipoMovimiento.class, 2));
			em.persist(kardex);
			
			em.getTransaction().commit();
			
			
		} catch (Exception e) {
			// TODO: handle exception
			error=e.getMessage();
			em.getTransaction().rollback();
			// TODO: handle exception
			throw e;
		}
		
		return error;
	}
	 

}
