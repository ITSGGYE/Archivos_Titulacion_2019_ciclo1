package com.example.login;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.loopj.android.http.AsyncHttpResponseHandler;

import org.json.JSONArray;

import java.util.ArrayList;
import java.util.List;

import cz.msebera.android.httpclient.Header;

public class Main2Activity extends AppCompatActivity {

    TextView tvCantProductos;
    Button btnVerCarro;
    RecyclerView rvListaProductos;
    AdaptadorProductos adaptador;

    List<Productop> listaProductos = new ArrayList<>();
    List<Productop> carroCompras = new ArrayList<>();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);
        getSupportActionBar().hide();

        tvCantProductos = findViewById(R.id.tvCantProductos);
        btnVerCarro = findViewById(R.id.btnVerCarro);
        rvListaProductos = findViewById(R.id.rvListaProductos);
        rvListaProductos.setLayoutManager(new GridLayoutManager(Main2Activity.this, 1));

        listaProductos.add(new Productop("1", "COMBO 1 Empanada de queso", "Empanada de queso y una coca cola ", 2.00));
        listaProductos.add(new Productop("2", "COMBO 2 Empanada de carne", "Empanada de carne y una inca cola", 3.00));
        listaProductos.add(new Productop("4", "COMBO 3 Empanada de pollo", "Empanada de pollo y jugo natural", 2.75));
        listaProductos.add(new Productop("5", "COMBO 4 Empanada de cangrejo", "Empanada de cangrejo y cafe refill", 3.00));
        listaProductos.add(new Productop("6", "COMBO 5 Corviche de albacora", "Corviche de albacora o mixto y cafe", 3.00));
        listaProductos.add(new Productop("7", "COMBO 6 Corviche de camaron", "Corviche de camaron y cafe negro", 3.00));
        listaProductos.add(new Productop("8", "COMBO 7 Empanada de quezo mozarella", "Empanada de quezo mozarella y coca cola", 3.00));
        listaProductos.add(new Productop("9", "Botella dasani", "Botella dasani mediana", 1.50));
        listaProductos.add(new Productop("10", "Botella Cocacola", "Botella Cocacola mediana", 175));



        adaptador = new AdaptadorProductos(Main2Activity.this, tvCantProductos, btnVerCarro, listaProductos, carroCompras);
        rvListaProductos.setAdapter(adaptador);

    }


}
