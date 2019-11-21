package com.example.veterinaria;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;


public class ItemCompraAdapter extends BaseAdapter  {

     Context activity;

     static LayoutInflater inflater = null;
     int img [];
     String nom[];
     String des[];

    public ItemCompraAdapter(Context activity, int img [],String nom[],String des[]) {
        this.activity = activity;
        this.img = img;
        this.nom = nom;
        this.des = des;
    }

    @Override
    public int getCount() {
        return img.length;
    }

    @Override
    public Object getItem(int position) {
        return getItemId(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View contentView, ViewGroup parent) {
        View vi=contentView;

        if(contentView == null) {
            inflater = (LayoutInflater) activity.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            vi = inflater.inflate(R.layout.producto, null);
        }

        ImageView image = vi.findViewById(R.id.producto);
        TextView fecha = vi.findViewById(R.id.nombrePro);
        TextView hora = vi.findViewById(R.id.desPro);

        image.setImageResource(img[position]);
        fecha.setText(nom[position]);
        hora.setText(des[position]);

        return vi;
    }
}