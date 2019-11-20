package ec.com.agripublic.produccion.gestor;

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
import ec.com.agripublic.dao.ProduccionDAO;
import ec.com.agripublic.dao.SeguridadDAO;
import ec.com.agripublic.dto.InProducto;
import ec.com.agripublic.dto.PrFormula;
import ec.com.agripublic.dto.SePersona;

public class FormulacionModalGestor {
	
	private PrFormula objFormula;
	private ProduccionDAO prProduccionDAO=null;
	private String nuevo="N";
	
	private InventarioDAO inventarioDao=null;
	
	private List<InProducto> lsProductos=null;
	
	@Wire
	private Window winPersonaModal;

	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view,@ExecutionArgParam("formula") PrFormula objFormula)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			this.objFormula=objFormula;
			if (this.objFormula==null)
			{
				this.objFormula= new PrFormula();
				this.objFormula.setEstado("A");
				nuevo="S";
			}
			prProduccionDAO= new ProduccionDAO();
			inventarioDao= new InventarioDAO();
			lsProductos=inventarioDao.listarProductosTerminados();
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
				error=prProduccionDAO.guardarFormula(objFormula);
			}else
			{
				error=prProduccionDAO.actualizarFormula(objFormula);
			}
			if (error==null)
			{
				
				Messagebox.show("Transacción realizada correctamente.","Ätención",Messagebox.OK,Messagebox.INFORMATION);
				winPersonaModal.detach();
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
		winPersonaModal.detach();
	}

	public PrFormula getObjFormula() {
		return objFormula;
	}

	public void setObjFormula(PrFormula objFormula) {
		this.objFormula = objFormula;
	}

	public List<InProducto> getLsProductos() {
		return lsProductos;
	}

	public void setLsProductos(List<InProducto> lsProductos) {
		this.lsProductos = lsProductos;
	}

	
}
