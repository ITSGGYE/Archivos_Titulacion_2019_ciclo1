package com.example.login;
//esto es una clase
public class Producto {

    private int id;
    private String nombre;
    private String direccion;
    private int celular;
    private String fecha;
    private String nombrea;
    private int cedula;
    private int precio;
    private int cantidad;
    private int total;

    public Producto() {
    }


    public Producto(int id , String nombre, int precio , int cantidad , int total ,String direccion, int celular,String fecha, String nombrea, int cedula) {
        this.id = id;
        this.nombre = nombre;
        this.precio = precio;
        this.cantidad = cantidad;
        this.total = total;
        this.direccion = direccion;
        this.celular = celular;
        this.fecha = fecha;
        this.nombrea = nombrea;
        this.cedula = cedula;

    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }


    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public int getPrecio() {
        return precio;
    }

    public void setPrecio(int precio) {
        this.precio = precio;
    }

    public int getCantidad() {
        return cantidad;
    }

    public void setCantidad(int cantidad) {
        this.cantidad = cantidad;
    }

    public int getTotal() {
        return total;
    }

    public void setTotal(int total) {
        this.total = total;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }


    public int getCelular() {
        return celular;
    }

    public void setCelular(int celular) {
        this.celular = celular;
    }


    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }


    public String getNombrea() {
        return nombrea;
    }

    public void setNombrea(String nombrea) {
        this.nombrea = nombrea;
    }

    public int getCedula() {
        return cedula;
    }

    public void setCedula(int cedula) {
        this.cedula = cedula;
    }


    @Override
    public String toString() {
        return nombre ;

    }

    }





