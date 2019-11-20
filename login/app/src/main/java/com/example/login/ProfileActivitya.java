package com.example.login;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

public class ProfileActivitya extends AppCompatActivity {

    TextView textViewId, textViewUsername, textViewEmail;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile_activitya);
        init();
    }
    void init(){
        textViewId = findViewById(R.id.textViewId);
        textViewUsername = findViewById(R.id.textViewUsername);
        textViewEmail = findViewById(R.id.textViewEmail);

        //getting the current user
        User user = PrefManager.getInstance(this).getUser();

        //setting the values to the textviews
        textViewId.setText(String.valueOf(user.getId()));
        textViewUsername.setText(user.getUsername());
        textViewEmail.setText(user.getEmail());

        //when the user presses logout button calling the logout method
        findViewById(R.id.buttonLogout).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
                PrefManager.getInstance(getApplicationContext()).logout();
            }
        });
    }
    public void  notificaciones ( View View){
        Intent catalogo = new Intent(this,notificaciones.class);
        startActivity(catalogo);
    }

    public void  mantenimiento ( View View){
        Intent sauces = new Intent(this,Admin.class);
        startActivity(sauces);
    }

    public void  descuentos ( View View){
        Intent alborada = new Intent(this,descuentos.class);
        startActivity(alborada);
    }


    /*metodo menuaccion

    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.menuaccionesadmin, menu);
        return true;
    }

//acciones botones

    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();
        if (id == R.id.home) {
            Intent onOptionsItemSelected = new Intent(this,ProfileActivitya .class);
            startActivity(onOptionsItemSelected);
            return true;


        }return super.onOptionsItemSelected(item);

    }*/
}
