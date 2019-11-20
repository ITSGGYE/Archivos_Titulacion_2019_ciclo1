package ec.com.agripublic.util;

public class ValidarIdentificacionUtil {
	
	
	
	
	@SuppressWarnings("unused")
	public static boolean validadarCedula(String cedula) {
		boolean cedulaCorrecta = false;

		try {

		if (cedula.length() == 10) // ConstantesApp.LongitudCedula
		{
		int tercerDigito = Integer.parseInt(cedula.substring(2, 3));
		if (tercerDigito < 6) {
		// Coeficientes de validación cédula
		// El decimo digito se lo considera dígito verificador
		 int[] coefValCedula = { 2, 1, 2, 1, 2, 1, 2, 1, 2 };
		 int verificador = Integer.parseInt(cedula.substring(9,10));
		 int suma = 0;
		 int digito = 0;
		for (int i = 0; i < (cedula.length() - 1); i++) {
		 digito = Integer.parseInt(cedula.substring(i, i + 1))* coefValCedula[i];
		 suma += ((digito % 10) + (digito / 10));
		}

		if ((suma % 10 == 0) && (suma % 10 == verificador)) {
		 cedulaCorrecta = true;
		}
		else if ((10 - (suma % 10)) == verificador) {
		 cedulaCorrecta = true;
		} else {
		 cedulaCorrecta = false;
		}
		} else {
		cedulaCorrecta = false;
		}
		} else {
		cedulaCorrecta = false;
		}
		} catch (NumberFormatException nfe) {
		cedulaCorrecta = false;
		} catch (Exception err) {
		System.out.println("Una excepcion ocurrio en el proceso de validadcion");
		cedulaCorrecta = false;
		}

		if (!cedulaCorrecta) {
		System.out.println("La Cédula ingresada es Incorrecta");
		}
		return cedulaCorrecta;
		}
	
	
	
	private static final int NUM_PROVINCIAS = 24;
	// public static String rucPrueba = "1790011674001";
	private static int[] coeficientes = { 4, 3, 2, 7, 6, 5, 4, 3, 2 };
	private static int constante = 11;
	
	
	
	public static boolean validarRUC(String ruc) {
		boolean resp_dato = false;
		final int prov = Integer.parseInt(ruc.substring(0, 2));
		if (!((prov <= 0) && (prov >= NUM_PROVINCIAS))) {
			resp_dato = false;
		}
 
		int[] d = new int[10];
		int suma = 0;
 
		for (int i = 0; i <= d.length; i++) {
			d[i] = Integer.parseInt(ruc.charAt(i) + "");
		}
 
		for (int i = 0; i <= d.length - 1; i++) {
			d[i] = d[i] * coeficientes[i];
			suma += d[i];
		}
 
		int aux, resp;
 
		aux = suma % constante;
		resp = constante - aux;
 
		resp = (aux == 0) ? 0 : resp;
 
		if (resp == d[9]) {
			resp_dato = true;
		} else {
			resp_dato = false;
		}
		return resp_dato;
	}

}
