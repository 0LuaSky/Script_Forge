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
        <--link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <%@include file="WEB-INF/jspf/navbar.jspf" %>
        <%@include file="WEB-INF/jspf/head-libs.jspf" %>
        <%@include file="WEB-INF/jspf/body-libs.jspf" %>
        
        <main style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
            <form style="margin-right: 20%;"> 
                <div style="margin-right: 20%;" class="col-auto">
                    <label for="message" class="form-label">Escreva um enredo para um jogo de vidêo-game baseado em...</label>
                    <textarea class="form-control" name="message" id="message" class="form-control" placeholder="escreva aqui."></textarea>
                    
                    <button type="button" id="send-message" class="btn btn-primary mb-3" disabled>
                        <i class="bi bi-arrow-up-square-fill"></i>
                    </button>
                </div>

                <button type="button" id="send-message" class="color-gray" disabled>
                    <i class="bi bi-arrow-up-square-fill"></i>
                </button>
                    
            </form>
            <section id="messages"></section>
            
        </main>
        <script src="script.js"></script>
    </body>
</html>

<!--div class="mb-3" id="gptResponse">
    <label for="response" class="form-label"></label>
    <textarea readonly class="form-control" id="messages" rows="3"></textarea>
</div>


<button type="button" id="send-message" class="color-gray" disabled>
    <i class="bi bi-arrow-up-square-fill"></i>
</button>