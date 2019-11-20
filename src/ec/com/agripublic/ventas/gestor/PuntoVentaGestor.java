package ec.com.agripublic.ventas.gestor;

import java.math.BigDecimal;
import java.sql.Date;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.BindingParam;
import org.zkoss.bind.annotation.Command;
import org.zkoss.bind.annotation.ContextParam;
import org.zkoss.bind.annotation.ContextType;
import org.zkoss.bind.annotation.GlobalCommand;
import org.zkoss.bind.annotation.NotifyChange;
import org.zkoss.zk.ui.Component;
import org.zkoss.zk.ui.Executions;
import org.zkoss.zk.ui.select.Selectors;
import org.zkoss.zk.ui.select.annotation.Wire;
import org.zkoss.zul.Messagebox;
import org.zkoss.zul.Textbox;
import org.zkoss.zul.Window;

import ec.com.agripublic.dao.InventarioDAO;
import ec.com.agripublic.dao.SeguridadDAO;
import ec.com.agripublic.dao.VentasDAO;
import ec.com.agripublic.dto.DetalleFactura;
import ec.com.agripublic.dto.Factura;
import ec.com.agripublic.dto.InKardex;
import ec.com.agripublic.dto.InProducto;
import ec.com.agripublic.dto.InTipoMovimiento;
import ec.com.agripublic.dto.SePersona;
import ec.com.agripublic.dto.SeUsuario;
import ec.com.agripublic.dto.ext.DetalleFacturaDtoExt;
import ec.com.agripublic.dto.ext.InProductoDtoExt;

public class PuntoVentaGestor {
	
	private SeguridadDAO seSeguridad=null;
	
	private SePersona objPersona=null;
	private String identificacion=null;
	
	private String subtotal="0.00";
	private String iva="0.00";
	private String total="0.00";
	
	
	private Factura objFactura= null;
	private List<DetalleFacturaDtoExt> lsDetalleFactura=null;
	private DetalleFactura objDetalleFactura;
	
	BigDecimal bigSubtotal= new BigDecimal(0.00);
	BigDecimal bigIva= new BigDecimal(0.00);
	BigDecimal bigTotal= new BigDecimal(0.00);
	
	
	private VentasDAO objDao= new VentasDAO();
	private InventarioDAO objInventario= new InventarioDAO();
	
	@Wire
	private Textbox txtIdentificacion;
	
private SeUsuario objUsuarioSession=null;
	

	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			objUsuarioSession=(SeUsuario) Executions.getCurrent().getSession().getAttribute("usuarioSes");
			seSeguridad= new SeguridadDAO();
			
			objFactura= new Factura();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	} 
	@Command
	@NotifyChange({"objPersona"})
	public void buscarPersona()
	{
		try {
			
			
			objPersona=seSeguridad.buscarPersona(identificacion);
			
			if (objPersona==null)
			{
				Messagebox.show("Numero de Identificación no existe","Atención",Messagebox.OK,Messagebox.EXCLAMATION);
			}
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	@GlobalCommand
	@NotifyChange({"lsDetalleFactura","subtotal","iva","total"})
	public void agregarDetalle(@BindingParam("param") InProductoDtoExt producto)
	{
		try {
			
			if (lsDetalleFactura==null)
			{
				lsDetalleFactura= new ArrayList<DetalleFacturaDtoExt>();
			}
			
			DetalleFacturaDtoExt detalle= new DetalleFacturaDtoExt();
			detalle.setItem(obtenerSecuencia(lsDetalleFactura)+1);
			detalle.setCantidad(1);
			detalle.setInProductoDtoExt(producto);
			detalle.setTotal(detalle.getCantidad()*producto.getPrecio());
			lsDetalleFactura.add(detalle);
			
			calcularTotal();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	
	@Command
	@NotifyChange({"lsDetalleFactura","subtotal","iva","total"})
	public void eliminarDetalle(@BindingParam("param") DetalleFacturaDtoExt detalle)
	{
		try {
			
			
			
			
			lsDetalleFactura.remove(detalle);
			calcularTotal();
			
			calcularTotal();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	
	public void calcularTotal()
	{
		
		
		bigSubtotal=BigDecimal.ZERO;
		bigTotal=BigDecimal.ZERO;
		bigIva=BigDecimal.ZERO;
		try {
			
			for (DetalleFacturaDtoExt ll:lsDetalleFactura)
			{
				bigSubtotal=bigSubtotal.add(new BigDecimal(ll.getTotal()).setScale(2,BigDecimal.ROUND_HALF_DOWN));
			}
			bigIva=bigSubtotal.multiply(new BigDecimal(12)).divide(new BigDecimal(100),2,BigDecimal.ROUND_HALF_DOWN);
			bigTotal=bigTotal.add(bigSubtotal).add(bigIva);
			
			subtotal=String.valueOf(bigSubtotal);
			iva=String.valueOf(bigIva);
			total=String.valueOf(bigTotal);
		
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	@Command
	@NotifyChange({"lsDetalleFactura","subtotal","iva","total"})
	public void calcularCambioTotal(@BindingParam("dato") DetalleFacturaDtoExt detalle)
	{
		
		
		bigSubtotal=BigDecimal.ZERO;
		bigTotal=BigDecimal.ZERO;
		bigIva=BigDecimal.ZERO;
		try {
			
			for (DetalleFacturaDtoExt ll:lsDetalleFactura)
			{
				
				ll.setTotal(ll.getCantidad()*ll.getInProductoDtoExt().getPrecio());
				bigSubtotal=bigSubtotal.add(new BigDecimal(ll.getTotal()).setScale(2,BigDecimal.ROUND_HALF_DOWN));
			}
			
				
			
			bigIva=bigSubtotal.multiply(new BigDecimal(12)).divide(new BigDecimal(100),2,BigDecimal.ROUND_HALF_DOWN);
			bigTotal=bigTotal.add(bigSubtotal).add(bigIva);
			
			subtotal=String.valueOf(bigSubtotal);
			iva=String.valueOf(bigIva);
			total=String.valueOf(bigTotal);
		
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	public Integer obtenerSecuencia(List<DetalleFacturaDtoExt> lista)
	{
		Integer secuencia=0;
		Integer mayor = -1;
		
		try {
			
			for (DetalleFacturaDtoExt ll:lista)
			{
				if (ll.getItem()>mayor)
				{
					mayor=ll.getItem();
				}
			}
			if (mayor>0)
			{
				secuencia=mayor;
			}
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return secuencia;
		
	}
	
	@Command
	
	public void buscarProducto()
	{
		try {
			Window win= (Window) Executions.getCurrent().createComponents("/paginas/ventas/buscar_productos.zul",null,null);
			win.doModal();
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	
	@Command
	@NotifyChange({"lsDetalleFactura","subtotal","iva","total","objPersona","identificacion"})
	public void guardar()
	{
		
		List<DetalleFactura> ldDetalleFact= new ArrayList<DetalleFactura>();
		try {
			
			
			if (objPersona==null)
			{
				Messagebox.show("Ingrese una identificación del cliente para continuar.","Atención",Messagebox.OK,Messagebox.EXCLAMATION);
				txtIdentificacion.setFocus(true);
				return;
			}
			if (lsDetalleFactura==null)
			{
				Messagebox.show("Agregue un detalle de factura para continuar.","Atención",Messagebox.OK,Messagebox.EXCLAMATION);
				txtIdentificacion.setFocus(true);
				return;
			}
			
			objFactura= new Factura();
			InKardex kardex= new InKardex();
			
			objFactura.setSePersona(objPersona);
			objFactura.setEstado("A");
			objFactura.setFechaFactura(new Date(new java.util.Date().getTime()));
			objFactura.setIva(bigIva.doubleValue());
			objFactura.setSubtotal(bigSubtotal.doubleValue());
			objFactura.setTotal(bigTotal.doubleValue());
			
			for (DetalleFacturaDtoExt det:lsDetalleFactura)
			{
				DetalleFactura detalle= new DetalleFactura();
				detalle.setFactura(objFactura);
				detalle.setCantidad(det.getCantidad());
				detalle.setEstado("A");
				
				InProducto producto= new InProducto();
				producto.setIdProducto(det.getInProductoDtoExt().getIdProducto());
				detalle.setInProducto(producto);
				
				detalle.setPrecioUnitario(det.getInProductoDtoExt().getPrecio());
				
				
				InKardex objKarkex=objInventario.listarKardexUltimo(producto.getIdProducto());
				
				if (objKarkex==null)
				{
					Messagebox.show("Saldo Actual del producto no permite realizar esta venta, el saldo es: 0.00","Atención",Messagebox.OK,Messagebox.INFORMATION);
					return;
				}
				if (objKarkex.getSaldoActual()<det.getCantidad())
				{
					Messagebox.show("Saldo Actual del producto no permite realizar esta venta, el saldo es: "+objKarkex.getSaldoActual(),"Atención",Messagebox.OK,Messagebox.INFORMATION);
					return;
				}
				
				kardex.setFechaTransaccion(new Date(new java.util.Date().getTime()));
				kardex.setCantidad((int)det.getCantidad());
				kardex.setSaldoAnterior(objKarkex.getSaldoActual());
				kardex.setSaldoActual(objKarkex.getSaldoActual()-(int)det.getCantidad());
				kardex.setCostoActual(objKarkex.getCostoActual());
				kardex.setCostoAnterior(objKarkex.getCostoAnterior());
				kardex.setEstado("A");
				kardex.setInProducto(producto);
				kardex.setFechaCreacion(new Date(new java.util.Date().getTime()));
				kardex.setUsuarioCreacion(objUsuarioSession.getIdUsuario());
				/// obtengo el ultimo registro del kardex
				
				
				ldDetalleFact.add(detalle);
			}
			objFactura.setDetalleFacturas(ldDetalleFact);
			
			
			
			String error =objDao.guardarFactura(objFactura,kardex);
			
			if (error==null)
			{
				Messagebox.show("Factura se genero correctamente.","Atención",Messagebox.OK,Messagebox.INFORMATION);
				objPersona=null;
				lsDetalleFactura.clear();
				identificacion=null;
				txtIdentificacion.setFocus(true);
				subtotal="0.00";
				
				iva="0.00";
				total="0.00";
				Map param= new HashMap();
				param.put("param", objFactura);
				Window win= (Window) Executions.getCurrent().createComponents("/paginas/ventas/reporte.zul", null,param);
				win.doModal();
			}else
			{
				Messagebox.show("Error al guardar la factura: "+error,"Atención",Messagebox.OK,Messagebox.ERROR);
			}
			
			
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	@Command
	@NotifyChange({"lsDetalleFactura","subtotal","iva","total","objPersona","identificacion"})
	public void nuevaFactura()
	{
		
		
		
		objPersona=null;
		if (lsDetalleFactura!=null)
		{
			lsDetalleFactura.clear();
		}
		identificacion=null;
		txtIdentificacion.setFocus(true);
		subtotal="0.00";
		iva="0.00";
		total="0.00";
	}
	
	
	public SePersona getObjPersona() {
		return objPersona;
	}
	public void setObjPersona(SePersona objPersona) {
		this.objPersona = objPersona;
	}
	public String getIdentificacion() {
		return identificacion;
	}
	public void setIdentificacion(String identificacion) {
		this.identificacion = identificacion;
	}
	
	public List<DetalleFacturaDtoExt> getLsDetalleFactura() {
		return lsDetalleFactura;
	}
	public void setLsDetalleFactura(List<DetalleFacturaDtoExt> lsDetalleFactura) {
		this.lsDetalleFactura = lsDetalleFactura;
	}
	public Factura getObjFactura() {
		return objFactura;
	}
	public void setObjFactura(Factura objFactura) {
		this.objFactura = objFactura;
	}
	public DetalleFactura getObjDetalleFactura() {
		return objDetalleFactura;
	}
	public void setObjDetalleFactura(DetalleFactura objDetalleFactura) {
		this.objDetalleFactura = objDetalleFactura;
	}
	public SeguridadDAO getSeSeguridad() {
		return seSeguridad;
	}
	public void setSeSeguridad(SeguridadDAO seSeguridad) {
		this.seSeguridad = seSeguridad;
	}
	public String getSubtotal() {
		return subtotal;
	}
	public void setSubtotal(String subtotal) {
		this.subtotal = subtotal;
	}
	public String getIva() {
		return iva;
	}
	public void setIva(String iva) {
		this.iva = iva;
	}
	public String getTotal() {
		return total;
	}
	public void setTotal(String total) {
		this.total = total;
	}
	

}
