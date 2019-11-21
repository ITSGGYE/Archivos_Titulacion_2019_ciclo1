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

public class Lista extends AppCompatActivity implements Response.Listener<JSONObject>,Response.ErrorListener{

    ListView lv;
    User user;
    Intent intent;
    Bundle bundle;
    JSONObject jobj;
    JSONArray jarray;
    RequestQueue request;
    JsonObjectRequest jsr;
    LinkedList<Cita> lista;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lista);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        request = Volley.newRequestQueue(getBaseContext());
        bundle = getIntent().getExtras();
        user = (User) bundle.getSerializable("usuario");
        cargarWebService(user.getId());
        }
    private void cargarWebService(int idu) {
        String url = "https://dablue40.000webhostapp.com/listaCita.php?idu="+idu;
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
                    Cita cita = new Cita();
                    cita.setIdc(jobj.optInt("idc"));
                    cita.setHor(jobj.optInt("hora"));
                    cita.setFec(jobj.optString("fech"));
                    lista.add(cita);
                }
                //Toast.makeText(getBaseContext(), "vamos bien "+lista.get(1).getIdc(), Toast.LENGTH_SHORT).show();
                String fec[]= new String[lista.size()];
                if(lista.size()>0){
                    for (int i = 0;i< lista.size();i++){
                        fec[i]= "F: "+lista.get(i).getFec()+" H: "+lista.get(i).getHor();
                    }
                    lv = findViewById(R.id.listView);
                    ArrayAdapter adapter = new ArrayAdapter<>(this,R.layout.item,R.id.fecha,fec);
                    lv.setAdapter(adapter);
                }else{
                    String vacio[]= {""};
                    lv = findViewById(R.id.listView);
                    ArrayAdapter adapter = new ArrayAdapter<>(this,R.layout.item,R.id.fecha,vacio);
                    lv.setAdapter(adapter);
                }
                //Toast.makeText(getBaseContext(), "vamos bien "+lista.size(), Toast.LENGTH_SHORT).show();
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
}