package com.example.login;

import androidx.fragment.app.FragmentActivity;

import android.os.Bundle;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

public class MapsActivity extends FragmentActivity implements OnMapReadyCallback {

    private GoogleMap mMap;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_maps);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);
    }



    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;

        LatLng a = new LatLng(-2.137904, -79.8916398);
        mMap.addMarker(new MarkerOptions().position(a).title("Mama Adita ").snippet("Abierto de 7:00 a 23:00.").icon(BitmapDescriptorFactory.fromResource(R.drawable.iconoc)));


       // LatLng b = new LatLng(-2.1361747,-79.9049737 );
      //  mMap.addMarker(new MarkerOptions().position(b).title("Mama Adita Sucursal").snippet("Abierto de 7:00 a 23:00.").icon(BitmapDescriptorFactory.fromResource(R.drawable.iconoc)));

        mMap.getUiSettings().setZoomControlsEnabled(true);

        mMap.setMyLocationEnabled(true);

        mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(a,7));
    }
}
