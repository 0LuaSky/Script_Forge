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

            <?php if(isset($_GET['id'])){
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                require_once "COMPS/user/functions/history_function.php";

                $cd_usuario = $_SESSION['id'];
                $id_historico = $_GET['id'];
                $history_data = history_selectone($connect, "historico", $cd_usuario, $id_historico);

                // Pegando as tags dinamicamente
                $tags = [];
                for ($i = 1; $i <= 10; $i++) {
                    $key = 'nm_tag' . str_pad($i, 2, '0', STR_PAD_LEFT); // nm_tag01, nm_tag02, ...
                    $tags[] = json_encode($history_data[$key] ?? '');
                }

                // Demais campos
                $prompt = json_encode($history_data['ds_prompt'] ?? '');
                $resposta = json_encode($history_data['ds_resposta'] ?? '');
                $titulo = json_encode($history_data['nm_titulo'] ?? '');

                ?>
                
                <script>
                    let op01 = <?php echo $tags[0]; ?>;
                    let op02 = <?php echo $tags[1]; ?>;
                    let op03 = <?php echo $tags[2]; ?>;
                    let op04 = <?php echo $tags[3]; ?>;
                    let op05 = <?php echo $tags[4]; ?>;
                    let op06 = <?php echo $tags[5]; ?>;
                    let op07 = <?php echo $tags[6]; ?>;
                    let op08 = <?php echo $tags[7]; ?>;
                    let op09 = <?php echo $tags[8]; ?>;
                    let op10 = <?php echo $tags[9]; ?>;

                    const Originalprompt = <?php echo $prompt; ?>;
                    const OriginalResponseGPT = <?php echo $resposta; ?>;
                    const tittleGPT = <?php echo $titulo; ?>;
                </script>

            <?php }else{ ?>
                <script>
                    let op01 = sessionStorage.getItem("tag01");
                    let op02 = sessionStorage.getItem("tag02");
                    let op03 = sessionStorage.getItem("tag03");
                    let op04 = sessionStorage.getItem("tag04");
                    let op05 = sessionStorage.getItem("tag05");
                    let op06 = sessionStorage.getItem("tag06");
                    let op07 = sessionStorage.getItem("tag07");
                    let op08 = sessionStorage.getItem("tag08");
                    let op09 = sessionStorage.getItem("tag09");
                    let op10 = sessionStorage.getItem("tag10");

                    const Originalprompt = sessionStorage.getItem("prompt");
                    const OriginalResponseGPT = sessionStorage.getItem("resposta");
                    const tittleGPT = sessionStorage.getItem("titulo");
                </script>
            <?php } ?>

            <script>
                let op00 = "";
                if(op01 != ""){
                    op00 += `"` + op01;

                    if (op02 != "") {
                        op00 += `, ` + op02;
                    }
                    if (op03 != "") {
                        op00 += `, ` + op03;
                    }
                    if (op04 != "") {
                        op00 += `, ` + op04;
                    }
                    if (op05 != "") {
                        op00 += `, ` + op05;
                    }
                    if (op06 != "") {
                        op00 += `, ` + op06;
                    }
                    if (op07 != "") {
                        op00 += `, ` + op07;
                    }
                    if (op08 != "") {
                        op00 += `, ` + op08;
                    }
                    if (op09 != "") {
                        op00 += `, ` + op09;
                    }
                    if (op10 != "") {
                        op00 += `, ` + op10;
                    }

                    op00 += `"`;
                }
            </script>

        </head>

        <body class="d-flex flex-column min-vh-100">
            <?php require "COMPS/navbar/navbar_index.php"; ?>
                     
            <div class="mx-3 pt-5 mb-5 mt-5">
                <div class="bg-dark-subtle rounded-5 border">
                    <div class="m-4 pb-3">
                        <a class="row " href="main.php">                        
                            <p class="col-sm-1" clasa="h6">
                                <i class="bi bi-arrow-left-short"></i>Voltar
                            </p>
                        </a>

                        <form class="mx-auto mb-4">
                            <div class="d-flex align-items-center mb-4">
                                <input type="text" id="titulo" class="form-control-plaintext h2 text-center" value="titulo">
                            </div>

                            <div class="col-auto mx-auto">
                                <div class="rounded-5 border mb-5">
                                    <div class="m-3 mb-5">
                                        <script>
                                            document.write(`<label for="original-prompt" class="form-label h5 mb-4 ms-2">Um jogo de videogame ${op00} baseado em "${Originalprompt}"</label>`);
                                        </script>
                                        
                                        <textarea class="form-control me-5 overflow-hidden mb-4" name="original-prompt" id="original-prompt" placeholder="roteiro" style="height:300px;"></textarea>
                                    </div>
                                </div>

                                <section id="messages">
                                </section>

                                <div class="bg-dark-subtle rounded-5 border">
                                    <div class="row mx-auto d-flex mt-2">
                                        <div class="col-3">
                                            <button type="button" id="character-buttom" class="btn btn-primary mb-3 mx-auto w-100 rounded-5" onclick="character()">Personagens</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" id="cenary-buttom" class="btn btn-primary mb-3 mx-auto w-100 rounded-5" onclick="scenary()">Cenário</button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" id="history-buttom" class="btn btn-primary mb-3 mx-auto w-100 rounded-5" onclick="history()">História</button>
                                        </div>
                                    </div>

                                    <div class="row mx-auto d-flex ">
                                        <div class="col-10">
                                            <textarea class="form-control me-5 rounded-5 h-50" type="text" name="message" id="message" placeholder="Elabore mais o texto..."></textarea>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" id="send-message" class="btn btn-primary mb-3 mx-auto w-100 rounded-5" onclick="elaborate()">Elabore</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        

                        
                        <section id="saves">
                            
                        </section-->

                        <?php                
                            $isAtiva = isset($_SESSION['ativa']) ? 'true' : 'false';
                        ?>
                        <script>
                            const sessaoAtiva = <?php echo $isAtiva; ?>;

                            document.getElementById("original-prompt").value = OriginalResponseGPT;
                            document.getElementById("titulo").value = tittleGPT;
                        </script>

                        <?php
                            if(isset($_POST['salvar'])){  
                                if(isset($_GET['id'])){
                                    history_update($connect);
                                }else{
                                    history_insert($connect);
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <script src="elaborate.js"> </script>
        </body>
        <?php require "COMPS/navbar/footer.php";?>
    </html>