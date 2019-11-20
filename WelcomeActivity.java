package com.sofynet.encuesta;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.StrictMode;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import com.sofynet.encuesta.dao.Question;
import com.sofynet.encuesta.list.CustomAdapter;
import com.sofynet.encuesta.list.DataModel;
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
import java.util.ArrayList;
import java.util.HashMap;

public class WelcomeActivity extends AppCompatActivity {

    private WelcomeActivity context;

    private String apiPath = "http://www.duffyboatsecuador.com:8080/kodifikaWs/integracionKodifika/obtenerEncuestaGet";
    private String sendPath = "http://www.duffyboatsecuador.com:8080/kodifikaWs/integracionKodifika/guardarEncuesta";
    private ProgressDialog processDialog;
    private JSONArray restulJsonArray;
    private JSONObject resultObject;
    private int success = 0;
    String response = "";
    private ListView listView;
    private Button submit;
    ArrayList<Question> dataModels;
    private static CustomAdapter adapter;

    private String username;

    // Session Manager Class
    SessionManager session;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_welcome);
        this.context = this;

        // Session class instance
        session = new SessionManager(getApplicationContext());

        Intent intent = getIntent();
        username = intent.getStringExtra("username");

        listView = (ListView) findViewById(R.id.mobile_name_list);
        submit = (Button) findViewById(R.id.submit);
        //listView=(ListView)findViewById(R.id.list);


        dataModels= new ArrayList<>();

        adapter= new CustomAdapter(dataModels,getApplicationContext());

        listView.setAdapter(adapter);
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

            }
        });

        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String message = "";
// get the value of selected answers from custom adapter
                //for (int i = 0; i < CustomAdapter.selectedAnswers.size(); i++) {
                //    message = message + "\n" + (i + 1) + " " + CustomAdapter.selectedAnswers.get(i);
                //}
                for (int i = 0; i < dataModels.size(); i++) {
                    message = message + "\n" + (i + 1) + " " + dataModels.get(i).getResponse();
                }
// display the message on screen with the help of Toast.
                Toast.makeText(getApplicationContext(), message, Toast.LENGTH_LONG).show();
                new WelcomeActivity.ServiceSendStubAsyncTask(context, context).execute();

            }
        });

        /**
         * Call this function whenever you want to check user login
         * This will redirect user to LoginActivity is he is not
         * logged in
         * */
        session.checkLogin();

        new WelcomeActivity.ServiceStubAsyncTask(context, context).execute();
    }


}
