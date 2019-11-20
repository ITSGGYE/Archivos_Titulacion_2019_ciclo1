package com.example.login;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;

public class acerca extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_acerca);


    }

    public void  acepto( View View){
        Intent aceptar = new Intent(this,catalogo.class);
        startActivity(aceptar);
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
