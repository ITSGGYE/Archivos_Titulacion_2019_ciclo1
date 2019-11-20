package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;


/**
 * The persistent class for the in_kardex database table.
 * 
 */
@Entity
@Table(name="in_kardex")
@NamedQuery(name="InKardex.findAll", query="SELECT i FROM InKardex i")
public class InKardex implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_kardex")
	private int idKardex;

	private int cantidad;

	@Column(name="costo_actual")
	private double costoActual;

	@Column(name="costo_anterior")
	private double costoAnterior;

	private String estado;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_actuaalizacion")
	private Date fechaActuaalizacion;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_creacion")
	private Date fechaCreacion;

	@Temporal(TemporalType.DATE)
	@Column(name="fecha_transaccion")
	private Date fechaTransaccion;

	@Column(name="saldo_actual")
	private int saldoActual;

	@Column(name="saldo_anterior")
	private int saldoAnterior;

	@Column(name="usuario_actualizacion")
	private String usuarioActualizacion;

	@Column(name="usuario_creacion")
	private String usuarioCreacion;

	//bi-directional many-to-one association to InProducto
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_producto")
	private InProducto inProducto;

	//bi-directional many-to-one association to InTipoMovimiento
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_tipo_movimiento")
	private InTipoMovimiento inTipoMovimiento;

	public InKardex() {
	}

	public int getIdKardex() {
		return this.idKardex;
	}

	public void setIdKardex(int idKardex) {
		this.idKardex = idKardex;
	}

	public int getCantidad() {
		return this.cantidad;
	}

	public void setCantidad(int cantidad) {
		this.cantidad = cantidad;
	}

	public double getCostoActual() {
		return this.costoActual;
	}

	public void setCostoActual(double costoActual) {
		this.costoActual = costoActual;
	}

	public double getCostoAnterior() {
		return this.costoAnterior;
	}

	public void setCostoAnterior(double costoAnterior) {
		this.costoAnterior = costoAnterior;
	}

	public String getEstado() {
		return this.estado;
	}

	public void setEstado(String estado) {
		this.estado = estado;
	}

	public Date getFechaActuaalizacion() {
		return this.fechaActuaalizacion;
	}

	public void setFechaActuaalizacion(Date fechaActuaalizacion) {
		this.fechaActuaalizacion = fechaActuaalizacion;
	}

	public Date getFechaCreacion() {
		return this.fechaCreacion;
	}

	public void setFechaCreacion(Date fechaCreacion) {
		this.fechaCreacion = fechaCreacion;
	}

	public Date getFechaTransaccion() {
		return this.fechaTransaccion;
	}

	public void setFechaTransaccion(Date fechaTransaccion) {
		this.fechaTransaccion = fechaTransaccion;
	}

	public int getSaldoActual() {
		return this.saldoActual;
	}

	public void setSaldoActual(int saldoActual) {
		this.saldoActual = saldoActual;
	}

	public int getSaldoAnterior() {
		return this.saldoAnterior;
	}

	public void setSaldoAnterior(int saldoAnterior) {
		this.saldoAnterior = saldoAnterior;
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

	public InProducto getInProducto() {
		return this.inProducto;
	}

	public void setInProducto(InProducto inProducto) {
		this.inProducto = inProducto;
	}

	public InTipoMovimiento getInTipoMovimiento() {
		return this.inTipoMovimiento;
	}

	public void setInTipoMovimiento(InTipoMovimiento inTipoMovimiento) {
		this.inTipoMovimiento = inTipoMovimiento;
	}

}