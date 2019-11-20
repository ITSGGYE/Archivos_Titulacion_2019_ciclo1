package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the in_medidas database table.
 * 
 */
@Entity
@Table(name="in_medidas")
@NamedQuery(name="InMedida.findAll", query="SELECT i FROM InMedida i")
public class InMedida implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_medida")
	private int idMedida;

	private String descripcion;

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
	@OneToMany(mappedBy="inMedida")
	private List<InProducto> inProductos;

	public InMedida() {
	}

	public int getIdMedida() {
		return this.idMedida;
	}

	public void setIdMedida(int idMedida) {
		this.idMedida = idMedida;
	}

	public String getDescripcion() {
		return this.descripcion;
	}

	public void setDescripcion(String descripcion) {
		this.descripcion = descripcion;
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

	public List<InProducto> getInProductos() {
		return this.inProductos;
	}

	public void setInProductos(List<InProducto> inProductos) {
		this.inProductos = inProductos;
	}

	public InProducto addInProducto(InProducto inProducto) {
		getInProductos().add(inProducto);
		inProducto.setInMedida(this);

		return inProducto;
	}

	public InProducto removeInProducto(InProducto inProducto) {
		getInProductos().remove(inProducto);
		inProducto.setInMedida(null);

		return inProducto;
	}

}