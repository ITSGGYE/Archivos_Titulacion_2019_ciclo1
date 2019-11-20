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
import ec.com.agripublic.dto.InProducto;
import ec.com.agripublic.dto.SeUsuario;

public class ProductoGestor {
	
	
	private List<InProducto> lsProductos=null;
	private InProducto objProducto;
	
	private InventarioDAO inventarioDao=null;
	
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view,@ExecutionArgParam("persona") SeUsuario objUsuario)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			inventarioDao= new InventarioDAO();
			lsProductos=inventarioDao.listarProductos();
			
		}catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	@Command
	@NotifyChange({"lsProductos"})
	public void modal(@BindingParam("tipo") String tipo)
	{
		try {
			
			Map param= new HashedMap();
			if ("N".equals(tipo))
			{
				param.put("producto", null);
			}else
			{
				param.put("producto", objProducto);
			}
			
			Window win=(Window) Executions.getCurrent().createComponents("/paginas/inventario/producto_modal.zul", null,param);
			win.doModal();
			
			lsProductos=inventarioDao.listarProductos();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
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
	
	

}
