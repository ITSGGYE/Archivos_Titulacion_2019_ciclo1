package com.example.veterinaria;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class UsuarioAdmin extends AppCompatActivity {

    User admin;
    Intent intent;
    Bundle bundle;
    TextView unom,ucor,utel;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_usuario_admin);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        bundle = getIntent().getExtras();
        admin = (User) bundle.getSerializable("admin");
        unom = findViewById(R.id.uanom);
        ucor = findViewById(R.id.uacor);
        utel = findViewById(R.id.uatel);
        unom.setText("Lcdo. "+admin.getNombre());
        ucor.setText("Correo "+admin.getCorreo());
        utel.setText("Telefono "+admin.getTelefono());
    }
}
