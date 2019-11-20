package ec.com.agripublic.gestor;

import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.BindingParam;
import org.zkoss.bind.annotation.Command;
import org.zkoss.bind.annotation.ContextParam;
import org.zkoss.bind.annotation.ContextType;
import org.zkoss.zk.ui.Component;
import org.zkoss.zk.ui.Executions;
import org.zkoss.zk.ui.select.Selectors;
import org.zkoss.zk.ui.select.annotation.Wire;
import org.zkoss.zul.Include;

import ec.com.agripublic.dto.SeUsuario;

public class SeguridadGestor {
	
	@Wire
	private Include incPricipal;
	
	private SeUsuario objUsuarioSession=null;
	
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			
			objUsuarioSession=(SeUsuario) Executions.getCurrent().getSession().getAttribute("usuarioSes");
			
			if (objUsuarioSession==null)
			{
				Executions.getCurrent().sendRedirect("/index.zul");
			}
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	@Command
	public void cargar(@BindingParam("param") String url)
	{
		try {
			
			incPricipal.setSrc(url);
			
		} catch (Exception e) {
			// TODO: handle exception
		}
	}
	
	@Command
	public void cerrarSession()
	{
		try {
			Executions.getCurrent().getSession().removeAttribute("usuarioSes");
			Executions.getCurrent().sendRedirect("/index.zul");
		} catch (Exception e) {
			// TODO: handle exception
		}
	}

}
