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
            <form style="margin-right: 0%;">
                <p>Escolha uma categoria para seu jogo, para que possamos criar o roteiro perfeito para você</p>
                <div class="taggers01" style="display:flex">
                    <div id="tag_01_container" style="display:block; margin-left:0%;">
                        <select id="tag_01" class="form-select" aria-label="Default select example" style="width:200px;">
                            <option selected> - - - </option>
                            <option value="Ação">Ação</option>
                            <option value="Apocalíptico">Apocalíptico</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Battle Royale">Battle Royale</option>
                            <option value="Cartas">Cartas</option>
                            <option value="Casual">Casual</option>
                            <option value="Co-op">Co-op</option>
                            <option value="Corridas">Corridas</option>
                            <option value="Cyberpunk">Cyberpunk</option>
                            <option value="Defesa de Torres">Defesa de Torres</option>
                            <option value="Esporte">Esporte</option>
                            <option value="Estratégia">Estratégia</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção Científica">Ficção Científica</option>
                            <option value="Hack and Slash">Hack and Slash</option>
                            <option value="Investigação">Investigação</option>
                            <option value="Luta">Luta</option>
                            <option value="Metroidvania">Metroidvania</option>
                            <option value="Militar">Militar</option>
                            <option value="Mitologia">Mitologia</option>
                            <option value="Multiplayer">Multiplayer</option>
                            <option value="Mundo Aberto">Mundo Aberto</option>
                            <option value="Pescaria">Pescaria</option>
                            <option value="Piratas">Piratas</option>
                            <option value="Plataformas">Plataformas</option>
                            <option value="PvP">PvP</option>
                            <option value="Quebra-Cabeça">Quebra-Cabeça</option>
                            <option value="Roguelike">Roguelike</option>
                            <option value="Romance visual">Romance visual</option>
                            <option value="RPG">RPG</option>
                            <option value="Sandbox">Sandbox</option>
                            <option value="Simulação">Simulação</option>
                            <option value="Single Player">Single Player</option>
                            <option value="Sobrevivência">Sobrevivência</option>
                            <option value="Steampunk">Steampunk</option>
                            <option value="Tabuleiro">Tabuleiro</option>
                            <option value="Terror">Terror</option>
                            <option value="Tiro em primeira pessoa">Tiro em primeira pessoa</option>
                            <option value="Turnos">Turnos</option>
                            <option value="Zumbis">Zumbis</option>
                        </select>
                    </div>
                    <div id="tag_02_container" style="display:none;  margin-left:3%;">
                        <select id="tag_02" class="form-select" aria-label="Default select example" style="width:200px;">
                            <option selected> - - - </option>
                            <option value="Ação">Ação</option>
                            <option value="Apocalíptico">Apocalíptico</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Battle Royale">Battle Royale</option>
                            <option value="Cartas">Cartas</option>
                            <option value="Casual">Casual</option>
                            <option value="Co-op">Co-op</option>
                            <option value="Corridas">Corridas</option>
                            <option value="Cyberpunk">Cyberpunk</option>
                            <option value="Defesa de Torres">Defesa de Torres</option>
                            <option value="Esporte">Esporte</option>
                            <option value="Estratégia">Estratégia</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção Científica">Ficção Científica</option>
                            <option value="Hack and Slash">Hack and Slash</option>
                            <option value="Investigação">Investigação</option>
                            <option value="Luta">Luta</option>
                            <option value="Metroidvania">Metroidvania</option>
                            <option value="Militar">Militar</option>
                            <option value="Mitologia">Mitologia</option>
                            <option value="Multiplayer">Multiplayer</option>
                            <option value="Mundo Aberto">Mundo Aberto</option>
                            <option value="Pescaria">Pescaria</option>
                            <option value="Piratas">Piratas</option>
                            <option value="Plataformas">Plataformas</option>
                            <option value="PvP">PvP</option>
                            <option value="Quebra-Cabeça">Quebra-Cabeça</option>
                            <option value="Roguelike">Roguelike</option>
                            <option value="Romance visual">Romance visual</option>
                            <option value="RPG">RPG</option>
                            <option value="Sandbox">Sandbox</option>
                            <option value="Simulação">Simulação</option>
                            <option value="Single Player">Single Player</option>
                            <option value="Sobrevivência">Sobrevivência</option>
                            <option value="Steampunk">Steampunk</option>
                            <option value="Tabuleiro">Tabuleiro</option>
                            <option value="Terror">Terror</option>
                            <option value="Tiro em primeira pessoa">Tiro em primeira pessoa</option>
                            <option value="Turnos">Turnos</option>
                            <option value="Zumbis">Zumbis</option>
                        </select>
                    </div>
                    <div id="tag_03_container" style="display:none;  margin-left:3%;">
                        <select id="tag_03" class="form-select" aria-label="Default select example" style="width:200px;">
                            <option selected> - - - </option>
                            <option value="Ação">Ação</option>
                            <option value="Apocalíptico">Apocalíptico</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Battle Royale">Battle Royale</option>
                            <option value="Cartas">Cartas</option>
                            <option value="Casual">Casual</option>
                            <option value="Co-op">Co-op</option>
                            <option value="Corridas">Corridas</option>
                            <option value="Cyberpunk">Cyberpunk</option>
                            <option value="Defesa de Torres">Defesa de Torres</option>
                            <option value="Esporte">Esporte</option>
                            <option value="Estratégia">Estratégia</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção Científica">Ficção Científica</option>
                            <option value="Hack and Slash">Hack and Slash</option>
                            <option value="Investigação">Investigação</option>
                            <option value="Luta">Luta</option>
                            <option value="Metroidvania">Metroidvania</option>
                            <option value="Militar">Militar</option>
                            <option value="Mitologia">Mitologia</option>
                            <option value="Multiplayer">Multiplayer</option>
                            <option value="Mundo Aberto">Mundo Aberto</option>
                            <option value="Pescaria">Pescaria</option>
                            <option value="Piratas">Piratas</option>
                            <option value="Plataformas">Plataformas</option>
                            <option value="PvP">PvP</option>
                            <option value="Quebra-Cabeça">Quebra-Cabeça</option>
                            <option value="Roguelike">Roguelike</option>
                            <option value="Romance visual">Romance visual</option>
                            <option value="RPG">RPG</option>
                            <option value="Sandbox">Sandbox</option>
                            <option value="Simulação">Simulação</option>
                            <option value="Single Player">Single Player</option>
                            <option value="Sobrevivência">Sobrevivência</option>
                            <option value="Steampunk">Steampunk</option>
                            <option value="Tabuleiro">Tabuleiro</option>
                            <option value="Terror">Terror</option>
                            <option value="Tiro em primeira pessoa">Tiro em primeira pessoa</option>
                            <option value="Turnos">Turnos</option>
                            <option value="Zumbis">Zumbis</option>
                        </select>
                    </div>
                    <div id="tag_04_container" style="display:none;  margin-left:3%;">
                        <select id="tag_04" class="form-select" aria-label="Default select example" style="width:200px;">
                            <option selected> - - - </option>
                            <option value="Ação">Ação</option>
                            <option value="Apocalíptico">Apocalíptico</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Battle Royale">Battle Royale</option>
                            <option value="Cartas">Cartas</option>
                            <option value="Casual">Casual</option>
                            <option value="Co-op">Co-op</option>
                            <option value="Corridas">Corridas</option>
                            <option value="Cyberpunk">Cyberpunk</option>
                            <option value="Defesa de Torres">Defesa de Torres</option>
                            <option value="Esporte">Esporte</option>
                            <option value="Estratégia">Estratégia</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção Científica">Ficção Científica</option>
                            <option value="Hack and Slash">Hack and Slash</option>
                            <option value="Investigação">Investigação</option>
                            <option value="Luta">Luta</option>
                            <option value="Metroidvania">Metroidvania</option>
                            <option value="Militar">Militar</option>
                            <option value="Mitologia">Mitologia</option>
                            <option value="Multiplayer">Multiplayer</option>
                            <option value="Mundo Aberto">Mundo Aberto</option>
                            <option value="Pescaria">Pescaria</option>
                            <option value="Piratas">Piratas</option>
                            <option value="Plataformas">Plataformas</option>
                            <option value="PvP">PvP</option>
                            <option value="Quebra-Cabeça">Quebra-Cabeça</option>
                            <option value="Roguelike">Roguelike</option>
                            <option value="Romance visual">Romance visual</option>
                            <option value="RPG">RPG</option>
                            <option value="Sandbox">Sandbox</option>
                            <option value="Simulação">Simulação</option>
                            <option value="Single Player">Single Player</option>
                            <option value="Sobrevivência">Sobrevivência</option>
                            <option value="Steampunk">Steampunk</option>
                            <option value="Tabuleiro">Tabuleiro</option>
                            <option value="Terror">Terror</option>
                            <option value="Tiro em primeira pessoa">Tiro em primeira pessoa</option>
                            <option value="Turnos">Turnos</option>
                            <option value="Zumbis">Zumbis</option>
                        </select>
                    </div>
                    <div id="tag_05_container" style="display:none;  margin-left:3%;">
                        <select id="tag_05" class="form-select" aria-label="Default select example" style="width:200px;">
                            <option selected> - - - </option>
                            <option value="Ação">Ação</option>
                            <option value="Apocalíptico">Apocalíptico</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Battle Royale">Battle Royale</option>
                            <option value="Cartas">Cartas</option>
                            <option value="Casual">Casual</option>
                            <option value="Co-op">Co-op</option>
                            <option value="Corridas">Corridas</option>
                            <option value="Cyberpunk">Cyberpunk</option>
                            <option value="Defesa de Torres">Defesa de Torres</option>
                            <option value="Esporte">Esporte</option>
                            <option value="Estratégia">Estratégia</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção Científica">Ficção Científica</option>
                            <option value="Hack and Slash">Hack and Slash</option>
                            <option value="Investigação">Investigação</option>
                            <option value="Luta">Luta</option>
                            <option value="Metroidvania">Metroidvania</option>
                            <option value="Militar">Militar</option>
                            <option value="Mitologia">Mitologia</option>
                            <option value="Multiplayer">Multiplayer</option>
                            <option value="Mundo Aberto">Mundo Aberto</option>
                            <option value="Pescaria">Pescaria</option>
                            <option value="Piratas">Piratas</option>
                            <option value="Plataformas">Plataformas</option>
                            <option value="PvP">PvP</option>
                            <option value="Quebra-Cabeça">Quebra-Cabeça</option>
                            <option value="Roguelike">Roguelike</option>
                            <option value="Romance visual">Romance visual</option>
                            <option value="RPG">RPG</option>
                            <option value="Sandbox">Sandbox</option>
                            <option value="Simulação">Simulação</option>
                            <option value="Single Player">Single Player</option>
                            <option value="Sobrevivência">Sobrevivência</option>
                            <option value="Steampunk">Steampunk</option>
                            <option value="Tabuleiro">Tabuleiro</option>
                            <option value="Terror">Terror</option>
                            <option value="Tiro em primeira pessoa">Tiro em primeira pessoa</option>
                            <option value="Turnos">Turnos</option>
                            <option value="Zumbis">Zumbis</option>
                        </select>
                    </div>
                    <div id="tag_06_container" style="display:none;  margin-left:3%;">
                        <select id="tag_06" class="form-select" aria-label="Default select example" style="width:200px;">
                            <option selected> - - - </option>
                            <option value="Ação">Ação</option>
                            <option value="Apocalíptico">Apocalíptico</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Battle Royale">Battle Royale</option>
                            <option value="Cartas">Cartas</option>
                            <option value="Casual">Casual</option>
                            <option value="Co-op">Co-op</option>
                            <option value="Corridas">Corridas</option>
                            <option value="Cyberpunk">Cyberpunk</option>
                            <option value="Defesa de Torres">Defesa de Torres</option>
                            <option value="Esporte">Esporte</option>
                            <option value="Estratégia">Estratégia</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção Científica">Ficção Científica</option>
                            <option value="Hack and Slash">Hack and Slash</option>
                            <option value="Investigação">Investigação</option>
                            <option value="Luta">Luta</option>
                            <option value="Metroidvania">Metroidvania</option>
                            <option value="Militar">Militar</option>
                            <option value="Mitologia">Mitologia</option>
                            <option value="Multiplayer">Multiplayer</option>
                            <option value="Mundo Aberto">Mundo Aberto</option>
                            <option value="Pescaria">Pescaria</option>
                            <option value="Piratas">Piratas</option>
                            <option value="Plataformas">Plataformas</option>
                            <option value="PvP">PvP</option>
                            <option value="Quebra-Cabeça">Quebra-Cabeça</option>
                            <option value="Roguelike">Roguelike</option>
                            <option value="Romance visual">Romance visual</option>
                            <option value="RPG">RPG</option>
                            <option value="Sandbox">Sandbox</option>
                            <option value="Simulação">Simulação</option>
                            <option value="Single Player">Single Player</option>
                            <option value="Sobrevivência">Sobrevivência</option>
                            <option value="Steampunk">Steampunk</option>
                            <option value="Tabuleiro">Tabuleiro</option>
                            <option value="Terror">Terror</option>
                            <option value="Tiro em primeira pessoa">Tiro em primeira pessoa</option>
                            <option value="Turnos">Turnos</option>
                            <option value="Zumbis">Zumbis</option>
                        </select>
                    </div>  
                </div>
                <br>
                <div class="taggers02" style="display:flex">
                    <div id="tag_07_container" style="display:none;  margin-left:0%;">
                        <select id="tag_07" class="form-select" aria-label="Default select example" style="width:200px;">
                            <option selected> - - - </option>
                            <option value="Ação">Ação</option>
                            <option value="Apocalíptico">Apocalíptico</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Battle Royale">Battle Royale</option>
                            <option value="Cartas">Cartas</option>
                            <option value="Casual">Casual</option>
                            <option value="Co-op">Co-op</option>
                            <option value="Corridas">Corridas</option>
                            <option value="Cyberpunk">Cyberpunk</option>
                            <option value="Defesa de Torres">Defesa de Torres</option>
                            <option value="Esporte">Esporte</option>
                            <option value="Estratégia">Estratégia</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção Científica">Ficção Científica</option>
                            <option value="Hack and Slash">Hack and Slash</option>
                            <option value="Investigação">Investigação</option>
                            <option value="Luta">Luta</option>
                            <option value="Metroidvania">Metroidvania</option>
                            <option value="Militar">Militar</option>
                            <option value="Mitologia">Mitologia</option>
                            <option value="Multiplayer">Multiplayer</option>
                            <option value="Mundo Aberto">Mundo Aberto</option>
                            <option value="Pescaria">Pescaria</option>
                            <option value="Piratas">Piratas</option>
                            <option value="Plataformas">Plataformas</option>
                            <option value="PvP">PvP</option>
                            <option value="Quebra-Cabeça">Quebra-Cabeça</option>
                            <option value="Roguelike">Roguelike</option>
                            <option value="Romance visual">Romance visual</option>
                            <option value="RPG">RPG</option>
                            <option value="Sandbox">Sandbox</option>
                            <option value="Simulação">Simulação</option>
                            <option value="Single Player">Single Player</option>
                            <option value="Sobrevivência">Sobrevivência</option>
                            <option value="Steampunk">Steampunk</option>
                            <option value="Tabuleiro">Tabuleiro</option>
                            <option value="Terror">Terror</option>
                            <option value="Tiro em primeira pessoa">Tiro em primeira pessoa</option>
                            <option value="Turnos">Turnos</option>
                            <option value="Zumbis">Zumbis</option>
                        </select>
                    </div>
                    <div id="tag_08_container" style="display:none;  margin-left:3%;">
                        <select id="tag_08" class="form-select" aria-label="Default select example" style="width:200px;">
                            <option selected> - - - </option>
                            <option value="Ação">Ação</option>
                            <option value="Apocalíptico">Apocalíptico</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Battle Royale">Battle Royale</option>
                            <option value="Cartas">Cartas</option>
                            <option value="Casual">Casual</option>
                            <option value="Co-op">Co-op</option>
                            <option value="Corridas">Corridas</option>
                            <option value="Cyberpunk">Cyberpunk</option>
                            <option value="Defesa de Torres">Defesa de Torres</option>
                            <option value="Esporte">Esporte</option>
                            <option value="Estratégia">Estratégia</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção Científica">Ficção Científica</option>
                            <option value="Hack and Slash">Hack and Slash</option>
                            <option value="Investigação">Investigação</option>
                            <option value="Luta">Luta</option>
                            <option value="Metroidvania">Metroidvania</option>
                            <option value="Militar">Militar</option>
                            <option value="Mitologia">Mitologia</option>
                            <option value="Multiplayer">Multiplayer</option>
                            <option value="Mundo Aberto">Mundo Aberto</option>
                            <option value="Pescaria">Pescaria</option>
                            <option value="Piratas">Piratas</option>
                            <option value="Plataformas">Plataformas</option>
                            <option value="PvP">PvP</option>
                            <option value="Quebra-Cabeça">Quebra-Cabeça</option>
                            <option value="Roguelike">Roguelike</option>
                            <option value="Romance visual">Romance visual</option>
                            <option value="RPG">RPG</option>
                            <option value="Sandbox">Sandbox</option>
                            <option value="Simulação">Simulação</option>
                            <option value="Single Player">Single Player</option>
                            <option value="Sobrevivência">Sobrevivência</option>
                            <option value="Steampunk">Steampunk</option>
                            <option value="Tabuleiro">Tabuleiro</option>
                            <option value="Terror">Terror</option>
                            <option value="Tiro em primeira pessoa">Tiro em primeira pessoa</option>
                            <option value="Turnos">Turnos</option>
                            <option value="Zumbis">Zumbis</option>
                        </select>
                    </div>  
                    <div id="tag_09_container" style="display:none;  margin-left:3%;">
                        <select id="tag_09" class="form-select" aria-label="Default select example" style="width:200px;">
                            <option selected> - - - </option>
                            <option value="Ação">Ação</option>
                            <option value="Apocalíptico">Apocalíptico</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Battle Royale">Battle Royale</option>
                            <option value="Cartas">Cartas</option>
                            <option value="Casual">Casual</option>
                            <option value="Co-op">Co-op</option>
                            <option value="Corridas">Corridas</option>
                            <option value="Cyberpunk">Cyberpunk</option>
                            <option value="Defesa de Torres">Defesa de Torres</option>
                            <option value="Esporte">Esporte</option>
                            <option value="Estratégia">Estratégia</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção Científica">Ficção Científica</option>
                            <option value="Hack and Slash">Hack and Slash</option>
                            <option value="Investigação">Investigação</option>
                            <option value="Luta">Luta</option>
                            <option value="Metroidvania">Metroidvania</option>
                            <option value="Militar">Militar</option>
                            <option value="Mitologia">Mitologia</option>
                            <option value="Multiplayer">Multiplayer</option>
                            <option value="Mundo Aberto">Mundo Aberto</option>
                            <option value="Pescaria">Pescaria</option>
                            <option value="Piratas">Piratas</option>
                            <option value="Plataformas">Plataformas</option>
                            <option value="PvP">PvP</option>
                            <option value="Quebra-Cabeça">Quebra-Cabeça</option>
                            <option value="Roguelike">Roguelike</option>
                            <option value="Romance visual">Romance visual</option>
                            <option value="RPG">RPG</option>
                            <option value="Sandbox">Sandbox</option>
                            <option value="Simulação">Simulação</option>
                            <option value="Single Player">Single Player</option>
                            <option value="Sobrevivência">Sobrevivência</option>
                            <option value="Steampunk">Steampunk</option>
                            <option value="Tabuleiro">Tabuleiro</option>
                            <option value="Terror">Terror</option>
                            <option value="Tiro em primeira pessoa">Tiro em primeira pessoa</option>
                            <option value="Turnos">Turnos</option>
                            <option value="Zumbis">Zumbis</option>
                        </select>
                    </div>
                    <div id="tag_10_container" style="display:none;  margin-left:3%;">
                        <select id="tag_10" class="form-select" aria-label="Default select example" style="width:200px;">
                            <option selected> - - - </option>
                            <option value="Ação">Ação</option>
                            <option value="Apocalíptico">Apocalíptico</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Battle Royale">Battle Royale</option>
                            <option value="Cartas">Cartas</option>
                            <option value="Casual">Casual</option>
                            <option value="Co-op">Co-op</option>
                            <option value="Corridas">Corridas</option>
                            <option value="Cyberpunk">Cyberpunk</option>
                            <option value="Defesa de Torres">Defesa de Torres</option>
                            <option value="Esporte">Esporte</option>
                            <option value="Estratégia">Estratégia</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção Científica">Ficção Científica</option>
                            <option value="Hack and Slash">Hack and Slash</option>
                            <option value="Investigação">Investigação</option>
                            <option value="Luta">Luta</option>
                            <option value="Metroidvania">Metroidvania</option>
                            <option value="Militar">Militar</option>
                            <option value="Mitologia">Mitologia</option>
                            <option value="Multiplayer">Multiplayer</option>
                            <option value="Mundo Aberto">Mundo Aberto</option>
                            <option value="Pescaria">Pescaria</option>
                            <option value="Piratas">Piratas</option>
                            <option value="Plataformas">Plataformas</option>
                            <option value="PvP">PvP</option>
                            <option value="Quebra-Cabeça">Quebra-Cabeça</option>
                            <option value="Roguelike">Roguelike</option>
                            <option value="Romance visual">Romance visual</option>
                            <option value="RPG">RPG</option>
                            <option value="Sandbox">Sandbox</option>
                            <option value="Simulação">Simulação</option>
                            <option value="Single Player">Single Player</option>
                            <option value="Sobrevivência">Sobrevivência</option>
                            <option value="Steampunk">Steampunk</option>
                            <option value="Tabuleiro">Tabuleiro</option>
                            <option value="Terror">Terror</option>
                            <option value="Tiro em primeira pessoa">Tiro em primeira pessoa</option>
                            <option value="Turnos">Turnos</option>
                            <option value="Zumbis">Zumbis</option>
                        </select>
                    </div>
                </div>
                
                <br>
                <div style="margin-right: 0%; " class="col-auto">
                    <label for="message" class="form-label">Escreva um enredo para um jogo de vidêo-game baseado em...</label>
                    <textarea class="form-control" name="message" id="message" class="form-control" placeholder="escreva aqui." style="height:100px;"></textarea>
                    <br>
                    <button type="button" id="send-message" class="btn btn-primary mb-3" disabled style="margin-left:40%; width: 300px;">
                        <i class="bi bi-sourceforge"></i>
                    </button>
                </div>
            </form>
            
            <section id="messages"></section>
            
        </main>
        <script src="script.js"></script>
        <script src="script0.js"></script>
    </body>
</html>

