package com.sofynet.encuesta;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.sofynet.encuesta.list.CustomAdapter;
import com.sofynet.encuesta.session.SessionManager;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.protocol.HTTP;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.HashMap;

public class RegisterActivity extends AppCompatActivity {

    private Button registerButton;

    private String registerPath = "http://www.duffyboatsecuador.com:8080/kodifikaWs/integracionKodifika/guardarpersona";
    private ProgressDialog processDialog;
    private JSONArray restulJsonArray;
    private JSONObject resultObject;
    private int success = 0;
    String response = "";

    private RegisterActivity context;

    private EditText representativeIdentificationEditText;
    private EditText representativeNameEditText;
    private EditText presesentativeEmailText;
    private EditText representativeCelularEditText;
    private EditText representativePasswordEditText;
    private EditText studentNameEditText;
    private EditText studentAgeEditText;

    // Session Manager Class
    SessionManager session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        // Session class instance
        session = new SessionManager(getApplicationContext());

        context = this;

        representativeIdentificationEditText  = (EditText) findViewById(R.id.representativeIdentificationEditText);
        representativeNameEditText  = (EditText) findViewById(R.id.representativeNameEditText);
        presesentativeEmailText  = (EditText) findViewById(R.id.presesentativeEmailText);
        representativeCelularEditText  = (EditText) findViewById(R.id.representativeCelularEditText);
        representativePasswordEditText  = (EditText) findViewById(R.id.representativePasswordEditText);
        studentNameEditText  = (EditText) findViewById(R.id.studentNameEditText);
        studentAgeEditText  = (EditText) findViewById(R.id.studentAgeEditText);

                        /*{claveUsuario:'123456',email:'jpiguave@hotmail.com',nombreCompleto:'Juan Piguave',
                        nombreRepresentado:'M Pig',edad:5,celular:'09876655',numeroIdentificacion:'09999888'}*/

                        /*
        representativeIdentificationEditText.setText("09999888");
        representativeNameEditText.setText("Juan Piguave");
        presesentativeEmailText.setText("jpiguave@hotmail.com");
        representativeCelularEditText.setText("09876655");
        representativePasswordEditText.setText("123456");
        studentNameEditText.setText("M Pig");
        studentAgeEditText.setText("5");

        */
        registerButton = (Button) findViewById(R.id.registerButton);

        registerButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                boolean valid = validateField(representativeIdentificationEditText.getText().toString(),"identificacion del Representante");
                if (valid) valid = validateField(representativeNameEditText.getText().toString(),"nombre del representante");
                if (valid) valid = validateField(presesentativeEmailText.getText().toString(),"correo del representante");
                if (valid) valid = validateField(representativeCelularEditText.getText().toString(),"numero celular del representante");
                if (valid) valid = validateField(representativePasswordEditText.getText().toString(),"clave del representante");
                if (valid) valid = validateField(studentNameEditText.getText().toString(),"nombre del representado");
                if (valid) valid = validateField(studentAgeEditText.getText().toString(),"edad del representado");
                if (valid) {
                    //Intent registerActivity = new Intent(RegisterPersonalDataActivity.this, RegisterCreditCardActivity.class);
                    //startActivity(registerActivity);
                    new RegisterActivity.ServiceRegisterStubAsyncTask(context, context).execute();
                }
            }
        });

        /**
         * Call this function whenever you want to check user login
         * This will redirect user to LoginActivity is he is not
         * logged in
         * */
        session.checkLogin();


    }

    private boolean validateField(String field, String messageError) {
        if (field!=null&&field.length()>0)
            return true;
        else {
            Toast.makeText(context, "Ingrese un(a) "+messageError+" valido(a)",
                    Toast.LENGTH_LONG).show();
            return false;
        }
    }


}
