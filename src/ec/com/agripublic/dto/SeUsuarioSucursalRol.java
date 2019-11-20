package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;


/**
 * The persistent class for the se_usuario_sucursal_rol database table.
 * 
 */
@Entity
@Table(name="se_usuario_sucursal_rol")
@NamedQuery(name="SeUsuarioSucursalRol.findAll", query="SELECT s FROM SeUsuarioSucursalRol s")
public class SeUsuarioSucursalRol implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_usuario")
	private String idUsuario;

	private String estado;

	@Column(name="id_rol")
	private int idRol;

	@Column(name="id_sucursal")
	private int idSucursal;

	public SeUsuarioSucursalRol() {
	}

	public String getIdUsuario() {
		return this.idUsuario;
	}

	public void setIdUsuario(String idUsuario) {
		this.idUsuario = idUsuario;
	}

	public String getEstado() {
		return this.estado;
	}

	public void setEstado(String estado) {
		this.estado = estado;
	}

	public int getIdRol() {
		return this.idRol;
	}

	public void setIdRol(int idRol) {
		this.idRol = idRol;
	}

	public int getIdSucursal() {
		return this.idSucursal;
	}

	public void setIdSucursal(int idSucursal) {
		this.idSucursal = idSucursal;
	}

}