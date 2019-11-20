package ec.com.agripublic.gestor.reportes;

import java.util.Calendar;
import java.util.Date;
import java.util.Map;

import org.apache.commons.collections.map.HashedMap;
import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.Command;
import org.zkoss.bind.annotation.ContextParam;
import org.zkoss.bind.annotation.ContextType;
import org.zkoss.zk.ui.Component;
import org.zkoss.zk.ui.Executions;
import org.zkoss.zk.ui.select.Selectors;
import org.zkoss.zk.ui.select.annotation.Wire;
import org.zkoss.zkex.zul.Jasperreport;

import ec.com.agripublic.dto.SeUsuario;
import ec.com.agripublic.em.EntityManagerUtil;

public class FacturasGestor {
	
	@Wire
	private Jasperreport report;
	
	private Integer codigoFactura;
	
private SeUsuario objUsuarioSession=null;


	

	private static EntityManagerUtil emUtil= new EntityManagerUtil();
	{
		objUsuarioSession=(SeUsuario) Executions.getCurrent().getSession().getAttribute("usuarioSes");
	}
	
	Calendar myCal = Calendar.getInstance();
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view)
	{
		Selectors.wireComponents(view, this, false);
		
		
		
	}
	
	@Command
	public void generar()
	{
try {
			
	Map param= new HashedMap();
	
	param.put("p_factura", codigoFactura);
	
	
	report.setDataConnection(emUtil.getConexion());
	report.setSrc("/common/ireport/factura.jasper");
	report.setParameters(param);
	report.setType("pdf");
			
			
		}catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}

	public Integer getCodigoFactura() {
		return codigoFactura;
	}

	public void setCodigoFactura(Integer codigoFactura) {
		this.codigoFactura = codigoFactura;
	}

	
	


}
