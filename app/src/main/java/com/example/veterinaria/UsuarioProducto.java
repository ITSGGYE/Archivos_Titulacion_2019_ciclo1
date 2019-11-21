package com.example.veterinaria;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.util.Log;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.LinkedList;

public class UsuarioProducto extends AppCompatActivity implements Response.Listener<JSONObject>,Response.ErrorListener{

    ListView lv;
    JSONObject jobj;
    JSONArray jarray;
    RequestQueue request;
    JsonObjectRequest jsr;
    LinkedList<Objeto> lista;
    ItemCompraAdapter adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_usuario_producto);
        request = Volley.newRequestQueue(getBaseContext());
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        cargarWebService();
    }

    private void cargarWebService() {
        String url = "https://dablue40.000webhostapp.com/listaProductos.php";
        jsr = new JsonObjectRequest(Request.Method.GET,url,null,this,this);
        request.add(jsr);
    }

    @Override
    public void onErrorResponse(VolleyError error) {
        Toast.makeText(getBaseContext(), "Error"+error.toString(), Toast.LENGTH_SHORT).show();
        Log.i("Error",error.toString());
    }

    @Override
    public void onResponse(JSONObject response) {
        lv = findViewById(R.id.listaProducto);
        lista = new LinkedList<>();
        boolean validador = false;
        int valor = 0;
        jarray = response.optJSONArray("consulta");
        try {
            jobj = jarray.getJSONObject(0);
            validador = jobj.optBoolean("success");
            valor = jobj.optInt("cantidad");
            if (validador){
                for (int i = 0;i< valor;i++){
                    jobj = jarray.getJSONObject(i);
                    Objeto cita = new Objeto();
                    cita.setNombre(jobj.optString("nom"));
                    cita.setDecrip(jobj.optString("des"));
                    lista.add(cita);
                }
                int img[] = new int[lista.size()];
                String nom[]= new String[lista.size()];
                String des[]= new String[lista.size()];
                if(lista.size()>0){
                    for (int i = 0;i< lista.size();i++){
                        nom[i] = ""+lista.get(i).getNombre();
                        des[i] = ""+lista.get(i).getDecrip();
                        img[i] = R.drawable.tienda;
                    }
                    adapter = new ItemCompraAdapter(this,img,nom,des);
                    lv.setAdapter(adapter);
                }else{
                    int imgv[] = {R.drawable.tienda};
                    String nomv[]= {""};
                    String desv[]= {""};
                    adapter = new ItemCompraAdapter(this,imgv,nomv,desv);
                    lv.setAdapter(adapter);
                }
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
}