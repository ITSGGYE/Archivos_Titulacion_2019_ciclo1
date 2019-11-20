package ec.com.agripublic.gestor.reportes;

import java.util.Calendar;
import java.util.Date;
import java.util.Map;

import org.apache.commons.collections.map.HashedMap;
import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.Command;
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

public class VentasGestor {
	
	@Wire
	private Jasperreport report;
	
	private Date fechaInicio;
	private Date fechaFin;
	
private SeUsuario objUsuarioSession=null;

private Double total=0.00;
	

private static EntityManagerUtil emUtil= new EntityManagerUtil();
	{
		objUsuarioSession=(SeUsuario) Executions.getCurrent().getSession().getAttribute("usuarioSes");
	}
	
	Calendar myCal = Calendar.getInstance();
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view)
	{
		Selectors.wireComponents(view, this, false);
		
		fechaInicio=myCal.getTime();
		fechaFin=myCal.getTime();
		
	}
	
	@Command
	public void generar()
	{
try {
			
			Map param= new HashedMap();
			param.put("p_usuario", objUsuarioSession.getIdUsuario());
			param.put("p_fecha_inicio", fechaInicio);
			param.put("p_fecha_fin", fechaFin);
			
			
			report.setDataConnection(emUtil.getConexion());
			report.setSrc("/common/ireport/ventas.jasper");
			report.setParameters(param);
			report.setType("pdf");
			
			
		}catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}

	public Date getFechaInicio() {
		return fechaInicio;
	}

	public void setFechaInicio(Date fechaInicio) {
		this.fechaInicio = fechaInicio;
	}

	public Date getFechaFin() {
		return fechaFin;
	}

	public void setFechaFin(Date fechaFin) {
		this.fechaFin = fechaFin;
	}

	public Double getTotal() {
		return total;
	}

	public void setTotal(Double total) {
		this.total = total;
	}
	
	

}
