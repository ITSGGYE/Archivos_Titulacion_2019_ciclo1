package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the pr_formulas database table.
 * 
 */
@Entity
@Table(name="pr_formulas")
@NamedQuery(name="PrFormula.findAll", query="SELECT p FROM PrFormula p")
public class PrFormula implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_formula")
	private int idFormula;

	private String estado;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_actualizacion")
	private Date fechaActualizacion;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_creacion")
	private Date fechaCreacion;

	private String nombre;

	@Column(name="usuario_actualizacion")
	private String usuarioActualizacion;

	@Column(name="usuario_creacion")
	private String usuarioCreacion;

	//bi-directional many-to-one association to PrDetalleFormula
	@OneToMany(mappedBy="prFormula")
	private List<PrDetalleFormula> prDetalleFormulas;

	//bi-directional many-to-one association to InProducto
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_producto_terminado")
	private InProducto inProducto;

	public PrFormula() {
	}

	public int getIdFormula() {
		return this.idFormula;
	}

	public void setIdFormula(int idFormula) {
		this.idFormula = idFormula;
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

	public String getNombre() {
		return this.nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
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

	public List<PrDetalleFormula> getPrDetalleFormulas() {
		return this.prDetalleFormulas;
	}

	public void setPrDetalleFormulas(List<PrDetalleFormula> prDetalleFormulas) {
		this.prDetalleFormulas = prDetalleFormulas;
	}

	public PrDetalleFormula addPrDetalleFormula(PrDetalleFormula prDetalleFormula) {
		getPrDetalleFormulas().add(prDetalleFormula);
		prDetalleFormula.setPrFormula(this);

		return prDetalleFormula;
	}

	public PrDetalleFormula removePrDetalleFormula(PrDetalleFormula prDetalleFormula) {
		getPrDetalleFormulas().remove(prDetalleFormula);
		prDetalleFormula.setPrFormula(null);

		return prDetalleFormula;
	}

	public InProducto getInProducto() {
		return this.inProducto;
	}

	public void setInProducto(InProducto inProducto) {
		this.inProducto = inProducto;
	}

}