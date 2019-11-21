package com.example.veterinaria;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
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

public class Usuario extends AppCompatActivity implements Response.Listener<JSONObject>,Response.ErrorListener{

    Intent intent;
    User user,admin;
    JSONObject jobj;
    JSONArray jarray;
    RequestQueue request;
    JsonObjectRequest jsr;
    Bundle bundle,usuario;
    Button uscerrar,usadmin,usmenu,uscancelar,uspromo,usproduc;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_usuario);
        request = Volley.newRequestQueue(getBaseContext());
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        usuario = getIntent().getExtras();
        user = (User)usuario.getSerializable("usuario");
        uscerrar = findViewById(R.id.ucerrar);
        uscerrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                intent = new Intent(Usuario.this,MainActivity.class);
                Usuario.this.startActivity(intent);
                Usuario.this.finish();
            }
        });
        usadmin = findViewById(R.id.uadmin);
        usadmin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                cargarWebService();
            }
        });
        usmenu = findViewById(R.id.uagendar);
        usmenu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                intent = new Intent(Usuario.this,MenuCitas.class);
                bundle = new Bundle();
                bundle.putSerializable("usuario",user);
                intent.putExtras(bundle);
                Usuario.this.startActivity(intent);
            }
        });
        uscancelar = findViewById(R.id.ucancelar);
        uscancelar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                intent = new Intent(Usuario.this,Lista.class);
                bundle = new Bundle();
                bundle.putSerializable("usuario",user);
                intent.putExtras(bundle);
                Usuario.this.startActivity(intent);
            }
        });
        uspromo = findViewById(R.id.uanun);
        uspromo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                intent = new Intent(Usuario.this,ListaAnuncio.class);
                Usuario.this.startActivity(intent);
            }
        });
        usproduc = findViewById(R.id.uaproduc);
        usproduc.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                intent = new Intent(Usuario.this,UsuarioProducto.class);
                Usuario.this.startActivity(intent);
            }
        });
    }

    private void cargarWebService() {
        String url = "https://dablue40.000webhostapp.com/obtenerAdmin.php";
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
        admin = new User();
        jarray = response.optJSONArray("usuario");
        try {
            jobj = jarray.getJSONObject(0);
            admin.setId(jobj.optInt("id"));
            admin.setNombre(jobj.optString("nombre"));
            admin.setCorreo(jobj.optString("correo"));
            admin.setTelefono(jobj.optString("telefono"));
            intent = new Intent(Usuario.this,UsuarioAdmin.class);
            bundle = new Bundle();
            bundle.putSerializable("admin",admin);
            intent.putExtras(bundle);
            Usuario.this.startActivity(intent);
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
}