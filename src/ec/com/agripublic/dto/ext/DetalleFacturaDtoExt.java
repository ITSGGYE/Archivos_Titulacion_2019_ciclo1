package ec.com.agripublic.dto.ext;

import ec.com.agripublic.dto.DetalleFactura;
import ec.com.agripublic.dto.InProducto;

public class DetalleFacturaDtoExt extends DetalleFactura{
	
	
	private InProductoDtoExt inProductoDtoExt;
	private Integer item;
	private Double total;

	public InProductoDtoExt getInProductoDtoExt() {
		return inProductoDtoExt;
	}

	public void setInProductoDtoExt(InProductoDtoExt inProductoDtoExt) {
		this.inProductoDtoExt = inProductoDtoExt;
	}

	public Integer getItem() {
		return item;
	}

	public void setItem(Integer item) {
		this.item = item;
	}

	public Double getTotal() {
		return total;
	}

	public void setTotal(Double total) {
		this.total = total;
	}
	
	
	

}
