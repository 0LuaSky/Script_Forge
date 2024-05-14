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
        
        <div style="margin-top: 100px; margin-left: 1%; margin-right: 1%;">
            <h1>ChatGPT 4 API Test</h1>
            <form id="chat-form">
                <label for="mytext">Enter your message:</label>
                <input type="text" id="mytext" style="width: 50%;" required>
                <button type="submit">Submit</button>
            </form>
            <div>
                <h2>Response:</h2>
                <textarea id="response" rows="20" style="width: 80%;" readonly></textarea>
            </div>
            <script src="script.js"></script>
        </div>
    </body>
</html>
