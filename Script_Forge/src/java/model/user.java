package model;

import api.AppListener;
import java.util.ArrayList;
import java.sql.*;

public class user {
    private long rowId;
    private String name;
    private String login;
    private String role;
    private String passwordHash;
    
    public static String getCreateStatement() {
        return "CREATE TABLE IF NOT EXISTS users("
                + "login VARCHAR(50) UNIQUE NOT NULL,"
                + "name VARHCAR(200) NOT NULL,"
                + "role VARCHAR(20) NOT NULL,"
                + "password_hash VARCHAR NOT NULL"
                + ")";
    }
    
    public static ArrayList<user> getUsers() throws Exception {
        ArrayList<user> list = new ArrayList<>();
        Connection con = AppListener.getConnection();
        Statement stmt = con.createStatement();
        ResultSet rs = stmt.executeQuery("SELECT rowid, * from users");
        while(rs.next()){
            long rowId = rs.getLong("rowid");
            String login = rs.getString("login");
            String name = rs.getString("name");
            String role = rs.getString("role");
            String passwordHash = rs.getString("password_hash");
            list.add(new user(rowId, login, name, role, passwordHash));
        }
        rs.close();
        stmt.close();
        con.close();
        return list;
    }
    
    public static user getUser(String login, String password) throws Exception {
    user user = null;
    Connection con = AppListener.getConnection();
    String sql = "SELECT rowid, * from users WHERE login=? AND password_hash=?";
    PreparedStatement stmt = con.prepareStatement(sql);
    stmt.setString(1, login);
    stmt.setString(2, AppListener.getMd5Hash(password));
    ResultSet rs = stmt.executeQuery();
    if(rs.next()){
        long rowId = rs.getLong("rowid");
        String name = rs.getString("name");
        String role = rs.getString("role");
        String passwordHash = rs.getString("password_hash");
        user = new user(rowId, login, name, role, passwordHash);
    }
    rs.close();
    stmt.close();
    con.close();
    return user;
    }
    
    public static void insertUser(String login, String name, String role, String password) throws Exception{
        Connection con = AppListener.getConnection();
        String sql = "INSERT INTO user(login, name, password_hash) " 
                + "VALUES(?, ?, ?, ?)";
        PreparedStatement stmt = con.prepareStatement(sql);
        stmt.setString(1, login);
        stmt.setString(2, name);
        stmt.setString(3, role);
        stmt.setString(4, AppListener.getMd5Hash(password));
        stmt.execute();
        stmt.close();
        con.close();
    }
    
    public static void updateUser(String login, String name, String role, String password) throws Exception{
        Connection con = AppListener.getConnection();
        String sql = "UPDATE users SET name=?, role=?, password_hash=?";
        PreparedStatement stmt = con.prepareStatement(sql);
        stmt.setString(1, name);
        stmt.setString(2, role);
        stmt.setString(3, AppListener.getMd5Hash(password));
        stmt.setString(4, login);
        stmt.execute();
        stmt.close();
        con.close();
    }
    
    public static void deleteUser(long rowId) throws Exception{
        Connection con = AppListener.getConnection();
        String sql = "DELETE FROM users WHERE rowid = ?";
        PreparedStatement stmt = con.prepareStatement(sql);
        stmt.setLong(1, rowId);
        stmt.execute();
        stmt.close();
        con.close();
        
    }

    public user(long rowId, String name, String login, String role, String passwordHash) {
        this.rowId = rowId;
        this.name = name;
        this.login = login;
        this.role = role;
        this.passwordHash = passwordHash;
    }

    public long getRowId() {
        return rowId;
    }

    public void setRowId(long rowId) {
        this.rowId = rowId;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getLogin() {
        return login;
    }

    public void setLogin(String login) {
        this.login = login;
    }

    public String getRole() {
        return role;
    }

    public void setRole(String role) {
        this.role = role;
    }

    public String getPasswordHash() {
        return passwordHash;
    }

    public void setPasswordHash(String passwordHash) {
        this.passwordHash = passwordHash;
    }
    
}
