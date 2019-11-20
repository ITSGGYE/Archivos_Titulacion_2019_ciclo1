package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;


/**
 * The persistent class for the pr_detalle_formula database table.
 * 
 */
@Entity
@Table(name="pr_detalle_formula")
@NamedQuery(name="PrDetalleFormula.findAll", query="SELECT p FROM PrDetalleFormula p")
public class PrDetalleFormula implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_detalle_formula")
	private int idDetalleFormula;

	private int cantidad;

	private String estado;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_actualizacion")
	private Date fechaActualizacion;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_creacion")
	private Date fechaCreacion;

	@Column(name="usuario_actualizacion")
	private String usuarioActualizacion;

	@Column(name="usuario_creacion")
	private String usuarioCreacion;

	//bi-directional many-to-one association to InProducto
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_producto")
	private InProducto inProducto;

	//bi-directional many-to-one association to PrFormula
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_formula")
	private PrFormula prFormula;

	public PrDetalleFormula() {
	}

	public int getIdDetalleFormula() {
		return this.idDetalleFormula;
	}

	public void setIdDetalleFormula(int idDetalleFormula) {
		this.idDetalleFormula = idDetalleFormula;
	}

	public int getCantidad() {
		return this.cantidad;
	}

	public void setCantidad(int cantidad) {
		this.cantidad = cantidad;
	}

	public String getEstado() {
		return this.estado;
	}

	public void setEstado(String estado) {
		this.estado = estado;
	}

	public Date getFechaActualizacion() {
		return this.fechaActualizacion;
	}

	public void setFechaActualizacion(Date fechaActualizacion) {
		this.fechaActualizacion = fechaActualizacion;
	}

	public Date getFechaCreacion() {
		return this.fechaCreacion;
	}

	public void setFechaCreacion(Date fechaCreacion) {
		this.fechaCreacion = fechaCreacion;
	}

	public String getUsuarioActualizacion() {
		return this.usuarioActualizacion;
	}

	public void setUsuarioActualizacion(String usuarioActualizacion) {
		this.usuarioActualizacion = usuarioActualizacion;
	}

	public String getUsuarioCreacion() {
		return this.usuarioCreacion;
	}

	public void setUsuarioCreacion(String usuarioCreacion) {
		this.usuarioCreacion = usuarioCreacion;
	}

	public InProducto getInProducto() {
		return this.inProducto;
	}

	public void setInProducto(InProducto inProducto) {
		this.inProducto = inProducto;
	}

	public PrFormula getPrFormula() {
		return this.prFormula;
	}

	public void setPrFormula(PrFormula prFormula) {
		this.prFormula = prFormula;
	}

}