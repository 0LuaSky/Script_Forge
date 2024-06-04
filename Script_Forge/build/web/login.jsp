<%-- 
    Document   : login
    Created on : 4 de jun. de 2024, 15:01:39
    Author     : Fatec
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html data-bs-theme="dark">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%@include file="WEB-INF/jspf/head-libs.jspf" %>
        <%@include file="WEB-INF/jspf/body-libs.jspf" %>
        
        
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid navbar-brand">
                <span style="font-size: 32px">
                    <i class="bi bi-body-text" ></i>
                    Script Forge
                </span>
            </div>
        </nav>
        
        
        <div class="card" style="width: 18rem; margin:auto; margin-top: 15%;">
            <div class="card-body" style="margin:auto;">
                <h3 class="card-title" style="text-align: center;">Login to ScripForge</h3>
                <br>
                <hr/>
                <form>
                    <div class="mb-3" text-align: center; margin>

                        <label for="login" class="form-label" style="font-size: 20px">Insira o nome de usuario</label>
                        <input class="form-control" type="text" id="form-name" name="session-name">
                        
                        <label for="password" class="form-label" style="font-size: 20px">Senha:</label>
                        <input type="password" id="password" class="form-control" aria-describedby="passwordHelpBlock">
                        <hr/>
                        
                        <div class="buttons" style="display:flex; justify-content: space-around">
                            <a class="btn btn-primary" href="index.jsp" role="button" style="width: 100px; font-size: 20px">Voltar</a>
                            <input type="submit" href="index.jsp" class="btn btn-primary" name="session-login"style="width: 100px;  font-size: 20px"">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
