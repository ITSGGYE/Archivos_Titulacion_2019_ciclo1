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
import ec.com.agripublic.dto.SeUsuario;

public class UsuarioGestor {
	
	
	private List<SeUsuario> lsUsuarios=null;
	private SeUsuario objUsuario;
	private SeguridadDAO seSeguridad=null;
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			seSeguridad= new SeguridadDAO();
			lsUsuarios=seSeguridad.listarUsuarios();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	@Command
	@NotifyChange({"lsUsuarios"})
	public void modal(@BindingParam("tipo") String tipo)
	{
		try {
			
			Map param= new HashedMap();
			if ("N".equals(tipo))
			{
				param.put("persona", null);
			}else
			{
				param.put("persona", objUsuario);
			}
			
			Window win=(Window) Executions.getCurrent().createComponents("/paginas/seguridad/usuario_modal.zul", null,param);
			win.doModal();
			
			lsUsuarios=seSeguridad.listarUsuarios();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}

	public List<SeUsuario> getLsUsuarios() {
		return lsUsuarios;
	}

	public void setLsUsuarios(List<SeUsuario> lsUsuarios) {
		this.lsUsuarios = lsUsuarios;
	}

	public SeUsuario getObjUsuario() {
		return objUsuario;
	}

	public void setObjUsuario(SeUsuario objUsuario) {
		this.objUsuario = objUsuario;
	}

	
	
	

}
