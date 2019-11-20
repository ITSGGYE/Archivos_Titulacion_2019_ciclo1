package ec.com.agripublic.gestor;

import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.Command;
import org.zkoss.bind.annotation.ContextParam;
import org.zkoss.bind.annotation.ContextType;
import org.zkoss.zk.ui.Component;
import org.zkoss.zk.ui.Executions;
import org.zkoss.zk.ui.select.Selectors;
import org.zkoss.zul.Messagebox;

import ec.com.agripublic.dao.SeguridadDAO;
import ec.com.agripublic.dto.SeUsuario;

public class IndexGestor {
	
	
	private SeUsuario objUsuario;
	
	private SeguridadDAO seSeguridad=null;
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			
			seSeguridad= new SeguridadDAO();
			
			if (objUsuario==null)
			{
				objUsuario= new SeUsuario();
			}
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	
	@Command
	public void ingresar()
	{
		SeUsuario objUsuarioBase=null;
		try {
			
			objUsuarioBase=seSeguridad.autenticarUsuario(objUsuario.getIdUsuario());
			
			if (objUsuarioBase==null)
			{
				Messagebox.show("Usuario No Existe.", "Atención", Messagebox.OK, Messagebox.EXCLAMATION);
				return;
						
			}else
			{
				if (objUsuarioBase.getClave().equals(objUsuario.getClave()))
				{
					Executions.getCurrent().getSession().setAttribute("usuarioSes", objUsuarioBase);
					Executions.getCurrent().sendRedirect("/paginas/seguridad/principal.zul");
					
				}else
				{
					Messagebox.show("Calve es Incorrecta.", "Atención", Messagebox.OK, Messagebox.EXCLAMATION);
				}
			}
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}


	public SeUsuario getObjUsuario() {
		return objUsuario;
	}


	public void setObjUsuario(SeUsuario objUsuario) {
		this.objUsuario = objUsuario;
	}


	public SeguridadDAO getSeSeguridad() {
		return seSeguridad;
	}


	public void setSeSeguridad(SeguridadDAO seSeguridad) {
		this.seSeguridad = seSeguridad;
	}
	

	
	
	
	

}
