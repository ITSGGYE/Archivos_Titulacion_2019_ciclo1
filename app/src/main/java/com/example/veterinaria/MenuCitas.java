package com.example.veterinaria;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

public class MenuCitas extends AppCompatActivity {

    User user;
    Intent intent;
    Bundle bundle;
    RequestQueue request;
    Button consulta,bano,pelu;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_citas);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        request = Volley.newRequestQueue(getBaseContext());
        bundle = getIntent().getExtras();
        user = (User) bundle.getSerializable("usuario");
        consulta = findViewById(R.id.mcconsulta);
        consulta.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                intent = new Intent(MenuCitas.this,MenuConsulta.class);
                bundle = new Bundle();
                bundle.putSerializable("usuario",user);
                intent.putExtras(bundle);
                MenuCitas.this.startActivity(intent);
            }
        });
        bano = findViewById(R.id.mcbaño);
        bano.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                intent = new Intent(MenuCitas.this,MenuBano.class);
                bundle = new Bundle();
                bundle.putSerializable("usuario",user);
                intent.putExtras(bundle);
                MenuCitas.this.startActivity(intent);
            }
        });
        pelu = findViewById(R.id.mcpelu);
        pelu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                intent = new Intent(MenuCitas.this,MenuPeluqueria.class);
                bundle = new Bundle();
                bundle.putSerializable("usuario",user);
                intent.putExtras(bundle);
                MenuCitas.this.startActivity(intent);
            }
        });
    }
}