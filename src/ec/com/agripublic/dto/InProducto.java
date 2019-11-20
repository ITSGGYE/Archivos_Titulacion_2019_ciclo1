package ec.com.agripublic.dto;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the in_producto database table.
 * 
 */
@Entity
@Table(name="in_producto")
@NamedQuery(name="InProducto.findAll", query="SELECT i FROM InProducto i")
public class InProducto implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_producto")
	private int idProducto;

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

	//bi-directional many-to-one association to DetalleFactura
	@OneToMany(mappedBy="inProducto")
	private List<DetalleFactura> detalleFacturas;

	//bi-directional many-to-one association to InKardex
	@OneToMany(mappedBy="inProducto")
	private List<InKardex> inKardexs;

	//bi-directional many-to-one association to InMedida
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_medida")
	private InMedida inMedida;

	//bi-directional many-to-one association to InTipoProducto
	@ManyToOne(fetch=FetchType.LAZY)
	@JoinColumn(name="id_tipo_producto")
	private InTipoProducto inTipoProducto;

	//bi-directional many-to-one association to InTarifario
	@OneToMany(mappedBy="inProducto")
	private List<InTarifario> inTarifarios;

	//bi-directional many-to-one association to PrDetalleFormula
	@OneToMany(mappedBy="inProducto")
	private List<PrDetalleFormula> prDetalleFormulas;

	//bi-directional many-to-one association to PrFormula
	@OneToMany(mappedBy="inProducto")
	private List<PrFormula> prFormulas;
	
	

	public InProducto() {
	}

	
	
	
	public int getIdProducto() {
		return this.idProducto;
	}

	public void setIdProducto(int idProducto) {
		this.idProducto = idProducto;
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

	public List<DetalleFactura> getDetalleFacturas() {
		return this.detalleFacturas;
	}

	public void setDetalleFacturas(List<DetalleFactura> detalleFacturas) {
		this.detalleFacturas = detalleFacturas;
	}

	public DetalleFactura addDetalleFactura(DetalleFactura detalleFactura) {
		getDetalleFacturas().add(detalleFactura);
		detalleFactura.setInProducto(this);

		return detalleFactura;
	}

	public DetalleFactura removeDetalleFactura(DetalleFactura detalleFactura) {
		getDetalleFacturas().remove(detalleFactura);
		detalleFactura.setInProducto(null);

		return detalleFactura;
	}

	public List<InKardex> getInKardexs() {
		return this.inKardexs;
	}

	public void setInKardexs(List<InKardex> inKardexs) {
		this.inKardexs = inKardexs;
	}

	public InKardex addInKardex(InKardex inKardex) {
		getInKardexs().add(inKardex);
		inKardex.setInProducto(this);

		return inKardex;
	}

	public InKardex removeInKardex(InKardex inKardex) {
		getInKardexs().remove(inKardex);
		inKardex.setInProducto(null);

		return inKardex;
	}

	public InMedida getInMedida() {
		return this.inMedida;
	}

	public void setInMedida(InMedida inMedida) {
		this.inMedida = inMedida;
	}

	public InTipoProducto getInTipoProducto() {
		return this.inTipoProducto;
	}

	public void setInTipoProducto(InTipoProducto inTipoProducto) {
		this.inTipoProducto = inTipoProducto;
	}

	public List<InTarifario> getInTarifarios() {
		return this.inTarifarios;
	}

	public void setInTarifarios(List<InTarifario> inTarifarios) {
		this.inTarifarios = inTarifarios;
	}

	public InTarifario addInTarifario(InTarifario inTarifario) {
		getInTarifarios().add(inTarifario);
		inTarifario.setInProducto(this);

		return inTarifario;
	}

	public InTarifario removeInTarifario(InTarifario inTarifario) {
		getInTarifarios().remove(inTarifario);
		inTarifario.setInProducto(null);

		return inTarifario;
	}

	public List<PrDetalleFormula> getPrDetalleFormulas() {
		return this.prDetalleFormulas;
	}

	public void setPrDetalleFormulas(List<PrDetalleFormula> prDetalleFormulas) {
		this.prDetalleFormulas = prDetalleFormulas;
	}

	public PrDetalleFormula addPrDetalleFormula(PrDetalleFormula prDetalleFormula) {
		getPrDetalleFormulas().add(prDetalleFormula);
		prDetalleFormula.setInProducto(this);

		return prDetalleFormula;
	}

	public PrDetalleFormula removePrDetalleFormula(PrDetalleFormula prDetalleFormula) {
		getPrDetalleFormulas().remove(prDetalleFormula);
		prDetalleFormula.setInProducto(null);

		return prDetalleFormula;
	}

	public List<PrFormula> getPrFormulas() {
		return this.prFormulas;
	}

	public void setPrFormulas(List<PrFormula> prFormulas) {
		this.prFormulas = prFormulas;
	}

	public PrFormula addPrFormula(PrFormula prFormula) {
		getPrFormulas().add(prFormula);
		prFormula.setInProducto(this);

		return prFormula;
	}

	public PrFormula removePrFormula(PrFormula prFormula) {
		getPrFormulas().remove(prFormula);
		prFormula.setInProducto(null);

		return prFormula;
	}

	

}