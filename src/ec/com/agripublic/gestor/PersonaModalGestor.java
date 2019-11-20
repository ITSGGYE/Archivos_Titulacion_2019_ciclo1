package ec.com.agripublic.gestor;

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

import ec.com.agripublic.dao.SeguridadDAO;
import ec.com.agripublic.dto.SePersona;
import ec.com.agripublic.util.ValidarIdentificacionUtil;

public class PersonaModalGestor {
	
	private SePersona objPersona;
	private SeguridadDAO seSeguridad=null;
	private String nuevo="N";
	
	@Wire
	private Window winPersonaModal;

	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view,@ExecutionArgParam("persona") SePersona objPersona)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			this.objPersona=objPersona;
			if (this.objPersona==null)
			{
				this.objPersona= new SePersona();
				this.objPersona.setIdPersona(100);
				this.objPersona.setEstado("A");
				nuevo="S";
			}
			seSeguridad= new SeguridadDAO();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	@Command
	public void validarCedula()
	{
		
		
		try {
			
			boolean valido=ValidarIdentificacionUtil.validadarCedula(objPersona.getCedula());
			if (!valido)
			{
				Messagebox.show("Identificación Ingresada es Incorrecta.","Ätención",Messagebox.OK,Messagebox.EXCLAMATION);
			}
			
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
			
			boolean valido=ValidarIdentificacionUtil.validadarCedula(objPersona.getCedula());
			if (valido==false)
			{
				Messagebox.show("Identificación Ingresada es Incorrecta.","Ätención",Messagebox.OK,Messagebox.EXCLAMATION);
				return;
			}
			
			if (nuevo.equals("S"))
			{
				error=seSeguridad.guardarPersonas(objPersona);
			}else
			{
				error=seSeguridad.actualizarPersonas(objPersona);
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

	public SePersona getObjPersona() {
		return objPersona;
	}

	public void setObjPersona(SePersona objPersona) {
		this.objPersona = objPersona;
	}
	
	
	
}
