package com.example.veterinaria;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class Admin extends AppCompatActivity {

    User admin;
    Bundle bundle;
    Bundle adminRecibido;
    Button adadm,adcerrar;
    EditText adnom,adlog,adcor,adtel;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_admin);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        adminRecibido = getIntent().getExtras();
        admin = (User) adminRecibido.getSerializable("admin");
        adnom = findViewById(R.id.anom);
        adlog = findViewById(R.id.alog);
        adcor = findViewById(R.id.acor);
        adtel = findViewById(R.id.atel);
        adnom.setText(admin.getNombre());
        adlog.setText(admin.getLogin());
        adcor.setText(admin.getCorreo());
        adtel.setText(admin.getTelefono());
        adadm = findViewById(R.id.adact);
        adadm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intb = new Intent(Admin.this,Administar.class);
                bundle = new Bundle();
                bundle.putSerializable("admin",admin);
                intb.putExtras(bundle);
                Admin.this.startActivity(intb);
            }
        });

        adcerrar = findViewById(R.id.adcerrar);
        adcerrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intb = new Intent(Admin.this,MainActivity.class);
                Admin.this.startActivity(intb);
                Admin.this.finish();
            }
        });

    }
}
