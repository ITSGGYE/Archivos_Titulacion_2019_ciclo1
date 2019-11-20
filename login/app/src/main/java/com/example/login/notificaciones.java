package com.example.login;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.method.LinkMovementMethod;
import android.text.util.Linkify;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.TextView;

public class notificaciones extends AppCompatActivity {
//TextView = notificaciones;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_notificaciones);
        //TextView notificaciones1 = (TextView)findViewById(R.id.notificaciones1);

       // notificaciones1.setMovementMethod(LinkMovementMethod.getInstance());
    }


   /* final TextView notificaciones = (TextView) findViewById(R.id.notificaciones);
  notificaciones.setText("https://console.firebase.google.com/project/aditapp-7e3df/notification/compose?hl=es-419");
  Linkify.addLinks(notificaciones, Linkify.WEB_URLS);
*/
    //metodo menuaccion




    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.menuaccionesadmin, menu);
        return true;
    }

//acciones botones

    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();

            if (id == R.id.home) {

                Intent onOptionsItemSelected = new Intent(this, ProfileActivitya.class);
                startActivity(onOptionsItemSelected);
                return true;
        }return super.onOptionsItemSelected(item);

    }
}
