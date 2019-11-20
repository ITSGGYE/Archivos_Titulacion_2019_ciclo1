package com.example.login;
//principal
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import com.loopj.android.http.*;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import org.json.JSONArray;

import java.util.ArrayList;

import cz.msebera.android.httpclient.Header;

public class Admin extends AppCompatActivity {

    private EditText etNombre, etPrecio, etCantidad;
    private Button btnAlmacenar;
    private ListView lvDatos;
    private AsyncHttpClient cliente;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_admin);

        etNombre = (EditText) findViewById(R.id.etNombre);
        etPrecio = (EditText) findViewById(R.id.etDireccion);
        etCantidad = (EditText) findViewById(R.id.etCantidad);
        btnAlmacenar = (Button) findViewById(R.id.btnAlmacenar);
        lvDatos = (ListView) findViewById(R.id.lvDatos);
        cliente = new AsyncHttpClient();
        botonAlmacenar();
       /* try {
            Thread.sleep(2000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }*/
        obtenerProductos();
    }

    private void botonAlmacenar() {
        btnAlmacenar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (etNombre.getText().toString().isEmpty() || etPrecio.getText().toString().isEmpty() || etCantidad.getText().toString().isEmpty()) {
                    Toast.makeText(Admin.this, "hay campos sin llenar!!", Toast.LENGTH_SHORT).show();
                } else {
                    Producto p = new Producto();
                    p.setNombre(etNombre.getText().toString()/*.replaceAll("","%20")*/);
                    p.setPrecio(Integer.parseInt(etPrecio.getText().toString()));
                    p.setCantidad(Integer.parseInt(etCantidad.getText().toString()));
                    p.setTotal(p.getPrecio() * p.getCantidad());
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
        String url = "http://3.19.59.231/ws/agregar.php?";
        String parametros = "Nombre="+p.getNombre()+"&Precio="+p.getPrecio()+"&Cantidad="+p.getCantidad()+"&Total="+p.getTotal();
        try {
            cliente.get(url + parametros, new AsyncHttpResponseHandler() {
                @Override
                public void onSuccess(int statusCode, Header[] headers, byte[] responseBody) {
                    if (statusCode == 200) {
                        Toast.makeText(Admin.this, "producto agregado correctamente!!", Toast.LENGTH_SHORT).show();
                        etNombre.setText("");
                        etPrecio.setText("");
                        etCantidad.setText("");
                    }
                }

                @Override
                public void onFailure(int statusCode, Header[] headers, byte[] responseBody, Throwable error) {

                }
            });
        }
        catch (Exception e)
        {
            System.out.println(e.getMessage());
        }
    }

    private void obtenerProductos(){
        String url = "http://3.19.59.231/ws/obtenerdatos.php";
        try{
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
        });}catch (Exception e){ System.out.println(e.getMessage());}

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
                p.setCantidad(jsonArreglo.getJSONObject(i).getInt("can_pro"));
                p.setTotal(jsonArreglo.getJSONObject(i).getInt("tot_pro"));
            lista.add(p);

            }
            ArrayAdapter<Producto> a = new ArrayAdapter(this,android.R.layout.simple_list_item_1,lista);
            lvDatos.setAdapter(a);

            lvDatos.setOnItemLongClickListener(new AdapterView.OnItemLongClickListener() {
                @Override
                public boolean onItemLongClick(AdapterView<?> parent, View view, int position, long id) {
                   Producto p = lista.get(position);
                   String url = "http://3.19.59.231/ws/eliminar.php?Id="+p.getId();
                   try {


                   cliente.post(url, new AsyncHttpResponseHandler() {
                       @Override
                       public void onSuccess(int statusCode, Header[] headers, byte[] responseBody) {
                      if(statusCode == 200){Toast.makeText(Admin.this,"Producto eliminado correctamente!!",Toast.LENGTH_SHORT).show();
                          try {
                              Thread.sleep(2000);
                          } catch (InterruptedException e) {
                              e.printStackTrace();
                          }
                      obtenerProductos();

                      }
                       }

                       @Override
                       public void onFailure(int statusCode, Header[] headers, byte[] responseBody, Throwable error) {

                       }
                   });}catch (Exception e){ System.out.println(e.getMessage());}
                    return true;
                }
            });


            lvDatos.setOnItemClickListener(new AdapterView.OnItemClickListener() {
                @Override
                public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                    Producto p = lista.get(position);
                    StringBuffer  b = new StringBuffer();
                    b.append("ID: " + p.getId()+ "\n");
                    b.append("NOMBRE: " + p.getNombre()+ "\n");
                    b.append("PRECIO: $" + p.getPrecio()+ "\n");
                    b.append("CANTIDAD: " + p.getCantidad()+ "\n");
                    b.append("TOTAL: $ " + p.getTotal());

                    AlertDialog.Builder a = new AlertDialog.Builder(Admin.this);
                    a.setCancelable(true);
                    a.setTitle("Detalle");
                    a.setMessage(b.toString());
                    a.setIcon(R.drawable.ok);
                    a.show();
                }
            });
        }catch (Exception e1){
            e1.printStackTrace();
        }
    }


    //metodo menuaccion




    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.menuaccionesadmin, menu);
        return true;
    }

//acciones botones

    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();
        if (id == R.id.home) {
            Intent onOptionsItemSelected = new Intent(this, ProfileActivitya.class);
            startActivity(onOptionsItemSelected);
            return true;

        }return super.onOptionsItemSelected(item);

    }

}