package com.example.veterinaria;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.Volley;
import com.android.volley.toolbox.JsonObjectRequest;
import org.json.JSONObject;

public class Registro extends AppCompatActivity implements Response.Listener<JSONObject>,Response.ErrorListener{

    EditText rnom,rusu,rcon,rtel,rcor;
    Button rreg;
    RequestQueue request;
    JsonObjectRequest jsr;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registro);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        rnom = findViewById(R.id.rnom);
        rusu = findViewById(R.id.rusu);
        rcon = findViewById(R.id.rcon);
        rtel = findViewById(R.id.rtel);
        rcor = findViewById(R.id.rcor);
        request = Volley.newRequestQueue(getBaseContext());
        rreg = findViewById(R.id.rreg);
        rreg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                cargarWebService();
            }
        });
    }
    private void cargarWebService() {
        String url = "https://dablue40.000webhostapp.com/registro.php?nombre="+rnom.getText().toString()+"&login="+rusu.getText().toString()+"&clave="+rcon.getText().toString()+"&correo="+rcor.getText().toString()+"&telefono="+rtel.getText().toString();
        jsr = new JsonObjectRequest(Request.Method.GET,url,null,this,this);
        request.add(jsr);
    }
    @Override
    public void onErrorResponse(VolleyError error) {
        Toast.makeText(getBaseContext(), error.toString(), Toast.LENGTH_SHORT).show();
        Log.i("Error",error.toString());
    }
    @Override
    public void onResponse(JSONObject response) {
        Toast.makeText(getBaseContext(), "Se registro correctamente", Toast.LENGTH_SHORT).show();
        Intent inta = new Intent(Registro.this,MainActivity.class);
        Registro.this.startActivity(inta);
        Registro.this.finish();
    }
}