package com.example.login;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.ListView;

import com.loopj.android.http.AsyncHttpClient;
import com.loopj.android.http.AsyncHttpResponseHandler;

import org.json.JSONArray;

import java.util.ArrayList;

import cz.msebera.android.httpclient.Header;

public class lista_productos extends AppCompatActivity {

    private ListView spProdusctos;
    private EditText etNombre, etPrecio ;
    private AsyncHttpClient cliente;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lista_productos);
        etNombre = (EditText) findViewById(R.id.etNombre);
        etPrecio = (EditText) findViewById(R.id.etDireccion);
        cliente = new AsyncHttpClient();
        spProdusctos = (ListView) findViewById(R.id.spProductos);

        obtenerProductos();
    }

    private void obtenerProductos(){
        String url = "http://3.19.59.231/ws/obtenerdatos.php";
        try {
            cliente.post(url, new AsyncHttpResponseHandler() {
                @Override
                public void onSuccess(int statusCode, Header[] headers, byte[] responseBody) {
                    if (statusCode == 200) {
                        listarProductos(new String(responseBody));
                    }
                }

                @Override
                public void onFailure(int statusCode, Header[] headers, byte[] responseBody, Throwable error) {

                }
            });
        }catch (Exception e){ System.out.println(e.getMessage());}
    }

    private void  listarProductos(String respuesta){
        final ArrayList<Producto> lista = new ArrayList<Producto>();
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