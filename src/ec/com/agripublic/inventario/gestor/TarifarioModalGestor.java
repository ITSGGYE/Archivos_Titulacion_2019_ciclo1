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
import ec.com.agripublic.dto.InProducto;
import ec.com.agripublic.dto.InTarifario;
import ec.com.agripublic.dto.InTipoMovimiento;

public class TarifarioModalGestor {
	
	private InTarifario objTarifario;
	private InventarioDAO inventarioDao=null;
	private String nuevo="N";
	
	
	
	private InProducto objProducto;
	
	
	
	@Wire
	private Window winProductoModal;

	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view,@ExecutionArgParam("tarifario") InTarifario objTarifario,@ExecutionArgParam("producto") InProducto objProducto)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			this.objProducto=objProducto;
			this.objTarifario=objTarifario;
			if (this.objTarifario==null)
			{
				this.objTarifario= new InTarifario();
				this.objTarifario.setInProducto(objProducto);
				
				this.objTarifario.setEstado("A");
				nuevo="S";
			}
			inventarioDao= new InventarioDAO();
			
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
				
				
				
				error=inventarioDao.guardarTarifario(objTarifario);
			}else
			{
				error=inventarioDao.actualizarTarifario(objTarifario);
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

	public InTarifario getObjTarifario() {
		return objTarifario;
	}

	public void setObjTarifario(InTarifario objTarifario) {
		this.objTarifario = objTarifario;
	}

	public InProducto getObjProducto() {
		return objProducto;
	}

	public void setObjProducto(InProducto objProducto) {
		this.objProducto = objProducto;
	}
	

}
