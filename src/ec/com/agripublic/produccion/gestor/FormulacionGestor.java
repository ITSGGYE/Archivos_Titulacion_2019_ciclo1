package ec.com.agripublic.produccion.gestor;

import java.util.List;
import java.util.Map;

import org.apache.commons.collections.map.HashedMap;
import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.BindingParam;
import org.zkoss.bind.annotation.Command;
import org.zkoss.bind.annotation.ContextParam;
import org.zkoss.bind.annotation.ContextType;
import org.zkoss.bind.annotation.NotifyChange;
import org.zkoss.zk.ui.Component;
import org.zkoss.zk.ui.Executions;
import org.zkoss.zk.ui.select.Selectors;
import org.zkoss.zul.Window;

import ec.com.agripublic.dao.ProduccionDAO;
import ec.com.agripublic.dao.SeguridadDAO;
import ec.com.agripublic.dto.PrFormula;
import ec.com.agripublic.dto.SePersona;

public class FormulacionGestor {
	
	private List<PrFormula> lsFormulas=null;
	private PrFormula objFormula;
	private ProduccionDAO prProduccionDAO=null;
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			prProduccionDAO= new ProduccionDAO();
			lsFormulas=prProduccionDAO.listarFormulas();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}

	@Command
	@NotifyChange({"lsFormulas"})
	public void modal(@BindingParam("tipo") String tipo)
	{
		try {
			
			Map param= new HashedMap();
			if ("N".equals(tipo))
			{
				param.put("formula", null);
			}else
			{
				param.put("formula", objFormula);
			}
			
			Window win=(Window) Executions.getCurrent().createComponents("/paginas/produccion/formulacion_modal.zul", null,param);
			win.doModal();
			
			lsFormulas=prProduccionDAO.listarFormulas();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	
	@Command
	public void modalDetalle(@BindingParam("formula") PrFormula objFormulaParam)
	{
		try {
			
			Map param= new HashedMap();
			
				param.put("formula", objFormulaParam);
			
			
			Window win=(Window) Executions.getCurrent().createComponents("/paginas/produccion/formulacion_detalle_modal.zul", null,param);
			win.doModal();
			
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}

	public List<PrFormula> getLsFormulas() {
		return lsFormulas;
	}

	public void setLsFormulas(List<PrFormula> lsFormulas) {
		this.lsFormulas = lsFormulas;
	}

	public PrFormula getObjFormula() {
		return objFormula;
	}

	public void setObjFormula(PrFormula objFormula) {
		this.objFormula = objFormula;
	}

}
