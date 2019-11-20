package ec.com.agripublic.gestor;

import java.util.List;

import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.Command;
import org.zkoss.bind.annotation.ContextParam;
import org.zkoss.bind.annotation.ContextType;
import org.zkoss.bind.annotation.ExecutionArgParam;
import org.zkoss.zk.ui.Component;
import org.zkoss.zk.ui.Executions;
import org.zkoss.zk.ui.select.Selectors;
import org.zkoss.zk.ui.select.annotation.Wire;
import org.zkoss.zul.Messagebox;
import org.zkoss.zul.Window;

import ec.com.agripublic.dao.SeguridadDAO;
import ec.com.agripublic.dto.SePersona;
import ec.com.agripublic.dto.SeUsuario;

public class UsuarioModalGestor {
	
	private SeUsuario objUsuario;
	private SeguridadDAO seSeguridad=null;
	private String nuevo="N";
	
	private List<SePersona> lsPersona=null;
	private SePersona objPersona;
	
	@Wire
	private Window winUsuarioModal;
	
	private SeUsuario objUsuarioSession=null;

	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view,@ExecutionArgParam("persona") SeUsuario objUsuario)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			objUsuarioSession=(SeUsuario) Executions.getCurrent().getSession().getAttribute("usuarioSes");
			
			this.objUsuario=objUsuario;
			if (this.objUsuario==null)
			{
				this.objUsuario= new SeUsuario();
				
				this.objUsuario.setEstado("A");
				nuevo="S";
			}
			seSeguridad= new SeguridadDAO();
			lsPersona=seSeguridad.listarPersonas();
			
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
				
				error=seSeguridad.guardarUsuario(objUsuario);
			}else
			{
				error=seSeguridad.actualizarUsuario(objUsuario);
			}
			if (error==null)
			{
				
				Messagebox.show("Transacción realizada correctamente.","Ätención",Messagebox.OK,Messagebox.INFORMATION);
				winUsuarioModal.detach();
			}else
			{
				Messagebox.show("Error: "+error,"Ätención",Messagebox.OK,Messagebox.INFORMATION);
			}
			
		} catch (Exception e) {
			// TODO: handle exception
			
			e.printStackTrace();
		}
	}
	
	public String concat(String nombre,String apellido)
	{
		return nombre+" "+apellido;
	}
	
	@Command
	public void cerrarVentana()
	{
		winUsuarioModal.detach();
	}

	public SeUsuario getObjUsuario() {
		return objUsuario;
	}

	public void setObjUsuario(SeUsuario objUsuario) {
		this.objUsuario = objUsuario;
	}

	public List<SePersona> getLsPersona() {
		return lsPersona;
	}

	public void setLsPersona(List<SePersona> lsPersona) {
		this.lsPersona = lsPersona;
	}

	public SePersona getObjPersona() {
		return objPersona;
	}

	public void setObjPersona(SePersona objPersona) {
		this.objPersona = objPersona;
	}

	
	

}
