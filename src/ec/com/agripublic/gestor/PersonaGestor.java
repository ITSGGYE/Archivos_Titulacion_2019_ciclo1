package ec.com.agripublic.gestor;

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

import ec.com.agripublic.dao.SeguridadDAO;
import ec.com.agripublic.dto.SePersona;

public class PersonaGestor {
	
	
	private List<SePersona> lsPersonas=null;
	private SePersona objPersona;
	private SeguridadDAO seSeguridad=null;
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			seSeguridad= new SeguridadDAO();
			lsPersonas=seSeguridad.listarPersonas();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}

	@Command
	@NotifyChange({"lsPersonas"})
	public void modal(@BindingParam("tipo") String tipo)
	{
		try {
			
			Map param= new HashedMap();
			if ("N".equals(tipo))
			{
				param.put("persona", null);
			}else
			{
				param.put("persona", objPersona);
			}
			
			Window win=(Window) Executions.getCurrent().createComponents("/paginas/seguridad/persona_modal.zul", null,param);
			win.doModal();
			
			lsPersonas=seSeguridad.listarPersonas();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}

	public List<SePersona> getLsPersonas() {
		return lsPersonas;
	}

	public void setLsPersonas(List<SePersona> lsPersonas) {
		this.lsPersonas = lsPersonas;
	}

	public SePersona getObjPersona() {
		return objPersona;
	}

	public void setObjPersona(SePersona objPersona) {
		this.objPersona = objPersona;
	}
	
}
