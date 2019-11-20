package com.example.login;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;

import static android.icu.lang.UCharacter.GraphemeClusterBreak.V;

public class catalogo extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_catalogo);
    }

        public void  s( View View){
            Intent s = new Intent(this,ProfileActivity.class);
            startActivity(s);}



}
