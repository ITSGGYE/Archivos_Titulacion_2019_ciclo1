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
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import com.sofynet.encuesta.dao.Question;
import com.sofynet.encuesta.list.CustomAdapter;
import com.sofynet.encuesta.list.CustomAdapterQuery;
import com.sofynet.encuesta.list.CustomAdapterReport;
import com.sofynet.encuesta.session.SessionManager;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.protocol.HTTP;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.HashMap;

public class TaskActivity extends AppCompatActivity {

    //private String queryPath = "http://www.duffyboatsecuador.com:8080/kodifikaWs/integracionKodifika/obtenerReporteRespuestaGet?idUsuario=";
    private String queryPath = "http://www.duffyboatsecuador.com:8080/kodifikaWs/integracionKodifika/obtenerReporteTratamientoGet?idUsuario=";
    private ProgressDialog processDialog;
    private JSONObject resultObject;
    private JSONArray restulJsonArray;
    private int success = 0;
    String response = "";

    private TaskActivity context;

    private String username;

    private ListView listView;
    ArrayList<Question> dataModels;
    private static CustomAdapterReport adapter;

    private Button exitButton;

    // Session Manager Class
    SessionManager session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_task);

        // Session class instance
        session = new SessionManager(getApplicationContext());

        context = this;

        Intent intent = getIntent();
        username = intent.getStringExtra("username");

        listView = (ListView) findViewById(R.id.mobile_name_list_result);
        exitButton = (Button) findViewById(R.id.exitButton);

        dataModels= new ArrayList<>();

        adapter= new CustomAdapterReport(dataModels,getApplicationContext());

        listView.setAdapter(adapter);
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

            }
        });
        exitButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                // Clear the session data
                // This will clear all session data and
                // redirect user to LoginActivity
                session.logoutUser();

            }
        });

        /**
         * Call this function whenever you want to check user login
         * This will redirect user to LoginActivity is he is not
         * logged in
         * */
        session.checkLogin();

        new TaskActivity.ServiceQueryStubAsyncTask(context, context).execute();

    }
}
