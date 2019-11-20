package com.sofynet.encuesta.list;

/**
 * Created by anupamchugh on 09/02/16.
 */
public class DataModel {

    String option;
    String question;
    String response;

    public DataModel(String option, String question, String response) {
        this.option = option;
        this.question = question;
        this.response = response;
    }

    public String getOption() {
        return option;
    }

    public void setOption(String option) {
        this.option = option;
    }

    public String getQuestion() {
        return question;
    }

    public void setQuestion(String question) {
        this.question = question;
    }

    public String getResponse() {
        return response;
    }

    public void setResponse(String response) {
        this.response = response;
    }
}
