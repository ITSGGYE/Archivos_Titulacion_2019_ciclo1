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

public class KardexGestor {
	
	private InventarioDAO inventarioDao=null;
	private List<InProducto> lsProductos=null;
	private InProducto objProducto;
	
	private List<InKardex> lsKardex=null;
	private InKardex objKardex;
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view)
	{
		Selectors.wireComponents(view, this, false);
		
		try {
			
			inventarioDao= new InventarioDAO();
			lsProductos=inventarioDao.listarProductos();
			
		}catch (Exception e) {
			// TODO: handle exception
		}
	}
	
	@Command
	@NotifyChange({"lsKardex"})
	public void cargarKardex()
	{
		try {
			
			lsKardex=inventarioDao.listarKardex(objProducto.getIdProducto());
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	@Command
	@NotifyChange({"lsKardex"})
	public void modal(@BindingParam("tipo") String tipo)
	{
		try {
			
			Map param= new HashedMap();
			if ("N".equals(tipo))
			{
				param.put("kardex", null);
				param.put("kardexFinal", obtenerUltimoMovimiento());
				param.put("producto", objProducto);
				
			}else
			{
				param.put("kardex", objKardex);
				param.put("producto", objProducto);
			}
			
			Window win=(Window) Executions.getCurrent().createComponents("/paginas/inventario/kardex_modal.zul", null,param);
			win.doModal();
			
			lsKardex=inventarioDao.listarKardex(objProducto.getIdProducto());
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	
	public InKardex obtenerUltimoMovimiento()
	{
		InKardex objKardex=null;
		try {
			if (lsKardex.size()>0)
			objKardex=lsKardex.get(lsKardex.size()-1);
			
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
		return objKardex;
	}

	public List<InProducto> getLsProductos() {
		return lsProductos;
	}

	public void setLsProductos(List<InProducto> lsProductos) {
		this.lsProductos = lsProductos;
	}

	public List<InKardex> getLsKardex() {
		return lsKardex;
	}

	public void setLsKardex(List<InKardex> lsKardex) {
		this.lsKardex = lsKardex;
	}

	public InKardex getObjKardex() {
		return objKardex;
	}

	public void setObjKardex(InKardex objKardex) {
		this.objKardex = objKardex;
	}

	public InProducto getObjProducto() {
		return objProducto;
	}

	public void setObjProducto(InProducto objProducto) {
		this.objProducto = objProducto;
	}
	
	
	

}
