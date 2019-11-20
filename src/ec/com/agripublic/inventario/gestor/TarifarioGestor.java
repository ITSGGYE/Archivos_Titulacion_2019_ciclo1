package ec.com.agripublic.inventario.gestor;

import java.util.List;
import java.util.Map;

import org.apache.commons.collections.map.HashedMap;
import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.BindingParam;
import org.zkoss.bind.annotation.Command;
import org.zkoss.bind.annotation.ContextParam;
import org.zkoss.bind.annotation.ContextType;
import org.zkoss.bind.annotation.ExecutionArgParam;
import org.zkoss.bind.annotation.NotifyChange;
import org.zkoss.zk.ui.Component;
import org.zkoss.zk.ui.Executions;
import org.zkoss.zk.ui.select.Selectors;
import org.zkoss.zul.Window;

import ec.com.agripublic.dao.InventarioDAO;
import ec.com.agripublic.dto.InKardex;
import ec.com.agripublic.dto.InProducto;
import ec.com.agripublic.dto.InTarifario;
import ec.com.agripublic.dto.SeUsuario;

public class TarifarioGestor {

	
	private InventarioDAO inventarioDao=null;
	private List<InProducto> lsProductos=null;
	private InProducto objProducto;
	
	private List<InTarifario> lsTarifario=null;
	private InTarifario objTarifario;
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			inventarioDao= new InventarioDAO();
			lsProductos=inventarioDao.listarProductosTerminados();
			
		}catch (Exception e) {
			// TODO: handle exception
		}
	}
	
	@Command
	@NotifyChange({"lsTarifario"})
	public void cargarKardex()
	{
		try {
			
			lsTarifario=inventarioDao.listarTarifario(objProducto.getIdProducto());
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	@Command
	@NotifyChange({"lsTarifario"})
	public void modal(@BindingParam("tipo") String tipo)
	{
		try {
			
			Map param= new HashedMap();
			if ("N".equals(tipo))
			{
				param.put("tarifario", null);
				
				param.put("producto", objProducto);
				
			}else
			{
				param.put("tarifario", objTarifario);
				param.put("producto", objProducto);
			}
			
			Window win=(Window) Executions.getCurrent().createComponents("/paginas/inventario/tarifario_modal.zul", null,param);
			win.doModal();
			
			lsTarifario=inventarioDao.listarTarifario(objProducto.getIdProducto());
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	
	public InTarifario obtenerUltimoMovimiento()
	{
		InTarifario objTarifario=null;
		try {
			if (lsTarifario.size()>0)
				objTarifario=lsTarifario.get(lsTarifario.size()-1);
			
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return objTarifario;
	}

	public List<InProducto> getLsProductos() {
		return lsProductos;
	}

	public void setLsProductos(List<InProducto> lsProductos) {
		this.lsProductos = lsProductos;
	}

	public InProducto getObjProducto() {
		return objProducto;
	}

	public void setObjProducto(InProducto objProducto) {
		this.objProducto = objProducto;
	}

	public List<InTarifario> getLsTarifario() {
		return lsTarifario;
	}

	public void setLsTarifario(List<InTarifario> lsTarifario) {
		this.lsTarifario = lsTarifario;
	}

	public InTarifario getObjTarifario() {
		return objTarifario;
	}

	public void setObjTarifario(InTarifario objTarifario) {
		this.objTarifario = objTarifario;
	}

	
	
	
}
