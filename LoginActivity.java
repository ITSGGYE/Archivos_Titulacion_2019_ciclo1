package com.sofynet.encuesta;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.sofynet.encuesta.session.SessionManager;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.HashMap;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;

public class LoginActivity extends AppCompatActivity {

    private TextView registerTextView;
    private TextView usernameText;
    private TextView passwordText;
    private Button loginButton;
    private LoginActivity context;

    private String apiPath = "http://www.duffyboatsecuador.com:8080/kodifikaWs/integracionKodifika/loginUsuarioGet?";
    private ProgressDialog processDialog;
    private JSONArray restulJsonArray;
    private JSONObject resultObject;
    private int success = 0;
    String response = "";

    // Session Manager Class
    SessionManager session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        context = this;

        session = new SessionManager(getApplicationContext());

        usernameText = (TextView) findViewById(R.id.usernameText);
        //usernameText.setText("doctor");
        passwordText = (TextView) findViewById(R.id.passwordText);
        //passwordText.setText("123456");
        loginButton = (Button) findViewById(R.id.loginButton);

        loginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (usernameText.getText().toString()!=null&&
                        usernameText.getText().toString().length()>0&&
                        passwordText.getText().toString()!=null&&
                        passwordText.getText().toString().length()>0) {
                    if (usernameText.getText().toString().equals("doctor")&&
                            passwordText.getText().toString().equals("123456")) {
                        session.createLoginSession("Android Hive", "anroidhive@gmail.com");
                        Intent doctorActivity =
                                new Intent(LoginActivity.this, DoctorActivity.class);
                        doctorActivity.putExtra("username", usernameText.getText().toString());
                        startActivity(doctorActivity);
                    } else
                        new ServiceStubAsyncTask(context, context).execute();
                } else
                    Toast.makeText(context, "Ingrese un usuario valido",
                            Toast.LENGTH_LONG).show();

            }
        });

        registerTextView = (TextView) findViewById(R.id.registerTextView);

        registerTextView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                session.createLoginSession("Android Hive", "anroidhive@gmail.com");
                Intent registerActivity = new Intent(LoginActivity.this, RegisterActivity.class);
                startActivity(registerActivity);
            }
        });

    }


}
