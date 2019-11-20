package com.example.login;

import androidx.appcompat.app.AppCompatActivity;
import com.loopj.android.http.*;

import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import org.json.JSONArray;

import java.util.ArrayList;

import cz.msebera.android.httpclient.Header;

public class spiner extends AppCompatActivity {
    private ListView spProdusctos;
    private EditText etNombre, etCantidad, etDireccion, etCelular ,etFecha,etCedula ,etNombrea ;
    private Button btnAlmacenar;
    private AsyncHttpClient cliente;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_spiner);

        etDireccion = (EditText) findViewById(R.id.etDireccion);

        etCedula = (EditText) findViewById(R.id.etCedula);
        etFecha = (EditText) findViewById(R.id.etFecha);
        etNombre = (EditText) findViewById(R.id.etNombre);
        etNombrea = (EditText) findViewById(R.id.etNombrea);
        etCelular = (EditText) findViewById(R.id.etCelular);
        etCantidad = (EditText) findViewById(R.id.etCantidad);
        btnAlmacenar = (Button) findViewById(R.id.btnAlmacenar);
        cliente = new AsyncHttpClient();
        spProdusctos = (ListView) findViewById(R.id.spProductos);
        botonAlmacenar();
        obtenerProductos();
    }

    private void botonAlmacenar() {
        btnAlmacenar.setOnClickListener(new View.OnClickListener() {
               @Override
            public void onClick(View v) {
                if (etNombrea.getText().toString().isEmpty() || etFecha.getText().toString().isEmpty() || etCedula.getText().toString().isEmpty() || etCelular.getText().toString().isEmpty() || etDireccion.getText().toString().isEmpty() ) {
                    Toast.makeText(spiner.this, "hay campos sin llenar!!", Toast.LENGTH_SHORT).show();
                } else {
                    Producto p = new Producto();
                    p.setNombre(etDireccion.getText().toString());
                    p.setNombre(etCelular.getText().toString());
                    p.setNombre(etNombrea.getText().toString());
                    p.setNombre(etFecha.getText().toString());
                    p.setNombre(etCedula.getText().toString());

                    agregarProducto(p);
                    try {
                        Thread.sleep(2000);
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                    obtenerProductos();
                }

            }
        });
    }

    private void agregarProducto(Producto p) {
        String url = "http://3.19.59.231/ws/pedidos.php?";
        String parametros = "Direccion="+p.getDireccion()+"&Celular="+p.getCelular()+"&Nombrea="+p.getNombrea()+"&Fecha="+p.getFecha()+"&Cedula="+p.getCedula();
        cliente.get(url + parametros, new AsyncHttpResponseHandler() {
            @Override
            public void onSuccess(int statusCode, Header[] headers, byte[] responseBody) {
                if(statusCode == 200){
                    Toast.makeText(spiner.this,"Envio correcto!!",Toast.LENGTH_SHORT).show();

                    etCelular.setText("");
                    etCelular.setText("");
                    etNombrea.setText("");
                    etFecha.setText("");
                    etCedula.setText("");
                }
            }

            @Override
            public void onFailure(int statusCode, Header[] headers, byte[] responseBody, Throwable error) {

            }
        });

    }

//





        private void obtenerProductos(){
        String url = "http://3.19.59.231/ws/obtenerdatos.php";

        try {


        cliente.post(url, new AsyncHttpResponseHandler() {
            @Override
            public void onSuccess(int statusCode, Header[] headers, byte[] responseBody) {
                if(statusCode == 200){
                    listarProductos(new String (responseBody));
                }
            }

            @Override
            public void onFailure(int statusCode, Header[] headers, byte[] responseBody, Throwable error) {

            }
        });

        } catch (Exception e){ System.out.println(e.getMessage());}

    }

    private void  listarProductos(String respuesta){
        final ArrayList <Producto> lista = new ArrayList<Producto>();
        try {
            JSONArray jsonArreglo = new JSONArray(respuesta);
            for(int i=0; i<jsonArreglo.length();i++ ){
                Producto p = new Producto();
                p.setId(jsonArreglo.getJSONObject(i).getInt("id_pro"));
                p.setNombre(jsonArreglo.getJSONObject(i).getString("nom_pro"));
                p.setPrecio(jsonArreglo.getJSONObject(i).getInt("pre_pro"));
                lista.add(p);

            }
            ArrayAdapter<Producto> a = new ArrayAdapter(this,android.R.layout.simple_list_item_1,lista);
            spProdusctos.setAdapter(a);




        }catch (Exception e1){
            e1.printStackTrace();
        }
    }













    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.menuacciones, menu);
        return true;
    }




//acciones botones

    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();

        if (id == R.id.opcion0) {
            Intent onOptionsItemSelected = new Intent(this, ProfileActivity.class);
            startActivity(onOptionsItemSelected);
            return true;
        }else

        if (id == R.id.opcion1) {
            Intent onOptionsItemSelected = new Intent(this, Main2Activity.class);
            startActivity(onOptionsItemSelected);
            return true;
        }else
        if (id == R.id.opcion2) {
            Intent onOptionsItemSelected = new Intent(this, MAPAS.class);
            startActivity(onOptionsItemSelected);
            return true;


        } else
        if (id == R.id.opcion3) {
                Intent onOptionsItemSelected = new Intent(this, cupones.class);
                startActivity(onOptionsItemSelected);
                return true;

        } else
        if (id == R.id.opcion4) {
            Intent onOptionsItemSelected = new Intent(this, acerca.class);
            startActivity(onOptionsItemSelected);
            return true;

        }return super.onOptionsItemSelected(item);

    }



}