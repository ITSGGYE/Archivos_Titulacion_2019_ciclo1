package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;


/**
 * The persistent class for the se_sucursales database table.
 * 
 */
@Entity
@Table(name="se_sucursales")
@NamedQuery(name="SeSucursale.findAll", query="SELECT s FROM SeSucursale s")
public class SeSucursale implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_sucursal")
	private int idSucursal;

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

	//bi-directional many-to-one association to SeEmpresa
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_empresa")
	private SeEmpresa seEmpresa;

	public SeSucursale() {
	}

	public int getIdSucursal() {
		return this.idSucursal;
	}

	public void setIdSucursal(int idSucursal) {
		this.idSucursal = idSucursal;
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

	public SeEmpresa getSeEmpresa() {
		return this.seEmpresa;
	}

	public void setSeEmpresa(SeEmpresa seEmpresa) {
		this.seEmpresa = seEmpresa;
	}

}