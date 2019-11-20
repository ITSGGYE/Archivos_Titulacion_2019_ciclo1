package com.sofynet.encuesta.dao;

/**
 * Created by David on 10/11/19.
 */

public class Question {

    private Integer code;
    private String question;
    private String option;
    private String response;
    public Question() {

    }
    public Question(Integer code, String question, String option, String response) {
        this.code = code;
        this.question = question;
        this.option = option;
        this.response = response;
    }

    public Integer getCode() {
        return code;
    }

    public void setCode(Integer code) {
        this.code = code;
    }

    public String getQuestion() {
        return question;
    }

    public void setQuestion(String question) {
        this.question = question;
    }

    public String getOption() {
        return option;
    }

    public void setOption(String option) {
        this.option = option;
    }

    public String getResponse() {
        return response;
    }

    public void setResponse(String response) {
        this.response = response;
    }
}
