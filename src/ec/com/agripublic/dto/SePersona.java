package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the se_persona database table.
 * 
 */
@Entity
@Table(name="se_persona")
@NamedQuery(name="SePersona.findAll", query="SELECT s FROM SePersona s")
public class SePersona implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_persona")
	private int idPersona;

	private String apellidos;

	private String cedula;

	private String direccion;

	private String estado;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_actualizacion")
	private Date fechaActualizacion;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_cracion")
	private Date fechaCracion;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_nacimiento")
	private Date fechaNacimiento;

	private String nombres;

	@Column(name="usuario_actualizacion")
	private String usuarioActualizacion;

	@Column(name="usuario_creacion")
	private String usuarioCreacion;

	//bi-directional many-to-one association to Factura
	@OneToMany(mappedBy="sePersona")
	private List<Factura> facturas;

	//bi-directional many-to-one association to SeUsuario
	@OneToMany(mappedBy="sePersona")
	private List<SeUsuario> seUsuarios;

	public SePersona() {
	}

	public int getIdPersona() {
		return this.idPersona;
	}

	public void setIdPersona(int idPersona) {
		this.idPersona = idPersona;
	}

	public String getApellidos() {
		return this.apellidos;
	}

	public void setApellidos(String apellidos) {
		this.apellidos = apellidos;
	}

	public String getCedula() {
		return this.cedula;
	}

	public void setCedula(String cedula) {
		this.cedula = cedula;
	}

	public String getDireccion() {
		return this.direccion;
	}

	public void setDireccion(String direccion) {
		this.direccion = direccion;
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

	public Date getFechaCracion() {
		return this.fechaCracion;
	}

	public void setFechaCracion(Date fechaCracion) {
		this.fechaCracion = fechaCracion;
	}

	public Date getFechaNacimiento() {
		return this.fechaNacimiento;
	}

	public void setFechaNacimiento(Date fechaNacimiento) {
		this.fechaNacimiento = fechaNacimiento;
	}

	public String getNombres() {
		return this.nombres;
	}

	public void setNombres(String nombres) {
		this.nombres = nombres;
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

	public List<Factura> getFacturas() {
		return this.facturas;
	}

	public void setFacturas(List<Factura> facturas) {
		this.facturas = facturas;
	}

	public Factura addFactura(Factura factura) {
		getFacturas().add(factura);
		factura.setSePersona(this);

		return factura;
	}

	public Factura removeFactura(Factura factura) {
		getFacturas().remove(factura);
		factura.setSePersona(null);

		return factura;
	}

	public List<SeUsuario> getSeUsuarios() {
		return this.seUsuarios;
	}

	public void setSeUsuarios(List<SeUsuario> seUsuarios) {
		this.seUsuarios = seUsuarios;
	}

	public SeUsuario addSeUsuario(SeUsuario seUsuario) {
		getSeUsuarios().add(seUsuario);
		seUsuario.setSePersona(this);

		return seUsuario;
	}

	public SeUsuario removeSeUsuario(SeUsuario seUsuario) {
		getSeUsuarios().remove(seUsuario);
		seUsuario.setSePersona(null);

		return seUsuario;
	}

}