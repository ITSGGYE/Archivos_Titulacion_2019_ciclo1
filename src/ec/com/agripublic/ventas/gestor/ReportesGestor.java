package ec.com.agripublic.ventas.gestor;

import java.util.Map;

import javax.persistence.EntityManager;

import org.apache.commons.collections.map.HashedMap;
import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.ContextParam;
import org.zkoss.bind.annotation.ContextType;
import org.zkoss.bind.annotation.ExecutionArgParam;
import org.zkoss.zk.ui.Component;
import org.zkoss.zk.ui.Executions;
import org.zkoss.zk.ui.select.Selectors;
import org.zkoss.zk.ui.select.annotation.Wire;
import org.zkoss.zkex.zul.Jasperreport;

import ec.com.agripublic.dto.Factura;
import ec.com.agripublic.dto.SeUsuario;
import ec.com.agripublic.em.EntityManagerUtil;


public class ReportesGestor {
	
	
	private static EntityManagerUtil emUtil= new EntityManagerUtil();
	private SeUsuario objUsuarioSession=null;
	
	{
		objUsuarioSession=(SeUsuario) Executions.getCurrent().getSession().getAttribute("usuarioSes");
	}
	
	@Wire
	private Jasperreport report;
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view,@ExecutionArgParam("param") Factura objFactura)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			Map param= new HashedMap();
			param.put("p_usuario", objUsuarioSession.getIdUsuario());
			param.put("p_factura", objFactura.getIdFactura());
			
			
			report.setDataConnection(emUtil.getConexion());
			report.setSrc("/common/ireport/factura.jasper");
			report.setParameters(param);
			report.setType("pdf");
			
			
		}catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}

}
