package com.example.veterinaria;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

public class CrearProducto extends AppCompatActivity implements Response.Listener<JSONObject>,Response.ErrorListener{

    Intent intent;
    Bitmap bitmap;
    //String imagene;
    //ImageView imagen;
    EditText nom,des;
    Button crear/*,cargar*/;
    RequestQueue request;
    JsonObjectRequest jsr;
    StringRequest stringRequest;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_crear_producto);
        request = Volley.newRequestQueue(getBaseContext());
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        nom = findViewById(R.id.nPro);
        des = findViewById(R.id.dPro);
        /*imagen = findViewById(R.id.cargarImg);
        cargar = findViewById(R.id.subirImg);
        cargar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                cargarImagen();
            }
        });*/
        crear = findViewById(R.id.crearPro);
        crear.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                cargarWebService();
            }
        });

    }
    private void cargarWebService() {
        String nombre = nom.getText().toString();
        String descrip = des.getText().toString();
        String url = "https://dablue40.000webhostapp.com/registroProducto.php?nom="+nombre+"&des="+descrip;
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
        Toast.makeText(getBaseContext(), "Se registro Correctamente", Toast.LENGTH_SHORT).show();
        CrearProducto.this.finish();
    }
    /*private void cargarImagen() {
       intent = new Intent(Intent.ACTION_PICK, MediaStore.Images.Media.EXTERNAL_CONTENT_URI);
       intent.setType("image/");
       startActivityForResult(intent.createChooser(intent,"Seleccione la ubicacion"),10);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (resultCode == RESULT_OK){
            Uri path = data.getData();
            imagen.setImageURI(path);
            try {
                bitmap = MediaStore.Images.Media.getBitmap(this.getContentResolver(),path);
                imagen.setImageBitmap(bitmap);
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }

    private String convertirString(Bitmap bitmap) {
        ByteArrayOutputStream array = new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.JPEG,100,array);
        byte[] imagenByte = array.toByteArray();
        String imagenString = Base64.encodeToString(imagenByte,Base64.DEFAULT);
        return imagenString;
    }*/
    /*
    private void cargarWebService() {
        String url = "https://dablue40.000webhostapp.com/registroProducto.php?";
        stringRequest = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Toast.makeText(getBaseContext(), "Se Registro Correctamente", Toast.LENGTH_SHORT).show();
                CrearProducto.this.finish();
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getBaseContext(), "No se ha podido conectar", Toast.LENGTH_SHORT).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                String nombre = nom.getText().toString();
                String descrip = des.getText().toString();
                String nombreImagen = nombre.replace(' ','_');
                imagene = convertirString(bitmap);
                Map<String,String> parametros = new HashMap<>();
                parametros.put("nom",nombre);
                parametros.put("des",descrip);
                parametros.put("nomi",nombreImagen);
                parametros.put("img",imagene);
                return parametros;
            }
        };
        request.add(stringRequest);
    }*/
}
