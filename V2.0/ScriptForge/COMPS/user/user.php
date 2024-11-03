<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 
    require_once "functions/comun_function.php";
    require_once "functions/users_function.php";
    //verifica se uma sessão esta ativa ou não
    $logged = isset($_SESSION['ativa']) ? TRUE : header("location: login.php");
    $admin = isset($_SESSION['adm']) ? TRUE : FALSE;

    if(isset( $_GET['id'])) { 
        $id = $_GET['id'];
        $usuario = selectone($connect, "usuarios", $id);
        if(isset($_POST['atualizar'])){
            update($connect);
        }
    }else{
        $id = $_SESSION['id'];
    }

    $usuario = selectone($connect, "usuarios", $id);
    $foto = $usuario['im_usuario'];
?>

<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <?php
                require '../WEB-INF/libs/BodyLibs.php';
                require '../WEB-INF/libs/HeadLibs.php';
            ?> 
        </head>
        
        <body class="d-flex flex-column min-vh-100">
            <div style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
                <?php require_once "../navbar/navbar_comps.php"; ?>
                <?php require_once "../navbar/sidebar.php"; ?>

                <!-- Caso tenha uma sessao ativa ira aparecer tal texto -->
                
                <?php if($logged) { ?>  

                    <div class="w-75 ">

                        <div class="container text-left ">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h1>Meu perfil</h1>
                                </div>
                                <div class="col-sm-8">
                                <h6>
                                    Configure o seu perfil da forma que preferir.
                                    <br><br>
                                    Lembre-se de não compartilhar seus dados pessoais com ninguem.
                                </h6>
                                </div>
                            </div>
                        </div>
                        
                        <hr class="hr" />
                        <br>

                        <div class="w-75 text-center">
                            <img src="data:image/jpeg;base64,<?php echo $foto ?>" class="img-fluid rounded-circle mx-auto d-block" alt="image"  width="500" height="500">
                            <br>
                            <h3><?php echo $usuario['nm_usuario']; ?> - <?php echo $usuario['nm_email_usuario'] ?> </h3>
                            <br>
                            <hr class="hr" />
                        </div>

                        <br>
                        
                        <div class="w-75 text-left">
                            <div class="row">
                                <h1>Edite o seu perfil:</h1>

                                <form class="row g-3" method="post" enctype="multipart/form-data">
                                    <div class="col-auto">
                                        <h6>Foto:</h6>
                                        <div class="mb-3">
                                            <input class="form-control" type="file" name="imagem" accept="image/*" required>
                                        </div>
                                    </div>
                                    <div class="col-auto ms-auto me-1">
                                        <br>
                                        <button type="submit" class="btn btn-primary mb-3" name="atualizarfoto">Alterar</button>
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['atualizarfoto'])) {
                                        // Verifica se o arquivo foi enviado sem erros
                                        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
                                            // Lê o conteúdo do arquivo
                                            $img = file_get_contents($_FILES['imagem']['tmp_name']);
                                            
                                            // Codifica a imagem em base64
                                            $foto = base64_encode($img);
                                            
                                            // Exibe a imagem em Base64
                                            //echo '<img src="data:image/jpeg;base64,' . $foto . '" class="img-fluid rounded-circle mx-auto d-block" alt="image" width="50" height="50">';
                                        } else {
                                            //echo 'Erro ao carregar a imagem.';
                                        }
                                    }
                                ?>

                                <form class="row g-3">
                                    <div class="col-auto">
                                        <h6>Nome:</h6>
                                        <input type="text" name="usarname" placeholder="<?php echo $usuario['nm_usuario']; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-auto ms-auto me-1">
                                        <br>
                                        <button type="submit" class="btn btn-primary mb-3" name="atualizarnome">Alterar</button>
                                    </div>
                                </form>
                                
                                <form class="row g-3">
                                    <div class="col-auto">
                                        <h6>e-mail:</h6>
                                        <input value="" type="text" name="email" placeholder="<?php echo $usuario['nm_email_usuario']; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-auto ms-auto me-1">
                                        <br>
                                        <button type="submit" class="btn btn-primary mb-3" name="atualizaremail">Alterar</button>
                                    </div>
                                </form>
                                
                                <form class="row g-3">
                                    <div class="col-auto">
                                        <h6>senha:</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" name="senha1" placeholder="Senha" class="form-control" required>
                                            </div>
                                            <div class="col-sm-6">
                                            <input type="text" name="senha2" placeholder="Confirme sua senha" class="form-control" required>
                                            </div>
                                        </div>
                                        <span id="passwordHelpInline" class="form-text">
                                            A senha deve ter ao menos 4 caracteres.
                                        </span>
                                    </div>
                                    <div class="col-auto ms-auto me-1">
                                        <br>
                                        <button type="submit" class="btn btn-primary mb-3" name="atualizarsenha">Alterar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <br>
                        <hr class="hr" />
                        <br>

                        <div class="w-75 text-left">
                            <div class="row">
                                <h3>Excluir o perfil</h3>

                                <form class="row g-3">
                                    <div class="col-7 ms-2">
                                        <h7>
                                            ATENÇÃO! Excluir o perfil fara com que você perca todas as suas informações,
                                            incluindo seus históricos salvos. Essa ação não pode ser desfeita:
                                        </h7>
                                    </div>
                                    <div class="col-auto ms-auto me-1">
                                        <br>
                                        <button type="submit" class="btn btn-danger mb-3" name="excluir">excluir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php

                        ?>
                    </div>
                <?php } ?>
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