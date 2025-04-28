<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="icon" href="COMPS/WEB-INF/logo.png" type="image/png">
            <title>Script Forge</title>
            <?php
                require 'COMPS/WEB-INF/libs/BodyLibs.php';
                require 'COMPS/WEB-INF/libs/HeadLibs.php';
            ?>  
            <link rel="stylesheet" href="..\WEB-INF\styles.css"> 
            <link rel="stylesheet" href="COMPS\WEB-INF\styles.css">   
        </head>
        <body class="d-flex flex-column min-vh-100">
            <?php require "COMPS/navbar/navbar_index.php"; ?>
                     
            <div style="margin-top: 100px; margin-left: 2%; margin-right: 2%; margin-bottom: 100px">
                <form class="mx-auto" style="">
                    <p>Escolha uma categoria para seu jogo, para podermos criar o Script perfeito para você.</p>
                    <?php
                        require 'COMPS/tags/tags.php'
                    ?>
                    <div class="col-auto mx-auto">
                        <label for="message" class="form-label">Escreva um Script para um jogo de vídeo-game baseado em...</label>
                        <textarea class="form-control" name="message" id="message" class="form-control" placeholder="escreva aqui." style="height:100px;"></textarea>
                        <br>
                        <div class="mx-auto d-flex">
                            <button type="button" id="send-message" class="btn btn-primary mb-3 mx-auto" disabled style=" width: 300px;">
                                <i class="bi bi-sourceforge"></i>
                            </button>
                        </div>
                    </div>
                </form>
                
                <section id="messages"></section>

                <?php
                    if(isset($_POST['salvar'])){  
                        history_insert($connect);
                    }
                ?>
            </div>

            <script src="script_chat.js"></script>
        </body>
        <?php require "COMPS/navbar/footer.php";?>
    </html>