package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;


/**
 * The persistent class for the in_parametros_generales database table.
 * 
 */
@Entity
@Table(name="in_parametros_generales")
@NamedQuery(name="InParametrosGenerale.findAll", query="SELECT i FROM InParametrosGenerale i")
public class InParametrosGenerale implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private String nemonico;

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

	@Column(name="valor_double")
	private double valorDouble;

	@Column(name="valor_int")
	private int valorInt;

	@Column(name="valor_string")
	private String valorString;

	public InParametrosGenerale() {
	}

	public String getNemonico() {
		return this.nemonico;
	}

	public void setNemonico(String nemonico) {
		this.nemonico = nemonico;
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

	public double getValorDouble() {
		return this.valorDouble;
	}

	public void setValorDouble(double valorDouble) {
		this.valorDouble = valorDouble;
	}

	public int getValorInt() {
		return this.valorInt;
	}

	public void setValorInt(int valorInt) {
		this.valorInt = valorInt;
	}

	public String getValorString() {
		return this.valorString;
	}

	public void setValorString(String valorString) {
		this.valorString = valorString;
	}

}