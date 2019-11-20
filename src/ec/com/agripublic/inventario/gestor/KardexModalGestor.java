package ec.com.agripublic.inventario.gestor;

import java.util.Date;
import java.util.List;

import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.Command;
import org.zkoss.bind.annotation.ContextParam;
import org.zkoss.bind.annotation.ContextType;
import org.zkoss.bind.annotation.ExecutionArgParam;
import org.zkoss.zk.ui.Component;
import org.zkoss.zk.ui.select.Selectors;
import org.zkoss.zk.ui.select.annotation.Wire;
import org.zkoss.zul.Messagebox;
import org.zkoss.zul.Window;

import ec.com.agripublic.dao.InventarioDAO;
import ec.com.agripublic.dto.InKardex;
import ec.com.agripublic.dto.InMedida;
import ec.com.agripublic.dto.InProducto;
import ec.com.agripublic.dto.InTipoMovimiento;
import ec.com.agripublic.dto.InTipoProducto;


public class KardexModalGestor {

	
	private InKardex objKardex;
	private InventarioDAO inventarioDao=null;
	private String nuevo="N";
	
	private List<InTipoMovimiento> lsTipoMovimiento;
	
	private InProducto objProducto;
	private InKardex objKardexFinal;
	
	
	@Wire
	private Window winProductoModal;

	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view,@ExecutionArgParam("kardex") InKardex objKardex,@ExecutionArgParam("kardexFinal") InKardex objKardexFinal,@ExecutionArgParam("producto") InProducto objProducto)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			this.objProducto=objProducto;
			this.objKardex=objKardex;
			this.objKardexFinal=objKardexFinal;
			if (this.objKardex==null)
			{
				this.objKardex= new InKardex();
				this.objKardex.setInProducto(objProducto);
				this.objKardex.setFechaTransaccion(new Date());
				if (objKardexFinal!=null)
				{
					this.objKardex.setSaldoAnterior(objKardexFinal.getSaldoActual());
					this.objKardex.setCostoAnterior(objKardexFinal.getCostoActual());
				}
				this.objKardex.setEstado("A");
				nuevo="S";
			}
			inventarioDao= new InventarioDAO();
			lsTipoMovimiento=inventarioDao.listarTipoMovimiento();
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	@Command
	public void guardar()
	{
		String error=null;
		Integer saldoActual=0;
		try {
			
			if (nuevo.equals("S"))
			{
				
				if (objKardexFinal!=null)
				{
					saldoActual=objKardexFinal.getSaldoActual();
				}
					if (objKardex.getInTipoMovimiento().getIdTipo()==1)
					{
						objKardex.setSaldoActual(saldoActual+objKardex.getCantidad());
					}else
					{
						objKardex.setCostoActual(objKardexFinal.getCostoActual());
						objKardex.setSaldoActual(saldoActual-objKardex.getCantidad());
					}
				
				error=inventarioDao.guardarKardex(objKardex);
			}else
			{
				error=inventarioDao.actualizarKardex(objKardex);
			}
			if (error==null)
			{
				
				Messagebox.show("Transacción realizada correctamente.","Ätención",Messagebox.OK,Messagebox.INFORMATION);
				winProductoModal.detach();
			}else
			{
				Messagebox.show("Error: "+error,"Ätención",Messagebox.OK,Messagebox.INFORMATION);
			}
			
		} catch (Exception e) {
			// TODO: handle exception
			
			e.printStackTrace();
		}
	}
	
	@Command
	public void cerrarVentana()
	{
		winProductoModal.detach();
	}

	public InKardex getObjKardex() {
		return objKardex;
	}

	public void setObjKardex(InKardex objKardex) {
		this.objKardex = objKardex;
	}

	public List<InTipoMovimiento> getLsTipoMovimiento() {
		return lsTipoMovimiento;
	}

	public void setLsTipoMovimiento(List<InTipoMovimiento> lsTipoMovimiento) {
		this.lsTipoMovimiento = lsTipoMovimiento;
	}
	
	

}
