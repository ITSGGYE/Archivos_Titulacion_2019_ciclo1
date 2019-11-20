package com.example.login;


import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

public class ProfileActivity extends AppCompatActivity {

    TextView textViewId, textViewUsername, textViewEmail;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);
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


    public void  menu ( View View){
        Intent catalogo = new Intent(this,lista_productos.class);
        startActivity(catalogo);
    }

    public void  restaurantes ( View View){
        Intent mapas = new Intent(this,MAPAS.class);
        startActivity(mapas);
    }


    public void  cupones ( View View){
        Intent descuentos = new Intent(this,cupones.class);
        startActivity(descuentos);
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
            Intent onOptionsItemSelected = new Intent(this,Main2Activity.class);
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




/*android:background="#383833"
    android:layout_width="match_parent"
    android:layout_height="wrap_content"
    android:textColor="#FFDB00"
    android:textSize="27sp"
    android:textAlignment="center"*/

}
