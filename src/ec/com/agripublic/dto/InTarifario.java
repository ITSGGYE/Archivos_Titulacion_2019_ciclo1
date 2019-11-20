package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;


/**
 * The persistent class for the in_tarifario database table.
 * 
 */
@Entity
@Table(name="in_tarifario")
@NamedQuery(name="InTarifario.findAll", query="SELECT i FROM InTarifario i")
public class InTarifario implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_tarifario")
	private int idTarifario;

	private String estado;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_actualizacion")
	private Date fechaActualizacion;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_creacion")
	private Date fechaCreacion;

	@Column(name="paga_iva")
	private String pagaIva;

	@Column(name="usuario_actualizacion")
	private String usuarioActualizacion;

	@Column(name="usuario_creacion")
	private String usuarioCreacion;

	@Column(name="valor_venta")
	private double valorVenta;

	//bi-directional many-to-one association to InProducto
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_producto")
	private InProducto inProducto;

	public InTarifario() {
	}

	public int getIdTarifario() {
		return this.idTarifario;
	}

	public void setIdTarifario(int idTarifario) {
		this.idTarifario = idTarifario;
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

	public String getPagaIva() {
		return this.pagaIva;
	}

	public void setPagaIva(String pagaIva) {
		this.pagaIva = pagaIva;
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

	public double getValorVenta() {
		return this.valorVenta;
	}

	public void setValorVenta(double valorVenta) {
		this.valorVenta = valorVenta;
	}

	public InProducto getInProducto() {
		return this.inProducto;
	}

	public void setInProducto(InProducto inProducto) {
		this.inProducto = inProducto;
	}

}