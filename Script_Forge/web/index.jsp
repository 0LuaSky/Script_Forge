<%-- 
    Document   : index
    Created on : 7 de mai. de 2024, 14:24:24
    Author     : Fatec
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html data-bs-theme="dark">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Script Forge</title>
    </head>
    <body>
        <%@include file="WEB-INF/jspf/navbar.jspf" %>
        <%@include file="WEB-INF/jspf/head-libs.jspf" %>
        <%@include file="WEB-INF/jspf/body-libs.jspf" %>
        
        <div style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
            <h1>ChatGPT 4 API Test</h1>
            <form>
                <div class="mb-3">
                    <label for="mytext" class="form-label">Insira uma descrição de como você quer que seja o jogo:</label>
                        <input class="form-control" type="text" placeholder="Digite Aqui." aria-label="default input example" rows="20" style="width: 70%;">                  
                        <textarea class="form-control"id="exampleFormControlTextarea1" rows="4" style="width: 70%;"></textarea>
                    <div id="emailHelp" class="form-text">algo em baixo para alterar.</div>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </form>
            <script src="script.js"></script>
        </div>
    </body>
</html>
