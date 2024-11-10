<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="icon" href="COMPS/WEB-INF/logo.png" type="image/png">
            <title>ScriptForge</title>
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
                    <p>Escolha uma categoria para seu jogo, para podermos criar o roteiro perfeito para você.</p>
                    <?php
                        require 'COMPS/tags/tags.php'
                    ?>
                    <div class="col-auto">
                        <label for="message" class="form-label">Escreva um enredo para um jogo de vídeo-game baseado em...</label>
                        <textarea class="form-control" name="message" id="message" class="form-control" placeholder="escreva aqui." style="height:100px;"></textarea>
                        <br>
                        <div class="mx-auto">
                            <button type="button" id="send-message" class="btn btn-primary mb-3" disabled style="margin-left:40%; width: 300px;">
                                <i class="bi bi-sourceforge"></i>
                            </button>
                        </div>
                    </div>
                </form>
                
                <br><br><br><br><br>
        <div id="resposta">
            <div class="image-name" style="display:flex">
                <i class="bi bi-cup-hot"></i>
                <h4>&nbsp${tittleGPT}</h4>
            </div>
            <div class="mb-3" id="gptResponse">
                <label for="response" class="form-label"></label>
                <textarea readonly class="form-control" id="messages" style="height:400px;"> ${responseGPT} </textarea>
            </div>
            <form action="" class="row g-3" method="post" onsubmit="handleSubmit(event)">
                <div class="col-auto m-auto">
                    <br>
                    <button type="button" class="btn btn-primary ms-auto me-1" data-bs-toggle="modal" data-bs-target="#save" style=" width: 300px;">Salvar</button>                                        
                    <button type="button" class="btn btn-primary me-auto" data-bs-toggle="modal" data-bs-target="#save" style=" width: 300px;">Elaborar(não implementado)</button>                                        
                </div>
                <div class="modal fade" id="save" tabindex="-1" aria-labelledby="saveLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="saveLabel">Deseja salvar este roteiro?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <input value="${tittleGPT}" type="hidden" name="titulo">
                                <input value="${responseGPT}" type="hidden" name="resposta">
                                <input value="${op01}" type="hidden" name="op01">
                                <input value="${op02}" type="hidden" name="op02">
                                <input value="${op03}" type="hidden" name="op03">
                                <input value="${op04}" type="hidden" name="op04">
                                <input value="${op05}" type="hidden" name="op05">
                                <input value="${op06}" type="hidden" name="op06">
                                <input value="${op07}" type="hidden" name="op07">
                                <input value="${op08}" type="hidden" name="op08">
                                <input value="${op09}" type="hidden" name="op09">
                                <input value="${op10}" type="hidden" name="op10">
                                <button type="button" class="btn btn-secondary mb-3 ms-auto" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary mb-3 me-auto" name="salvar">salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <script>
            /*function handleSubmit(event) {
                event.preventDefault(); // Previne o recarregamento da página
                console.log('Formulário enviado!');
                alert('Formulário enviado com sucesso!');
            }*/
        </script>

                <?php
                    if(isset($_POST['salvar'])){
                        ?><script>
                            alert('Formulário enviado com sucesso!');
                            require 'COMPS/user/functions/history_function.php';
                            history_aviso("foi","ebaaaa", "main.php");
                        </script>
                        <?php
                    }
                ?>
            </div>

            <script src="script_chat.js"></script>
        </body>
        <?php require "COMPS/navbar/footer.php";?>
    </html>