package com.example.veterinaria;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
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

public class MainActivity extends AppCompatActivity implements Response.Listener<JSONObject>,Response.ErrorListener {

    User user;
    Button blini;
    Intent intent;
    Bundle bundle;
    TextView tlusu;
    JSONObject jobj;
    JSONArray jarray;
    EditText edusu,edcon;
    RequestQueue request;
    JsonObjectRequest jsr;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        tlusu = findViewById(R.id.lreg);
        blini = findViewById(R.id.lini);
        edusu = findViewById(R.id.lusu);
        edcon = findViewById(R.id.lcon);
        request = Volley.newRequestQueue(getBaseContext());
        tlusu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent login = new Intent(MainActivity.this,Registro.class);
                MainActivity.this.startActivity(login);
            }
        });
        blini.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                cargarWebService();
            }
        });
    }
    private void cargarWebService() {
        String url = "https://dablue40.000webhostapp.com/login.php?login="+edusu.getText().toString()+"&clave="+edcon.getText().toString();
        jsr = new JsonObjectRequest(Request.Method.GET,url,null,this,this);
        request.add(jsr);
    }
    @Override
    public void onErrorResponse(VolleyError error) {
        Toast.makeText(getBaseContext(), "Error"+error.getMessage(), Toast.LENGTH_SHORT).show();
        Log.i("Error",error.toString());
    }
    @Override
    public void onResponse(JSONObject response) {
        user = new User();
        jarray = response.optJSONArray("usuario");
        try {
            jobj = jarray.getJSONObject(0);
            int posicion = jobj.optInt("valor");
            boolean valor = jobj.optBoolean("success");
            if (valor){
                user.setId(jobj.optInt("id"));
                user.setNombre(jobj.optString("nombre"));
                user.setLogin(jobj.optString("login"));
                user.setClave(jobj.optString("clave"));
                user.setCorreo(jobj.optString("correo"));
                user.setTelefono(jobj.optString("telefono"));
                if(posicion == 1){
                    intent = new Intent(MainActivity.this,Admin.class);
                    bundle = new Bundle();
                    bundle.putSerializable("admin",user);
                    intent.putExtras(bundle);
                    MainActivity.this.startActivity(intent);
                    MainActivity.this.finish();
                }else {
                    intent = new Intent(MainActivity.this,Usuario.class);
                    bundle = new Bundle();
                    bundle.putSerializable("usuario",user);
                    intent.putExtras(bundle);
                    MainActivity.this.startActivity(intent);
                    MainActivity.this.finish();
                }
            }else{
                Toast.makeText(getBaseContext(), "Credenciales Equivocadas", Toast.LENGTH_SHORT).show();
                edusu.setText("");
                edcon.setText("");
            }
        }catch (JSONException e){
            e.printStackTrace();
        }
    }
}

