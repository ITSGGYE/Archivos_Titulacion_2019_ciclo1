package com.example.login;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;

public class MAPAS extends AppCompatActivity {

    Button btn_sauces , btn_alborada;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mapas);


        btn_alborada = (Button)findViewById(R.id.btn_alborada);
        btn_sauces =(Button) findViewById(R.id.btn_sauces);

        btn_alborada.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getApplicationContext(),MapsActivity2.class);
                startActivity(intent);
            }
        });

        btn_sauces.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getApplicationContext(),MapsActivity.class);
                startActivity(intent);

            }
        });

    }

    public void  catalogo ( View View){
        Intent catalogo = new Intent(this,spiner.class);
        startActivity(catalogo);
    }



    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.menuacciones, menu);
        return true;
    }

//acciones botones

    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();

        if (id == R.id.opcion0) {
            Intent onOptionsItemSelected = new Intent(this, ProfileActivity.class);
            startActivity(onOptionsItemSelected);
            return true;
        }else

        if (id == R.id.opcion1) {
            Intent onOptionsItemSelected = new Intent(this, Main2Activity.class);
            startActivity(onOptionsItemSelected);
            return true;
        }else
        if (id == R.id.opcion2) {
            Intent onOptionsItemSelected = new Intent(this, MAPAS.class);
            startActivity(onOptionsItemSelected);
            return true;


        } else
        if (id == R.id.opcion3) {
             Intent onOptionsItemSelected = new Intent(this, cupones.class);
                startActivity(onOptionsItemSelected);
                return true;

        } else
        if (id == R.id.opcion4) {
            Intent onOptionsItemSelected = new Intent(this, acerca.class);
            startActivity(onOptionsItemSelected);
            return true;

        }return super.onOptionsItemSelected(item);

    }


}
