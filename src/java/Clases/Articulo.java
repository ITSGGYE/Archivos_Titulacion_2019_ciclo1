/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Clases;

/**
 *
 * @author Ivan Mata
 */
public class Articulo {
    
    private int idproducto;
    private int cantidad;
    private String nombreproducto;
    private double precioproducto;

    public Articulo(int idproducto, int cantidad, String nombreproducto, double precioproducto) {
        this.idproducto = idproducto;
        this.cantidad = cantidad;
        this.nombreproducto = nombreproducto;
        this.precioproducto = precioproducto;
    }

    
    
    /**
     * @return the idproducto
     */
    public int getIdproducto() {
        return idproducto;
    }

    /**
     * @param idproducto the idproducto to set
     */
    public void setIdproducto(int idproducto) {
        this.idproducto = idproducto;
    }

    /**
     * @return the cantidad
     */
    public int getCantidad() {
        return cantidad;
    }

    /**
     * @param cantidad the cantidad to set
     */
    public void setCantidad(int cantidad) {
        this.cantidad = cantidad;
    }

    /**
     * @return the nombreproducto
     */
    public String getNombreproducto() {
        return nombreproducto;
    }

    /**
     * @param nombreproducto the nombreproducto to set
     */
    public void setNombreproducto(String nombreproducto) {
        this.nombreproducto = nombreproducto;
    }

    /**
     * @return the precioproducto
     */
    public double getPrecioproducto() {
        return precioproducto;
    }

    /**
     * @param precioproducto the precioproducto to set
     */
    public void setPrecioproducto(double precioproducto) {
        this.precioproducto = precioproducto;
    }
    
    
    
}
