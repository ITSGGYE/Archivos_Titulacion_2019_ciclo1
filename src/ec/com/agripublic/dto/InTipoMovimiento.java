package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the in_tipo_movimiento database table.
 * 
 */
@Entity
@Table(name="in_tipo_movimiento")
@NamedQuery(name="InTipoMovimiento.findAll", query="SELECT i FROM InTipoMovimiento i")
public class InTipoMovimiento implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_tipo_movimiento")
	private int idTipoMovimiento;

	private String estado;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_actualizacion")
	private Date fechaActualizacion;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_creacion")
	private Date fechaCreacion;

	@Column(name="id_tipo")
	private int idTipo;

	private String nombre;

	@Column(name="usuario_actualizacion")
	private String usuarioActualizacion;

	@Column(name="usuario_creacion")
	private String usuarioCreacion;

	//bi-directional many-to-one association to InKardex
	@OneToMany(mappedBy="inTipoMovimiento",cascade={CascadeType.PERSIST, CascadeType.MERGE, CascadeType.REMOVE})
	private List<InKardex> inKardexs;

	public InTipoMovimiento() {
	}

	public int getIdTipoMovimiento() {
		return this.idTipoMovimiento;
	}

	public void setIdTipoMovimiento(int idTipoMovimiento) {
		this.idTipoMovimiento = idTipoMovimiento;
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

	public int getIdTipo() {
		return this.idTipo;
	}

	public void setIdTipo(int idTipo) {
		this.idTipo = idTipo;
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

	public List<InKardex> getInKardexs() {
		return this.inKardexs;
	}

	public void setInKardexs(List<InKardex> inKardexs) {
		this.inKardexs = inKardexs;
	}

	public InKardex addInKardex(InKardex inKardex) {
		getInKardexs().add(inKardex);
		inKardex.setInTipoMovimiento(this);

		return inKardex;
	}

	public InKardex removeInKardex(InKardex inKardex) {
		getInKardexs().remove(inKardex);
		inKardex.setInTipoMovimiento(null);

		return inKardex;
	}

}