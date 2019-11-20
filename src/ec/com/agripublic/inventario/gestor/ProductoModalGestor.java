package ec.com.agripublic.inventario.gestor;

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
import ec.com.agripublic.dao.SeguridadDAO;
import ec.com.agripublic.dto.InMedida;
import ec.com.agripublic.dto.InProducto;
import ec.com.agripublic.dto.InTipoProducto;
import ec.com.agripublic.dto.SePersona;

public class ProductoModalGestor {
	
	private InProducto objProducto;
	private InventarioDAO inventarioDao=null;
	private String nuevo="N";
	
	private List<InTipoProducto> lsTipoProducto;
	private List<InMedida> lsMedidas;
	
	@Wire
	private Window winProductoModal;

	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view,@ExecutionArgParam("producto") InProducto objProducto)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			this.objProducto=objProducto;
			if (this.objProducto==null)
			{
				this.objProducto= new InProducto();
				
				this.objProducto.setEstado("A");
				nuevo="S";
			}
			inventarioDao= new InventarioDAO();
			lsTipoProducto=inventarioDao.listarTipoProducto();
			lsMedidas=inventarioDao.listarMedidas();
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	@Command
	public void guardar()
	{
		String error=null;
	
		try {
			
			if (nuevo.equals("S"))
			{
				
				
				error=inventarioDao.guardarProducto(objProducto);
			}else
			{
				
				if (Messagebox.show("Esta seguro de actualizar el producto,","Atención",Messagebox.YES|Messagebox.NO,Messagebox.QUESTION)==Messagebox.YES)
				{
					error=inventarioDao.actualizarProducto(objProducto);
				}else
				{
					return;
				}
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

	public InProducto getObjProducto() {
		return objProducto;
	}

	public void setObjProducto(InProducto objProducto) {
		this.objProducto = objProducto;
	}

	public List<InTipoProducto> getLsTipoProducto() {
		return lsTipoProducto;
	}

	public void setLsTipoProducto(List<InTipoProducto> lsTipoProducto) {
		this.lsTipoProducto = lsTipoProducto;
	}

	public List<InMedida> getLsMedidas() {
		return lsMedidas;
	}

	public void setLsMedidas(List<InMedida> lsMedidas) {
		this.lsMedidas = lsMedidas;
	}

	
	

}
