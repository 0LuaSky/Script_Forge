<%-- 
    Document   : index
    Created on : 28 de mai. de 2024, 14:39:25
    Author     : Fatec
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html data-bs-theme="dark">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Script Forge</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <%@include file="WEB-INF/jspf/navbar.jspf" %>
        <%@include file="WEB-INF/jspf/head-libs.jspf" %>
        <%@include file="WEB-INF/jspf/body-libs.jspf" %>
        
        <main style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
            <header>
                <h1>ChatGPT Clone - Model:</h1>
                <select id="models">
                    <option value="gpt-4-1106-preview">gpt-4-1106-preview</option>
                     <option value="gpt-4">gpt-4</option>
                    <option value="gpt-3.5-turbo-1106" selected>gpt-3.5-turbo-1106</option>
                    <option value="gpt-3.5-turbo">gpt-3.5-turbo</option>
                     <!-- <option value="gpt-3.5-turbo-instruct">gpt-3.5-turbo-instruct</option>
                    <option value="text-davinci-003">text-davinci-003</option> -->
                </select>
             </header>
            
            <section id="messages"></section>
            <form>
                <input type="text" name="message" id="message" placeholder="Message ChatGPT..."/>
                
                <button type="button" id="send-message" class="color-gray" disabled>
                    <i class="bi bi-arrow-up-square-fill"></i>
                </button>
            </form>
        </main>
        <script src="script.js"></script>
    </body>
</html>
