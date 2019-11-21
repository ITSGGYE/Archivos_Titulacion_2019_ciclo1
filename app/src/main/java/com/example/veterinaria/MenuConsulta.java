package com.example.veterinaria;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.TextView;
import 	java.util.Calendar;
import android.app.DatePickerDialog;
import android.os.Bundle;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.Date;
import java.text.ParsePosition;
import java.text.SimpleDateFormat;
import java.util.GregorianCalendar;

public class MenuConsulta extends AppCompatActivity implements Response.Listener<JSONObject>,Response.ErrorListener{

    User user;
    Intent intent;
    Bundle bundle;
    TextView tfecha;
    JSONObject jobja;
    JSONArray jarray;
    SimpleDateFormat sdf;
    RequestQueue request;
    JsonObjectRequest jsr;
    Date fecha,fechb,fechc;
    DatePickerDialog datepick;
    Calendar calendario,c1,c2,c3;
    String fechai,fechaf,fechactu;
    int dia,mes,año,dog,hora,tipo,hori,horf,hors,dis,mese;
    Button sfecha,hora1,hora2,hora3,hora4,hora5,hora6,hora7;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_consulta);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
        getSupportActionBar().setIcon(R.mipmap.ic_launcher);
        tipo = 1;
        request = Volley.newRequestQueue(getBaseContext());
        bundle = getIntent().getExtras();
        user = (User) bundle.getSerializable("usuario");
        hora1 = findViewById(R.id.mchora1);
        hora2 = findViewById(R.id.mchora2);
        hora3 = findViewById(R.id.mchora3);
        hora4 = findViewById(R.id.mchora4);
        hora5 = findViewById(R.id.mchora5);
        hora6 = findViewById(R.id.mchora6);
        hora7 = findViewById(R.id.mchora7);
        tfecha = findViewById(R.id.mcvfecha);
        sfecha = findViewById(R.id.mcfecha);
        sfecha.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                calendario = Calendar.getInstance();
                hori = 9;
                horf = 17;
                dis = calendario.get(Calendar.DAY_OF_WEEK);
                hors = calendario.get(Calendar.HOUR_OF_DAY);
                dia = calendario.get(Calendar.DAY_OF_MONTH);
                mes = calendario.get(Calendar.MONTH);
                año = calendario.get(Calendar.YEAR);
                sdf = new SimpleDateFormat("dd/MM/yyyy");
                fechai = dia+"/"+(mes+1)+"/"+año;
                fechaf = "22/12/2019";
                fecha = sdf.parse(fechai , new ParsePosition(0));
                fechb = sdf.parse(fechaf , new ParsePosition(0));
                c1 = new GregorianCalendar();
                c1.setTime(fecha);
                c2 = new GregorianCalendar();
                c2.setTime(fechb);
                datepick = new DatePickerDialog(MenuConsulta.this, new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker view, int y, int m, int d) {
                        fechactu = d+"/"+(m+1)+"/"+y;
                        mese = m;
                        tfecha.setText(fechactu);
                        fechc = sdf.parse(fechactu , new ParsePosition(0));
                        c3 = new GregorianCalendar();
                        c3.setTime(fechc);
                        dog = c3.get(Calendar.DAY_OF_WEEK);
                        if (c3.before(c1)){
                            Toast.makeText(getBaseContext(), "La fecha ya expiro", Toast.LENGTH_SHORT).show();
                            hora1.setEnabled(false);
                            hora2.setEnabled(false);
                            hora3.setEnabled(false);
                            hora4.setEnabled(false);
                            hora5.setEnabled(false);
                            hora6.setEnabled(false);
                            hora7.setEnabled(false);
                        }else if(c3.after(c2)){
                            Toast.makeText(getBaseContext(), "La fecha sobrepasa la diponibilidad", Toast.LENGTH_SHORT).show();
                            hora1.setEnabled(false);
                            hora2.setEnabled(false);
                            hora3.setEnabled(false);
                            hora4.setEnabled(false);
                            hora5.setEnabled(false);
                            hora6.setEnabled(false);
                            hora7.setEnabled(false);
                        }else if(dog == Calendar.SUNDAY){
                            Toast.makeText(getBaseContext(), "Los domingos no se puede agendar", Toast.LENGTH_SHORT).show();
                            hora1.setEnabled(false);
                            hora2.setEnabled(false);
                            hora3.setEnabled(false);
                            hora4.setEnabled(false);
                            hora5.setEnabled(false);
                            hora6.setEnabled(false);
                            hora7.setEnabled(false);
                        }else if(dog == Calendar.SATURDAY){
                            hora1.setEnabled(false);
                            hora2.setEnabled(false);
                            hora3.setEnabled(false);
                            hora4.setEnabled(true);
                            hora5.setEnabled(true);
                            hora6.setEnabled(true);
                            hora7.setEnabled(true);
                        }else{
                            hora1.setEnabled(true);
                            hora2.setEnabled(true);
                            hora3.setEnabled(true);
                            hora4.setEnabled(true);
                            hora5.setEnabled(true);
                            hora6.setEnabled(true);
                            hora7.setEnabled(true);
                        }
                    }
                },año,mes,dia);
                datepick.show();
            }
        });
        hora1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (tfecha.getText().toString().equals("")){
                        Toast.makeText(getBaseContext(), "Selecciones una fecha para poder agendar", Toast.LENGTH_SHORT).show();
                }else{
                    if (hors > hori && hors < horf){
                        if (dis == Calendar.SUNDAY){
                            Toast.makeText(getBaseContext(), "Solo se puede agendar de lunes a sabado", Toast.LENGTH_SHORT).show();
                        }else{
                            hora = 9;
                            cargarWebService(user.getId(),tipo,hora,fechactu,mese);
                        }
                    }else{
                        Toast.makeText(getBaseContext(), "Solo se puede agendar entre las 9am a 5pm", Toast.LENGTH_SHORT).show();
                    }

                }
            }
        });
        hora2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (tfecha.getText().toString().equals("")){
                    Toast.makeText(getBaseContext(), "Selecciones una fecha para poder agendar", Toast.LENGTH_SHORT).show();
                }else{
                    if (hors>hori && hors<horf){
                        if (dis == Calendar.SUNDAY){
                            Toast.makeText(getBaseContext(), "Solo se puede agendar de lunes a sabado", Toast.LENGTH_SHORT).show();
                        }else{
                            hora = 10;
                            cargarWebService(user.getId(),tipo,hora,fechactu,mese);
                        }
                    }else{
                        Toast.makeText(getBaseContext(), "Solo se puede agendar entre las 9am a 5pm", Toast.LENGTH_SHORT).show();
                    }

                }
            }
        });
        hora3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (tfecha.getText().toString().equals("")){
                    Toast.makeText(getBaseContext(), "Selecciones una fecha para poder agendar", Toast.LENGTH_SHORT).show();
                }else{
                    if (hors>hori && hors<horf){
                        if (dis == Calendar.SUNDAY){
                            Toast.makeText(getBaseContext(), "Solo se puede agendar de lunes a sabado", Toast.LENGTH_SHORT).show();
                        }else{
                            hora = 11;
                            cargarWebService(user.getId(),tipo,hora,fechactu,mese);
                        }
                    }else{
                        Toast.makeText(getBaseContext(), "Solo se puede agendar entre las 9am a 5pm", Toast.LENGTH_SHORT).show();
                    }

                }
            }
        });
        hora4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (tfecha.getText().toString().equals("")){
                    Toast.makeText(getBaseContext(), "Selecciones una fecha para poder agendar", Toast.LENGTH_SHORT).show();
                }else{
                    if (hors>hori && hors<horf){
                        if (dis == Calendar.SUNDAY){
                            Toast.makeText(getBaseContext(), "Solo se puede agendar de lunes a sabado", Toast.LENGTH_SHORT).show();
                        }else{
                            hora = 13;
                            cargarWebService(user.getId(),tipo,hora,fechactu,mese);
                        }
                    }else{
                        Toast.makeText(getBaseContext(), "Solo se puede agendar entre las 9am a 5pm", Toast.LENGTH_SHORT).show();
                    }

                }
            }
        });
        hora5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (tfecha.getText().toString().equals("")){
                    Toast.makeText(getBaseContext(), "Selecciones una fecha para poder agendar", Toast.LENGTH_SHORT).show();
                }else{
                    if (hors>hori && hors<horf){
                        if (dis == Calendar.SUNDAY){
                            Toast.makeText(getBaseContext(), "Solo se puede agendar de lunes a sabado", Toast.LENGTH_SHORT).show();
                        }else{
                            hora = 14;
                            cargarWebService(user.getId(),tipo,hora,fechactu,mese);
                        }
                    }else{
                        Toast.makeText(getBaseContext(), "Solo se puede agendar entre las 9am a 5pm", Toast.LENGTH_SHORT).show();
                    }

                }
            }
        });
        hora6.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (tfecha.getText().toString().equals("")){
                    Toast.makeText(getBaseContext(), "Selecciones una fecha para poder agendar", Toast.LENGTH_SHORT).show();
                }else{
                    if (hors>hori && hors<horf){
                        if (dis == Calendar.SUNDAY){
                            Toast.makeText(getBaseContext(), "Solo se puede agendar de lunes a sabado", Toast.LENGTH_SHORT).show();
                        }else{
                            hora = 15;
                            cargarWebService(user.getId(),tipo,hora,fechactu,mese);
                        }
                    }else{
                        Toast.makeText(getBaseContext(), "Solo se puede agendar entre las 9am a 5pm", Toast.LENGTH_SHORT).show();
                    }

                }
            }
        });
        hora7.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (tfecha.getText().toString().equals("")){
                    Toast.makeText(getBaseContext(), "Selecciones una fecha para poder agendar", Toast.LENGTH_SHORT).show();
                }else{
                    if (hors>hori && hors<horf){
                        if (dis == Calendar.SUNDAY){
                            Toast.makeText(getBaseContext(), "Solo se puede agendar de lunes a sabado", Toast.LENGTH_SHORT).show();
                        }else{
                            hora = 16;
                            cargarWebService(user.getId(),tipo,hora,fechactu,mese);
                        }
                    }else{
                        Toast.makeText(getBaseContext(), "Solo se puede agendar entre las 9am a 5pm", Toast.LENGTH_SHORT).show();
                    }

                }
            }
        });
    }

    private void cargarWebService(int idu,int idt,int hora,String fecha,int mes) {
        String url = "https://dablue40.000webhostapp.com/registroCita.php?idu="+idu+"&idt="+idt+"&mes="+mes+"&hora="+hora+"&fecha="+fecha;
        jsr = new JsonObjectRequest(Request.Method.GET,url,null,this,this);
        request.add(jsr);
    }

    @Override
    public void onErrorResponse(VolleyError error) {
        Toast.makeText(getBaseContext(), "Error "+error.toString(), Toast.LENGTH_SHORT).show();
        Log.i("Error ",error.toString());
    }

    @Override
    public void onResponse(JSONObject response) {
        jarray = response.optJSONArray("consulta");
        try {
            jobja = jarray.getJSONObject(0);
            boolean valor = jobja.optBoolean("success");
            if (valor){
                //Toast.makeText(getBaseContext(), "ffsfd "+mese, Toast.LENGTH_SHORT).show();
                Toast.makeText(getBaseContext(), "Horario no disponible", Toast.LENGTH_SHORT).show();
            }else{
                this.finish();
                Toast.makeText(getBaseContext(), "Se agendo su cita", Toast.LENGTH_SHORT).show();
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
}
