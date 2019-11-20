package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the factura database table.
 * 
 */
@Entity
@NamedQuery(name="Factura.findAll", query="SELECT f FROM Factura f")
public class Factura implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_factura")
	private int idFactura;

	private String estado;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_factura")
	private Date fechaFactura;

	private double iva;

	private double subtotal;

	private double total;

	//bi-directional many-to-one association to DetalleFactura
	@OneToMany(mappedBy="factura", cascade={CascadeType.PERSIST, CascadeType.MERGE, CascadeType.REMOVE})
	private List<DetalleFactura> detalleFacturas;

	//bi-directional many-to-one association to SePersona
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_persona")
	private SePersona sePersona;

	public Factura() {
	}

	public int getIdFactura() {
		return this.idFactura;
	}

	public void setIdFactura(int idFactura) {
		this.idFactura = idFactura;
	}

	public String getEstado() {
		return this.estado;
	}

	public void setEstado(String estado) {
		this.estado = estado;
	}

	public Date getFechaFactura() {
		return this.fechaFactura;
	}

	public void setFechaFactura(Date fechaFactura) {
		this.fechaFactura = fechaFactura;
	}

	public double getIva() {
		return this.iva;
	}

	public void setIva(double iva) {
		this.iva = iva;
	}

	public double getSubtotal() {
		return this.subtotal;
	}

	public void setSubtotal(double subtotal) {
		this.subtotal = subtotal;
	}

	public double getTotal() {
		return this.total;
	}

	public void setTotal(double total) {
		this.total = total;
	}

	public List<DetalleFactura> getDetalleFacturas() {
		return this.detalleFacturas;
	}

	public void setDetalleFacturas(List<DetalleFactura> detalleFacturas) {
		this.detalleFacturas = detalleFacturas;
	}

	public DetalleFactura addDetalleFactura(DetalleFactura detalleFactura) {
		getDetalleFacturas().add(detalleFactura);
		detalleFactura.setFactura(this);

		return detalleFactura;
	}

	public DetalleFactura removeDetalleFactura(DetalleFactura detalleFactura) {
		getDetalleFacturas().remove(detalleFactura);
		detalleFactura.setFactura(null);

		return detalleFactura;
	}

	public SePersona getSePersona() {
		return this.sePersona;
	}

	public void setSePersona(SePersona sePersona) {
		this.sePersona = sePersona;
	}

}