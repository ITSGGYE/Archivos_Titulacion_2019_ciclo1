package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the in_tipo_producto database table.
 * 
 */
@Entity
@Table(name="in_tipo_producto")
@NamedQuery(name="InTipoProducto.findAll", query="SELECT i FROM InTipoProducto i")
public class InTipoProducto implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_tipo_producto")
	private int idTipoProducto;

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

	//bi-directional many-to-one association to InProducto
	@OneToMany(mappedBy="inTipoProducto")
	private List<InProducto> inProductos;

	public InTipoProducto() {
	}

	public int getIdTipoProducto() {
		return this.idTipoProducto;
	}

	public void setIdTipoProducto(int idTipoProducto) {
		this.idTipoProducto = idTipoProducto;
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

	public List<InProducto> getInProductos() {
		return this.inProductos;
	}

	public void setInProductos(List<InProducto> inProductos) {
		this.inProductos = inProductos;
	}

	public InProducto addInProducto(InProducto inProducto) {
		getInProductos().add(inProducto);
		inProducto.setInTipoProducto(this);

		return inProducto;
	}

	public InProducto removeInProducto(InProducto inProducto) {
		getInProductos().remove(inProducto);
		inProducto.setInTipoProducto(null);

		return inProducto;
	}

}