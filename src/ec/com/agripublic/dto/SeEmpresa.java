package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the se_empresas database table.
 * 
 */
@Entity
@Table(name="se_empresas")
@NamedQuery(name="SeEmpresa.findAll", query="SELECT s FROM SeEmpresa s")
public class SeEmpresa implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_empresa")
	private int idEmpresa;

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

	//bi-directional many-to-one association to SeSucursale
	@OneToMany(mappedBy="seEmpresa")
	private List<SeSucursale> seSucursales;

	public SeEmpresa() {
	}

	public int getIdEmpresa() {
		return this.idEmpresa;
	}

	public void setIdEmpresa(int idEmpresa) {
		this.idEmpresa = idEmpresa;
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

	public List<SeSucursale> getSeSucursales() {
		return this.seSucursales;
	}

	public void setSeSucursales(List<SeSucursale> seSucursales) {
		this.seSucursales = seSucursales;
	}

	public SeSucursale addSeSucursale(SeSucursale seSucursale) {
		getSeSucursales().add(seSucursale);
		seSucursale.setSeEmpresa(this);

		return seSucursale;
	}

	public SeSucursale removeSeSucursale(SeSucursale seSucursale) {
		getSeSucursales().remove(seSucursale);
		seSucursale.setSeEmpresa(null);

		return seSucursale;
	}

}