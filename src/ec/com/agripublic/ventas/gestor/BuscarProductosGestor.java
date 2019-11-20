package ec.com.agripublic.ventas.gestor;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.zkoss.bind.BindUtils;
import org.zkoss.bind.annotation.AfterCompose;
import org.zkoss.bind.annotation.BindingParam;
import org.zkoss.bind.annotation.Command;
import org.zkoss.bind.annotation.ContextParam;
import org.zkoss.bind.annotation.ContextType;
import org.zkoss.zk.ui.Component;
import org.zkoss.zk.ui.select.Selectors;
import org.zkoss.zk.ui.select.annotation.Wire;
import org.zkoss.zul.Messagebox;
import org.zkoss.zul.Window;

import ec.com.agripublic.dao.InventarioDAO;
import ec.com.agripublic.dto.InProducto;
import ec.com.agripublic.dto.ext.InProductoDtoExt;

public class BuscarProductosGestor {
	
	
	private List<InProductoDtoExt> lsProductos=null;
	private InProductoDtoExt objProducto;
	
	private InventarioDAO objInventarioDao= new InventarioDAO();
	@Wire
	private Window winBuscarProducto;
	
	@AfterCompose
	public void init(@ContextParam(ContextType.VIEW) Component view)
	{
		Selectors.wireComponents(view, this, false);
		
		
		try {
			
			lsProductos=objInventarioDao.listarProductosFacturacion();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}

	@Command
	public void aceptar()
	{
		Map param= new HashMap();
		param.put("param", objProducto);
		try {
			
			
			if (objProducto.getStock()<1)
			{
				Messagebox.show("Saldo Actual del producto no permite realizar esta venta, el saldo es: "+objProducto.getStock(),"Atención",Messagebox.OK,Messagebox.INFORMATION);
				return;
			}
			
			BindUtils.postGlobalCommand(null, null, "agregarDetalle", param);
			winBuscarProducto.detach();
			
		} catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}

	public List<InProductoDtoExt> getLsProductos() {
		return lsProductos;
	}


	public void setLsProductos(List<InProductoDtoExt> lsProductos) {
		this.lsProductos = lsProductos;
	}

	public InProductoDtoExt getObjProducto() {
		return objProducto;
	}

	public void setObjProducto(InProductoDtoExt objProducto) {
		this.objProducto = objProducto;
	}


	


	
	
	

}
