package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;


/**
 * The persistent class for the detalle_factura database table.
 * 
 */
@Entity
@Table(name="detalle_factura")
@NamedQuery(name="DetalleFactura.findAll", query="SELECT d FROM DetalleFactura d")
public class DetalleFactura implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_detalle_factura")
	private int idDetalleFactura;

	private double cantidad;

	@Column(name="detalle_facturacol")
	private String detalleFacturacol;

	private String estado;

	@Column(name="precio_unitario")
	private double precioUnitario;

	//bi-directional many-to-one association to Factura
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_factura")
	private Factura factura;

	//bi-directional many-to-one association to InProducto
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_producto")
	private InProducto inProducto;

	public DetalleFactura() {
	}

	public int getIdDetalleFactura() {
		return this.idDetalleFactura;
	}

	public void setIdDetalleFactura(int idDetalleFactura) {
		this.idDetalleFactura = idDetalleFactura;
	}

	public double getCantidad() {
		return this.cantidad;
	}

	public void setCantidad(double cantidad) {
		this.cantidad = cantidad;
	}

	public String getDetalleFacturacol() {
		return this.detalleFacturacol;
	}

	public void setDetalleFacturacol(String detalleFacturacol) {
		this.detalleFacturacol = detalleFacturacol;
	}

	public String getEstado() {
		return this.estado;
	}

	public void setEstado(String estado) {
		this.estado = estado;
	}

	public double getPrecioUnitario() {
		return this.precioUnitario;
	}

	public void setPrecioUnitario(double precioUnitario) {
		this.precioUnitario = precioUnitario;
	}

	public Factura getFactura() {
		return this.factura;
	}

	public void setFactura(Factura factura) {
		this.factura = factura;
	}

	public InProducto getInProducto() {
		return this.inProducto;
	}

	public void setInProducto(InProducto inProducto) {
		this.inProducto = inProducto;
	}

}