package com.example.login;

public class User {
    private String username, email, type;
    private int id;
    public User(int id, String username, String email, String type) {
        this.id = id;
        this.username = username;
        this.email = email;
        this.type = type;
    }
    public String getUsername() {
        return username;
    }
    public String getEmail() {
        return email;
    }
    public String getType() {
        return type;
    }

    public int getId() {
        return id;
    }
}