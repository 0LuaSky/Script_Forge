<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 
    require_once "functions/history_function.php";
    require_once "functions/comun_function.php";

    $logged = isset($_SESSION['ativa']) ? TRUE : header("location: login.php");

    $get = isset( $_GET['fakeid'])? TRUE : FALSE;

    if($get){
        $id = $_GET['fakeid'];
        $usuario = comum_selectone($connect, "usuarios", $id);
        $nome = $usuario['nm_usuario'];
    }else{
        $id = $_SESSION['id'];
    }

    $roteiros = history_selectall($connect, "historico", $id);
    $roteiro = history_selectone($connect, "historico", $id);
?>

<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="../WEB-INF/logo.png" type="image/png">
            <title>historico</title>

            <link rel="stylesheet" href="..\WEB-INF\styles.css"> 

            <?php
                require '../WEB-INF/libs/BodyLibs.php';
                require '../WEB-INF/libs/HeadLibs.php';
            ?> 
        </head>
        <body class="d-flex flex-column min-vh-100">
            <div style="margin-top: 100px; margin-left: 2%; margin-right: 2%; margin-bottom: 100px;">
                <?php require_once "../navbar/navbar_comps.php"; ?>
                <?php require_once "../navbar/sidebar.php"; ?>

                <div>

                    <div class="container text-center ">
                        <div class="row ">
                            <div class="col-sm-3">
                                <h1 class="">Histórico</h1>
                            </div>
                            <?php if($get) { ?>
                                <div class="col-sm-8">
                                    <h4>
                                        Vizualize todos os roteiros salvos de <?php echo $nome ?> aqui.
                                    </h4>
                                </div>
                            <?php } else { ?>
                                <div class="col-sm-8">
                                    <h4>
                                        Vizualize todos os seus roteiros salvos aqui.
                                    </h4>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <hr class="hr" />
                    <br>
                        <br>

                    <div class="row g-3">
                        <?php foreach ($roteiros as $roteiros) : ?>
                            <?php
                                $text = $roteiros['ds_resposta'];                                
                                // Calcula o novo limite de caracteres
                                $limite = 300 - ( strlen($roteiros['nm_titulo']));
                                
                                // Verifica se o limite é positivo e maior que zero para evitar erros
                                if ($limite > 0) {
                                    // Primeiro, corta a string até o limite desejado
                                    $textoCurto = substr($text, 0, $limite);
                                
                                    // Verifica se o último caractere é uma parte de uma palavra cortada
                                    if (strlen($text) > $limite && substr($text, $limite, 1) !== ' ') {
                                        // Encontra o último espaço antes do corte
                                        $posUltimoEspaco = strrpos($textoCurto, ' ');
                                        if ($posUltimoEspaco !== false) {
                                            $textoCurto = substr($textoCurto, 0, $posUltimoEspaco);
                                        }
                                    }
                                
                                    
                                }
                            ?>
                            <div class="col-4 d-flex flex-column mb-5">
                                <div class="card h-100">
                                    <div class="card-header ">
                                        <div class="text-end">
                                            <small class="text-body-secondary text-end">Alterado pela ultima vez em <?php echo $roteiros['dt_alterado'] ?></small>
                                        </div>
                                        <img src="data:image/jpeg;base64,<?php echo $roteiros['im_resposta'] ?>" class="img-fluid rounded mx-auto d-block" alt="image" >
                                        <h3 class="card-title"><?php echo $roteiros['nm_titulo'] ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $textoCurto. "..." ?></p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <?php
                                            if($get){
                                                $url = "?fakeid=" . $id . "&id=". $roteiros['cd_historico'];
                                            }else{
                                                $url = "?id=". $roteiros['cd_historico'];
                                            }
                                        ?>
                                        <a class="btn btn-primary" href="historico.php<?php echo $url ?>">Expandir</a>

                                    </div>
                                </div>
                            </div>
                            
                        <?php endforeach; ?>    
                        <?php if (isset($_GET['id'])) {?>

                            <div class="modal fade" id="expand" tabindex="-1" aria-labelledby="expandLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="expandLabel"><?php echo $roteiro['nm_titulo'] ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <br>    
                                        </div>
                                        <div class="modal-body">
                                            <img src="data:image/jpeg;base64,<?php echo $roteiros['im_resposta'] ?>" class="img-fluid rounded mx-auto d-block" alt="image" >
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center mb-5">
                                                <h1 class="modal-title fs-5" id="expandLabel"><?php echo $roteiro['nm_titulo'] ?></h1>
                                            </div>

                                            <div class="row">
                                                <?php if(!empty($roteiro['nm_tag01'])){ ?>
                                                    <h5 class="rounded border m-2 w-auto" id="expandLabel"><?php echo $roteiro['nm_tag01'] ?></h5>
                                                <?php } ?>
                                                <?php if(!empty($roteiro['nm_tag02'])){ ?>
                                                    <h5 class="rounded border m-2 w-auto" id="expandLabel"><?php echo $roteiro['nm_tag02'] ?></h5>
                                                <?php } ?>
                                                <?php if(!empty($roteiro['nm_tag03'])){ ?>
                                                    <h5 class="rounded border m-2 w-auto" id="expandLabel"><?php echo $roteiro['nm_tag03'] ?></h5>
                                                <?php } ?>
                                                <?php if(!empty($roteiro['nm_tag04'])){ ?>
                                                    <h5 class="rounded border m-2 w-auto" id="expandLabel"><?php echo $roteiro['nm_tag04'] ?></h5>
                                                <?php } ?>
                                                <?php if(!empty($roteiro['nm_tag05'])){ ?>
                                                    <h5 class="rounded border m-2 w-auto" id="expandLabel"><?php echo $roteiro['nm_tag05'] ?></h5>
                                                <?php } ?>
                                                <?php if(!empty($roteiro['nm_tag06'])){ ?>
                                                    <h5 class="rounded border m-2 w-auto" id="expandLabel"><?php echo $roteiro['nm_tag06'] ?></h5>
                                                <?php } ?>
                                                <?php if(!empty($roteiro['nm_tag07'])){ ?>
                                                    <h5 class="rounded border m-2 w-auto" id="expandLabel"><?php echo $roteiro['nm_tag07'] ?></h5>
                                                <?php } ?>
                                                <?php if(!empty($roteiro['nm_tag08'])){ ?>
                                                    <h5 class="rounded border m-2 w-auto" id="expandLabel"><?php echo $roteiro['nm_tag08'] ?></h5>
                                                <?php } ?>
                                                <?php if(!empty($roteiro['nm_tag09'])){ ?>
                                                    <h5 class="rounded border m-2 w-auto" id="expandLabel"><?php echo $roteiro['nm_tag09'] ?></h5>
                                                <?php } ?>
                                                <?php if(!empty($roteiro['nm_tag10'])){ ?>
                                                    <h5 class="rounded border m-2 w-auto" id="expandLabel"><?php echo $roteiro['nm_tag10'] ?></h5>
                                                <?php } ?>
                                            </div>

                                            <div class="text-start w-75 mt-2 mb-5">
                                                <span class="form-control">Um roteiro para um jogo de videogame baseado em:<br><?php echo $roteiros['ds_prompt'] ?></span>
                                            </div>

                                            <div class="w-75 ms-auto mb-5">
                                                <span class="form-control"><?php echo $roteiros['ds_resposta'] ?></span>
                                            </div>
                                        
                                            </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary mx-3" data-bs-dismiss="modal">fechar</button>
                                            <?php if(!$get){ ?>
                                                <form action="" method="post">
                                                    <button type="submit" class="btn btn-danger" name="delete">Excluir</button>
                                                </form>
                                                <?php if(isset($_POST['delete'])) { 
                                                    history_delete($connect);
                                                } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                // Espera o documento carregar e abre o modal
                                document.addEventListener('DOMContentLoaded', function () {
                                    var myModal = new bootstrap.Modal(document.getElementById('expand'));
                                    myModal.show();
                                });
                            </script>
                        <?php } ?>
                    </div>
                </div>
                
                
<!-- divs que fecham a sidebar -->
</div>
</div>
</div>
<br>
<br>
<br>
            </div>
        </body>
        <?php require "../navbar/footer.php";?>
    </html>