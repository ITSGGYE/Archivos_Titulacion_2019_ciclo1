package com.example.login;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;

import com.blikoon.qrcodescanner.QrCodeActivity;

public class cupones extends AppCompatActivity {

    private static final int REQUEST_CODE_QR_SCAN = 101;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cupones);
    }


    public void onClick(View v) {
        Intent i = new Intent(cupones.this, QrCodeActivity.class);
        startActivityForResult(i, REQUEST_CODE_QR_SCAN);
    }
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {

        super.onActivityResult(requestCode, resultCode, data);
        if (resultCode != Activity.RESULT_OK) {
            Toast.makeText(getApplicationContext(), "No se pudo obtener una respuesta", Toast.LENGTH_SHORT).show();
            String resultado = data.getStringExtra("com.blikoon.qrcodescanner.error_decoding_image");
            if (resultado != null) {
                Toast.makeText(getApplicationContext(), "No se pudo escanear el código QR", Toast.LENGTH_SHORT).show();
            }
            return;
        }
        if (requestCode == REQUEST_CODE_QR_SCAN) {
            if (data != null) {
                String lectura = data.getStringExtra("com.blikoon.qrcodescanner.got_qr_scan_relult");
                Toast.makeText(getApplicationContext(), "Promocion obtenida: " + lectura, Toast.LENGTH_SHORT).show();

            }
        }
    }


//metodo ir a cupon 1
public void  cafe( View View){
    Intent s = new Intent(this,cafenegro.class);
    startActivity(s);
}

//metodo ir a cupon 2
public void  refil( View View){
    Intent s = new Intent(this,caferefil.class);
    startActivity(s);}

    //metodo ir a cupon 3
    public void  mas( View View){
        Intent s = new Intent(this,cuartagratis.class);
        startActivity(s);}

    //metodo ir a cupon 4
        public void  desayunos( View View){
            Intent s = new Intent(this,desayunos.class);
            startActivity(s);}



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
