<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>ScriptForge</title>
            <link rel="stylesheet" href="style.css"/>
            <?php
                require 'COMPS/WEB-INF/libs/BodyLibs.php';
                require 'COMPS/WEB-INF/libs/HeadLibs.php';
            ?>    
        </head>
        <body>
            <?php require "COMPS/navbar/navbar_index.php"; ?>
                     
            <body style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
                <form style="margin-right: 0%;">
                    <p>Escolha uma categoria para seu jogo, para que possamos criar o roteiro perfeito para você</p>

                    <?php
                        require 'COMPS/tags/tags.php'
                    ?>

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

            <script src="script_chat.js"></script>
        </body>
    </html>