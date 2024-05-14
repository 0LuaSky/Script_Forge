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
    <body style>
        <%@include file="WEB-INF/jspf/navbar.jspf" %>
        <%@include file="WEB-INF/jspf/head-libs.jspf" %>
        <%@include file="WEB-INF/jspf/body-libs.jspf" %>
        
        <h1 style="margin-top: 5%;">Hello World!</h1>
        
        <div id="chat-container">
            <div id="chat-log"></div>
            <input type="text" id="user-input" placeholder="Digite sua mensagem...">
            <button onclick="sendMessage()">Enviar</button>
        </div>
        
        <script>
            async function sendMessage() {
                const userInput = document.getElementById('user-input').value;
                const chatLog = document.getElementById('chat-log');

                // Adicione sua chave de API aqui
                const apiKey = 'chave da api do chat gpt';
                const apiUrl = 'https://api.openai.com/v1/completions';

                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${apiKey}`
                    },
                    body: JSON.stringify({
                        prompt: userInput,
                        max_tokens: 150,
                        temperature: 0.7,
                        stop: ['\n', 'User:']
                    })
                });

                const data = await response.json();

                // Verifica se a resposta da API contém os dados esperados
                if (data.choices && data.choices.length > 0 && data.choices[0].text) {
                    const chatResponse = data.choices[0].text.trim();
                    chatLog.innerHTML += '<p>User: ' + userInput + '</p><p>ChatGPT: ' + chatResponse + '</p>';
                } else {
                    console.error('Resposta da API não está no formato esperado:', data);
                }
            }
        </script>
        
        <div id="chat-container">
            <div id="chat-log"></div>
            <input type="text" id="user-input" placeholder="Digite sua mensagem...">
            <button onclick="sendMessage()">Enviar</button>
        </div>
    </body>
</html>
