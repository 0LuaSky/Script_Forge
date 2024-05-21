package model;

import java.util.ArrayList;

public class task {
    public static ArrayList<task> list = new ArrayList<>();
    
    private String title;

    public task(String title) {
        this.title = title;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }
    
}
