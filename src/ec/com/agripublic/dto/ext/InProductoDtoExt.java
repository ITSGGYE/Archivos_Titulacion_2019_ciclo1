package ec.com.agripublic.dto.ext;

import ec.com.agripublic.dto.InProducto;

public class InProductoDtoExt extends InProducto{
	
	private Double precio;
	private Double stock;
	
	
	public Double getPrecio() {
		return precio;
	}

	public void setPrecio(Double precio) {
		this.precio = precio;
	}

	public Double getStock() {
		return stock;
	}

	public void setStock(Double stock) {
		this.stock = stock;
	}

}
