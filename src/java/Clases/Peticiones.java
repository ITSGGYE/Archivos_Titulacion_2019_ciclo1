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
public class Peticiones {
    
    private int idPeticiones;
    private String mensajePeticion;
    private String usuarioPeticion;
    private String fechaPeticion;

    public Peticiones(int idPeticiones, String mensajePeticion, String usuarioPeticion, String fechaPeticion) {
        this.idPeticiones = idPeticiones;
        this.mensajePeticion = mensajePeticion;
        this.usuarioPeticion = usuarioPeticion;
        this.fechaPeticion = fechaPeticion;
    }

    
    /**
     * @return the idPeticiones
     */
    public int getIdPeticiones() {
        return idPeticiones;
    }

    /**
     * @param idPeticiones the idPeticiones to set
     */
    public void setIdPeticiones(int idPeticiones) {
        this.idPeticiones = idPeticiones;
    }

    /**
     * @return the mensajePeticion
     */
    public String getMensajePeticion() {
        return mensajePeticion;
    }

    /**
     * @param mensajePeticion the mensajePeticion to set
     */
    public void setMensajePeticion(String mensajePeticion) {
        this.mensajePeticion = mensajePeticion;
    }

    /**
     * @return the usuarioPeticion
     */
    public String getUsuarioPeticion() {
        return usuarioPeticion;
    }

    /**
     * @param usuarioPeticion the usuarioPeticion to set
     */
    public void setUsuarioPeticion(String usuarioPeticion) {
        this.usuarioPeticion = usuarioPeticion;
    }

    /**
     * @return the fechaPeticion
     */
    public String getFechaPeticion() {
        return fechaPeticion;
    }

    /**
     * @param fechaPeticion the fechaPeticion to set
     */
    public void setFechaPeticion(String fechaPeticion) {
        this.fechaPeticion = fechaPeticion;
    }
    
   
    
    
}
