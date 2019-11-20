package ec.com.agripublic.dao;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.Query;

import org.zkoss.zk.ui.Executions;

import ec.com.agripublic.dto.InKardex;
import ec.com.agripublic.dto.InMedida;
import ec.com.agripublic.dto.InProducto;
import ec.com.agripublic.dto.InTarifario;
import ec.com.agripublic.dto.InTipoMovimiento;
import ec.com.agripublic.dto.InTipoProducto;
import ec.com.agripublic.dto.PrFormula;
import ec.com.agripublic.dto.SePersona;
import ec.com.agripublic.dto.SeUsuario;
import ec.com.agripublic.dto.ext.InProductoDtoExt;
import ec.com.agripublic.em.EntityManagerUtil;

public class InventarioDAO extends EntityManagerUtil{
	
	private static EntityManager em;
	private SeUsuario objUsuarioSession=null;
	
	{
		objUsuarioSession=(SeUsuario) Executions.getCurrent().getSession().getAttribute("usuarioSes");
	}
	
	
	public List<InProducto> listarProductos() throws Exception
	{
		List<InProducto> lsProductos=null;
		
		try {
			em=obtenerEntity();
			
			lsProductos=em.createQuery("select p from InProducto p").getResultList();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsProductos;
	}
	
	public List<InProducto> listarProductosTerminados() throws Exception
	{
		List<InProducto> lsProductos=null;
		
		try {
			em=obtenerEntity();
			
			lsProductos=em.createQuery("select p from InProducto p where p.inTipoProducto.idTipoProducto=2").getResultList();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsProductos;
	}
	
	public List<InProducto> listarProductosMateriaPrima() throws Exception
	{
		List<InProducto> lsProductos=null;
		
		try {
			em=obtenerEntity();
			
			lsProductos=em.createQuery("select p from InProducto p where p.inTipoProducto.idTipoProducto=2").getResultList();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsProductos;
	}
	
	public String guardarProducto(InProducto objProducto)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			int valor=(int) em.createQuery("select max(p.idProducto) from InProducto p").getSingleResult();
			objProducto.setIdProducto(valor+1);
			objProducto.setFechaCreacion(new Date());
			objProducto.setUsuarioCreacion(objUsuarioSession.getIdUsuario());
			em.persist(objProducto);
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
	
	public String actualizarProducto(InProducto objProducto)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			objProducto.setFechaActualizacion(new Date());
			objProducto.setUsuarioActualizacion(objUsuarioSession.getIdUsuario());
			em.merge(objProducto);
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
	
	
	public List<InTipoProducto> listarTipoProducto() throws Exception
	{
		List<InTipoProducto> lsTipoProductos=null;
		
		try {
			em=obtenerEntity();
			
			lsTipoProductos=em.createQuery("select p from InTipoProducto p").getResultList();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsTipoProductos;
	}
	public List<InMedida> listarMedidas() throws Exception
	{
		List<InMedida> lsMedidas=null;
		
		try {
			em=obtenerEntity();
			
			lsMedidas=em.createQuery("select p from InMedida p").getResultList();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsMedidas;
	}
	
	public List<InTipoMovimiento> listarTipoMovimiento() throws Exception
	{
		List<InTipoMovimiento> lsTiposMovimientos=null;
		
		try {
			em=obtenerEntity();
			
			lsTiposMovimientos=em.createQuery("select p from InTipoMovimiento p").getResultList();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsTiposMovimientos;
	}

	public String guardarKardex(InKardex objKardex)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			int valor=(int) em.createQuery("select max(p.idKardex) from InKardex p").getSingleResult();
			objKardex.setIdKardex(valor+1);
			objKardex.setFechaCreacion(new Date());
			objKardex.setUsuarioCreacion(objUsuarioSession.getIdUsuario());
			em.persist(objKardex);
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
	
	public String actualizarKardex(InKardex objKardex)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			objKardex.setFechaActuaalizacion(new Date());
			objKardex.setUsuarioActualizacion(objUsuarioSession.getIdUsuario());
			em.merge(objKardex);
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
	
	public List<InKardex> listarKardex(Integer codigoProducto) throws Exception
	{
		List<InKardex> lsKardex=null;
		
		try {
			em=obtenerEntity();
			
			lsKardex=em.createQuery("select k from InKardex k where k.inProducto.idProducto="+codigoProducto+" order by k.idKardex asc").getResultList();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsKardex;
	}
	
	public InKardex listarKardexUltimo(Integer codigoProducto) throws Exception
	{
		InKardex lsKardex=null;
		
		try {
			em=obtenerEntity();
			System.out.println("select k from InKardex k where k.inProducto.idProducto="+codigoProducto +" and k.idKardex in(select max(k1.idKardex) from InKardex k1 where k1.inProducto.idProducto="+codigoProducto+")");
			
			Query q=em.createQuery("select k from InKardex k where k.inProducto.idProducto="+codigoProducto +" and k.idKardex in(select max(k1.idKardex) from InKardex k1 where k1.inProducto.idProducto="+codigoProducto+")");
				lsKardex=(InKardex) q.getSingleResult();
			
			em.close();
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsKardex;
	}
	
	
	public List<InTarifario> listarTarifario(Integer codigoProducto) throws Exception
	{
		List<InTarifario> lsTarifario=null;
		
		try {
			em=obtenerEntity();
			
			lsTarifario=em.createQuery("select k from InTarifario k where k.inProducto.idProducto="+codigoProducto).getResultList();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsTarifario;
	}
	
	
	public String guardarTarifario(InTarifario objTarifario)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			int valor=(int) em.createQuery("select max(p.idTarifario) from InTarifario p").getSingleResult();
			objTarifario.setIdTarifario(valor+1);
			objTarifario.setFechaCreacion(new Date());
			objTarifario.setUsuarioCreacion(objUsuarioSession.getIdUsuario());
			em.persist(objTarifario);
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
	
	public String actualizarTarifario(InTarifario objTarifario)
	{
		
		String error=null;
		
		try {
			
			em=obtenerEntity();
			em.getTransaction().begin();
			objTarifario.setFechaActualizacion(new Date());
			objTarifario.setUsuarioActualizacion(objUsuarioSession.getIdUsuario());
			em.merge(objTarifario);
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
	
	
	public List<InProductoDtoExt> listarProductosFacturacion() throws Exception
	{
		List<InProductoDtoExt> lsProductos=null;
		
		List<Object[]> lsObject=null;
		
		try {
			em=obtenerEntity();
			Query q= em.createNativeQuery("select p.id_producto,p.nombre,t.valor_venta,k.saldo_actual\r\n" + 
					"from  in_producto p,in_tarifario t ,in_kardex k\r\n" + 
					"where p.id_producto=t.id_producto\r\n" + 
					"and p.estado='A' \r\n" + 
					"and t.estado='A'\r\n" + 
					"and p.id_producto=k.id_producto\r\n" + 
					"and p.id_tipo_producto=2 "
					+ "and k.id_kardex in (select max(id_kardex) from in_kardex where id_producto=k.id_producto)"
					+ "and t.id_tarifario in (select max(id_tarifario) from in_tarifario where id_producto=k.id_producto)");
			lsObject=q.getResultList();
			lsProductos= new ArrayList<InProductoDtoExt>();
			for (Object[] obj:lsObject)
			{
				
				System.out.println(obj[0]);
				System.out.println(obj[1]);
				System.out.println(obj[2]);
				System.out.println(obj[3]);
				
				InProductoDtoExt producto= new InProductoDtoExt();
				producto.setIdProducto(Integer.parseInt(obj[0].toString()));
				producto.setNombre(obj[1].toString());
				producto.setPrecio(Double.parseDouble(obj[2].toString()));
				producto.setStock(Double.parseDouble(obj[3].toString()));
				lsProductos.add(producto);
				
			}
			
			
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return lsProductos;
	}
	
	
	
}
