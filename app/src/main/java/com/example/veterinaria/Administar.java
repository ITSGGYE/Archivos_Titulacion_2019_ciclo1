package com.example.veterinaria;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class Administar extends AppCompatActivity {

    User admin;
    Intent intb;
    Bundle bundle;
    Bundle adminRecibido;
    Button adedi,adlis,adanun,adlisa,adcrear,adlisp;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_administar);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        adminRecibido = getIntent().getExtras();
        admin = (User) adminRecibido.getSerializable("admin");
        adedi = findViewById(R.id.aedit);
        adedi.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                intb = new Intent(Administar.this,AdminEdit.class);
                bundle = new Bundle();
                bundle.putSerializable("admin",admin);
                intb.putExtras(bundle);
                Administar.this.startActivity(intb);
            }
        });
        adlis = findViewById(R.id.alista);
        adlis.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                intb = new Intent(Administar.this,CitaProgramada.class);
                Administar.this.startActivity(intb);
            }
        });
        adanun = findViewById(R.id.aprogramar);
        adanun.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                intb = new Intent(Administar.this,Anuncio.class);
                Administar.this.startActivity(intb);
            }
        });
        adlisa = findViewById(R.id.alprogramar);
        adlisa.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                intb = new Intent(Administar.this,ListaAnuncio.class);
                Administar.this.startActivity(intb);
            }
        });
        adcrear = findViewById(R.id.cprod);
        adcrear.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                intb = new Intent(Administar.this,CrearProducto.class);
                Administar.this.startActivity(intb);
            }
        });
        adlisp = findViewById(R.id.lprod);
        adlisp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                intb = new Intent(Administar.this,UsuarioProducto.class);
                Administar.this.startActivity(intb);
            }
        });
    }
}
