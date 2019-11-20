package com.example.login;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class cuartagratis extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cuartagratis);
    }
    public void  regresar ( View View){
        Intent s = new Intent(this,cupones.class);
        startActivity(s);
    }
}
