package com.sofynet.encuesta.list;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ArrayAdapter;
import android.widget.CompoundButton;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.TextView;
import android.support.design.widget.Snackbar;
import android.widget.Toast;

import com.sofynet.encuesta.R;
import com.sofynet.encuesta.dao.Question;

import java.util.ArrayList;

/**
 * Created by David on 10/11/19.
 */

public class CustomAdapter  extends ArrayAdapter<Question> implements View.OnClickListener{

    private ArrayList<Question> dataSet;
    Context mContext;
    public static ArrayList<String> selectedAnswers;

    // View lookup cache
    private static class ViewHolder {
        TextView txtName;
        TextView txtType;
        TextView txtVersion;
    }



    public CustomAdapter(ArrayList<Question> data, Context context) {
        super(context, R.layout.row_item, data);
        this.dataSet = data;
        this.mContext=context;
        selectedAnswers = new ArrayList<>();
        for (int i = 0; i < data.size(); i++) {
            selectedAnswers.add("No Seleccionado");
        }

    }


    @Override
    public void onClick(View v) {


        int position=(Integer) v.getTag();
        System.out.println(v.getId());

        Object object= getItem(position);
        Question dataModel=(Question)object;


        switch (v.getId())
        {

            case R.id.si:

                System.out.println("Dio un click en si");
                Snackbar.make(v, "Release date " +"Dio click en si", Snackbar.LENGTH_LONG)
                        .setAction("No action", null).show();

                break;


        }


    }

    private int lastPosition = -1;

    @Override
    public View getView(final int position, View convertView, ViewGroup parent) {
        // Get the data item for this position
        final Question dataModel = getItem(position);
        // Check if an existing view is being reused, otherwise inflate the view
        ViewHolder viewHolder; // view lookup cache stored in tag

        final View result;

        if (convertView == null) {


            viewHolder = new ViewHolder();
            LayoutInflater inflater = LayoutInflater.from(getContext());
            convertView = inflater.inflate(R.layout.row_item, parent, false);
            viewHolder.txtName = (TextView) convertView.findViewById(R.id.question);
            viewHolder.txtType = (TextView) convertView.findViewById(R.id.option);
            RadioButton yes = (RadioButton) convertView.findViewById(R.id.si);
            RadioButton no = (RadioButton) convertView.findViewById(R.id.no);
            yes.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
// set Yes values in ArrayList if RadioButton is checked
                    if (isChecked) {
                        selectedAnswers.set(position, "S");
                        dataModel.setResponse("S");
                    }

                }
            });
            no.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
// set No values in ArrayList if RadioButton is checked
                    if (isChecked) {
                        selectedAnswers.set(position, "N");
                        dataModel.setResponse("N");
                    }

                }
            });
            //viewHold
            // er.txtVersion = (TextView) convertView.findViewById(R.id.response);

            result=convertView;

            convertView.setTag(viewHolder);
        } else {
            viewHolder = (ViewHolder) convertView.getTag();
            result=convertView;
        }

        Animation animation = AnimationUtils.loadAnimation(mContext, (position > lastPosition) ? R.anim.up_from_bottom : R.anim.down_from_top);
        result.startAnimation(animation);
        lastPosition = position;


        viewHolder.txtName.setText(dataModel.getQuestion());
        viewHolder.txtType.setText(dataModel.getOption());
        //viewHolder.txtVersion.setText(dataModel.getResponse());
        // Return the completed view to render on screen
        return convertView;
    }


}