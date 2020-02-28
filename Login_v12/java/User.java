package java;

import java.util.UUID;

public class User {

    private String email;
    private String password;

    public User(String email, String aboutMe) {
        this.email = email;
        this.aboutMe = aboutMe;
    }

    public UUID getId() {
    return id;
   }

    public String getEmail(){
        return email;
    }

    public String getPassword() {
        return password;
    }
}