package ec.com.agripublic.produccion.gestor;

import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.ContextParam;
import org.zkoss.bind.annotation.ContextType;
import org.zkoss.bind.annotation.ExecutionArgParam;
import org.zkoss.zk.ui.Component;
import org.zkoss.zk.ui.select.Selectors;

import ec.com.agripublic.dao.InventarioDAO;
import ec.com.agripublic.dao.ProduccionDAO;
import ec.com.agripublic.dto.PrFormula;

public class FormulacionDetalleModalGestor {
	
	
	private PrFormula objFormula;
	private ProduccionDAO prProduccionDAO=null;
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view,@ExecutionArgParam("formula") PrFormula objFormula)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			this.objFormula=objFormula;
			
			prProduccionDAO= new ProduccionDAO();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}

	public PrFormula getObjFormula() {
		return objFormula;
	}

	public void setObjFormula(PrFormula objFormula) {
		this.objFormula = objFormula;
	}

}
