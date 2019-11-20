package com.example.login;


import java.io.Serializable;

public class Productop implements Serializable {
    String idProducto;
    String nomProducto;
    String descripcion;
    double precio;


    public Productop(String idProducto, String nomProducto, String descripcion, double precio) {
        this.idProducto = idProducto;
        this.nomProducto = nomProducto;
        this.descripcion = descripcion;
        this.precio = precio;

    }

    public String getIdProducto() {
        return idProducto;
    }

    public void setIdProducto(String idProducto) {
        this.idProducto = idProducto;
    }

    public String getNomProducto() {
        return nomProducto;
    }

    public void setNomProducto(String nomProducto) {
        this.nomProducto = nomProducto;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }

    @Override
    public String toString() {
        return nomProducto ;

    }


}
