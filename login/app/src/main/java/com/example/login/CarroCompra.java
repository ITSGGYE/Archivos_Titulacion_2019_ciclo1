package com.example.login;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.util.List;

public class CarroCompra extends AppCompatActivity {


    List<Productop> carroCompras;

    AdaptadorCarroCompras adaptador;

    RecyclerView rvListaCarro;
    TextView tvTotal;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_carro_compra);
        getSupportActionBar().hide();

        carroCompras = (List<Productop>) getIntent().getSerializableExtra("CarroCompras");

        rvListaCarro = findViewById(R.id.rvListaCarro);
        rvListaCarro.setLayoutManager(new GridLayoutManager(CarroCompra.this, 1));
        tvTotal = findViewById(R.id.tvTotal);

        adaptador = new AdaptadorCarroCompras(CarroCompra.this, carroCompras, tvTotal);
        rvListaCarro.setAdapter(adaptador);

    }


    public void pedir(View View) {

        Toast.makeText(getApplicationContext(), "opcion no disponible tu ubicacion es muy lejos.", Toast.LENGTH_SHORT).show();

        Intent p = new Intent(this, lista_productos.class);
        startActivity(p);
    }
}