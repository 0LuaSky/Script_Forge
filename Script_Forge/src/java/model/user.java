package model;

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
