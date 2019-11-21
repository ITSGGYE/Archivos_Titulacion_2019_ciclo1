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
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class AdminEdit extends AppCompatActivity implements Response.Listener<JSONObject>,Response.ErrorListener{

    int id;
    User admin;
    Intent inta;
    Button adgur;
    Bundle bundle;
    JSONObject jobja;
    JSONArray jarray;
    RequestQueue request;
    Bundle adminRecibido;
    JsonObjectRequest jsr;
    EditText adnom,adlog,adcla,adcor,adtel;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_admin_edit);
        adminRecibido = getIntent().getExtras();
        admin = (User) adminRecibido.getSerializable("admin");
        adnom = findViewById(R.id.anom);
        adlog = findViewById(R.id.alog);
        adcla = findViewById(R.id.acla);
        adcor = findViewById(R.id.acor);
        adtel = findViewById(R.id.atel);
        id = admin.getId();
        adnom.setText(admin.getNombre());
        adlog.setText(admin.getLogin());
        adcla.setText(admin.getClave());
        adcor.setText(admin.getCorreo());
        adtel.setText(admin.getTelefono());
        adgur = findViewById(R.id.adgua);
        request = Volley.newRequestQueue(getBaseContext());
        adgur.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                cargarWebService();
            }
        });
    }
    private void cargarWebService() {
        String url = "https://dablue40.000webhostapp.com/adminEdit.php?nombre="+adnom.getText().toString()+"&login="+adlog.getText().toString()+"&clave="+adcla.getText().toString()+"&correo="+adcor.getText().toString()+"&telefono="+adtel.getText().toString()+"&id="+id;
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
        try {
            admin = new User();
            jarray = response.optJSONArray("usuario");
            jobja = jarray.getJSONObject(0);
            admin.setId(jobja.optInt("id"));
            admin.setNombre(jobja.optString("nombre"));
            admin.setLogin(jobja.optString("login"));
            admin.setClave(jobja.optString("clave"));
            admin.setCorreo(jobja.optString("correo"));
            admin.setTelefono(jobja.optString("telefono"));
            bundle = new Bundle();
            bundle.putSerializable("admin",admin);
            Toast.makeText(getBaseContext(), "Se actualizado correctamente", Toast.LENGTH_SHORT).show();
            inta = new Intent(AdminEdit.this,Admin.class);
            inta.putExtras(bundle);
            AdminEdit.this.startActivity(inta);
            AdminEdit.this.finish();
        }catch (JSONException e){
            e.printStackTrace();
        }
    }
}