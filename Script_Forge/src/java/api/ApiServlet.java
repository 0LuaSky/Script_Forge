package api;

import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.BufferedReader;
import model.user;
import org.json.JSONArray;
import org.json.JSONObject;

@WebServlet(name = "ApiServlet", urlPatterns = {"/api/*"})
public class ApiServlet extends HttpServlet {
    
    private JSONObject getJSONBody(BufferedReader reader) throws IOException{
        StringBuilder buffer = new StringBuilder();
        String line = null;
        while ((line = reader.readLine()) != null) {
            buffer.append(line);
        }
        return new JSONObject(buffer.toString());
    }

    protected void processRequest(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("application/json;chatset=UTF-8");
        JSONObject file = new JSONObject();
        try{
            if(request.getRequestURI().endsWith("/api/session")){
                processSession(file, request, response);
            }else if(request.getRequestURI().endsWith("/api/users")){
                processUsers(file, request, response);
            }else{
                response.sendError(400, "Invalid URL");
                file.put("error", "Invalid URL");
            }
        }catch(Exception ex){
            response.sendError(500, "Internal error: "+ex.getLocalizedMessage());
        }
        response.getWriter().print(file.toString());
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    protected void doDelete(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    protected void doPut(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }

    private void processSession(JSONObject file, HttpServletRequest request, HttpServletResponse response) throws Exception {
        if(request.getMethod().toLowerCase().equals("put")){
            JSONObject body = getJSONBody(request.getReader());
            String login = body.getString("login");
            String password = body.getString("password");
            user u = user.getUser(login, password);
            if(u==null){
                response.sendError(403, "Login or password incorrects");
            }else{
                request.getSession().setAttribute("user", u);
                file.put("id", u.getRowId());
                file.put("login", u.getLogin());
                file.put("name", u.getName());
                file.put("role", u.getRole());
                file.put("passwordHash", u.getPasswordHash());
                file.put("message", "Logged in");
            }
        }else if(request.getMethod().toLowerCase().equals("delete")){
            request.getSession().removeAttribute("user");
            file.put("message", "Logged out");
        }else if(request.getMethod().toLowerCase().equals("get")){
            if(request.getSession().getAttribute("user") == null){
                response.sendError(403, "No session");  
            }else{
                user u = (user) request.getSession().getAttribute("user");
                file.put("id", u.getRowId());
                file.put("login", u.getLogin());
                file.put("name", u.getName());
                file.put("role", u.getRole());
                file.put("passwordHash", u.getPasswordHash());
            }
        }else{
            response.sendError(405, "Method not allowed");
            file.put("error", "Method not allowed");
        }
    }

    private void processUsers(JSONObject file, HttpServletRequest request, HttpServletResponse response) throws Exception {
        if(request.getSession().getAttribute("user") == null){
            response.sendError(401, "Unauthorized: no session");
        }else if(!((user)request.getSession().getAttribute("user")).getRole().equals("ADMIN")){
            response.sendError(401, "Unauthorized: only admin can manage users");
        }else if(request.getMethod().toLowerCase().equals("get")){
            file.put("list", new JSONArray(user.getUsers()));
        }else if(request.getMethod().toLowerCase().equals("post")){
            JSONObject body = getJSONBody (request.getReader());
            String login = body.getString("login");
            String name = body.getString("name");
            String role = body.getString("role");
            String password = body.getString("password");
            user.insertUser(login, name, role, password);
        }else if(request.getMethod().toLowerCase().equals("put")){
            JSONObject body = getJSONBody (request.getReader());
            String login = body.getString("login");
            String name = body.getString("name");
            String role = body.getString("role");
            String password = body.getString("password");
            user.updateUser(login, name, role, password);
        }else if(request.getMethod().toLowerCase().equals("delete")){
            Long id = Long.parseLong(request.getParameter("id"));
            user.deleteUser(id);
        }else{
            response.sendError(405, "Method not allowed");
        }
    }

}
