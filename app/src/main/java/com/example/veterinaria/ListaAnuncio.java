package com.example.veterinaria;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
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

public class ListaAnuncio extends AppCompatActivity implements Response.Listener<JSONObject>,Response.ErrorListener{

    ListView lv;
    Intent intent;
    Bundle bundle;
    JSONObject jobj;
    JSONArray jarray;
    RequestQueue request;
    JsonObjectRequest jsr;
    LinkedList<Promo> lista;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lista_anuncio);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        request = Volley.newRequestQueue(getBaseContext());
        cargarWebService();
    }
    private void cargarWebService() {
        String url = "https://dablue40.000webhostapp.com/listaAnuncio.php";
        jsr = new JsonObjectRequest(Request.Method.GET,url,null,this,this);
        request.add(jsr);
    }
    @Override
    public void onErrorResponse(VolleyError error) {
        Toast.makeText(getBaseContext(), "Error "+error.toString(), Toast.LENGTH_SHORT).show();
        Log.i("Error ",error.toString());
    }
    @Override
    public void onResponse(JSONObject response) {
        lista = new LinkedList<>();
        boolean validador = false;
        int valor = 0;
        jarray = response.optJSONArray("consulta");
        //Toast.makeText(getBaseContext(), "vamos bien "+response.length(), Toast.LENGTH_SHORT).show();
        try {
            jobj = jarray.getJSONObject(0);
            validador = jobj.optBoolean("success");
            valor = jobj.optInt("cantidad");
            if (validador){
                for (int i = 0;i< valor;i++){
                    jobj = jarray.getJSONObject(i);
                    Promo cita = new Promo();
                    cita.setAnuncio(jobj.optString("escrito"));
                    lista.add(cita);
                }
                String fec[]= new String[lista.size()];
                if(lista.size()>0){
                    for (int i = 0;i< lista.size();i++){
                        fec[i]= ""+lista.get(i).getAnuncio();
                    }
                    lv = findViewById(R.id.listAnuncio);
                    ArrayAdapter adapter = new ArrayAdapter<>(this,R.layout.cita,R.id.textAnun,fec);
                    lv.setAdapter(adapter);
                }else{
                    String vacio[]= {""};
                    lv = findViewById(R.id.listAnuncio);
                    ArrayAdapter adapter = new ArrayAdapter<>(this,R.layout.cita,R.id.textAnun,vacio);
                    lv.setAdapter(adapter);
                }
                //Toast.makeText(getBaseContext(), "vamos bien "+lista.size(), Toast.LENGTH_SHORT).show();
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
}
