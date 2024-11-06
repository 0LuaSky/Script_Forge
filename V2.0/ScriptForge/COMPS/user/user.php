<?php 
    require "functions/comun_function.php";
    require "functions/users_function.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 
    //verifica se uma sessão esta ativa ou não
    $logged = isset($_SESSION['ativa']) ? TRUE : header("location: login.php");
    $admin = isset($_SESSION['adm']) ? TRUE : FALSE;
    $get = isset( $_GET['id'])? TRUE : FALSE;

    if($get) { 
        $id = $_GET['id'];
        $usuario = comum_selectone($connect, "usuarios", $_GET['id']);
        $email= $usuario['nm_email_usuario'];
        $nome = $usuario['nm_usuario'];
        $foto = $usuario['im_usuario'];
    }else{
        $id = $_SESSION['id'];
        $usuario = comum_selectone($connect, "usuarios", $id);
        $email= $usuario['nm_email_usuario'];
        $nome = $usuario['nm_usuario'];
        $foto = $usuario['im_usuario'];
    }
?>

<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="../WEB-INF/logo.png" type="image/png">
            <?php if($get) { ?>
                <title>vizualizando perfil</title>
            <?php }else{ ?>
                <title>Meu perfil</title>
            <?php } ?>
            <?php
                require '../WEB-INF/libs/BodyLibs.php';
                require '../WEB-INF/libs/HeadLibs.php';
            ?> 
        </head>
        
        <body class="d-flex flex-column min-vh-100">
            <div style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
                <?php 
                    require_once "../navbar/navbar_comps.php";
                    require_once "../navbar/sidebar.php"; 
                ?>

                <!-- Caso tenha uma sessao ativa ira aparecer tal texto -->
                
                <?php if($logged) { ?>  

                    <div class="w-75 ">

                        <?php if($get) { ?>
                            <div class="container text-left ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h1>Vizualizando o usuário</h1>
                                    </div>
                                    <div class="col-sm-8">
                                        <h6>
                                            Lembre-se que aqui não é possivel aterar nenhuma informação de usuario enquanto vizualiza ele.
                                            <br><br>
                                            Não compartilhe nenhuma informação daqui.
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        <?php }else{ ?>
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
                        <?php } ?>
                        
                        <hr class="hr" />
                        <br>

                        <div class="w-75 text-center">
                            <img src="data:image/jpeg;base64,<?php echo $foto ?>" class="img-fluid rounded-circle mx-auto d-block" alt="image"  width="500" height="500">
                            <br>
                            <h3>
                                <?php if($get) { 
                                    echo "ID: " . $id. " - ";
                                }
                                echo $nome . " - " . $email ?>
                            </h3>
                            <br>
                            <hr class="hr" />
                        </div>

                        <br>
                        
                        <div class="w-75 text-left">
                            <div class="row">
                                <h1>Edite o seu perfil:</h1>

                                <form action="" class="row g-3" method="post" enctype="multipart/form-data">
                                    <div class="col-auto">
                                        <h6>Foto:</h6>
                                        <div class="mb-3">
                                            <input class="form-control" type="file" name="imagem" accept="image/*" required>
                                        </div>
                                    </div>
                                    <div class="col-auto ms-auto me-1">
                                        <br>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#picture">Alterar</button>                                        
                                    </div>
                                    <div class="modal fade" id="picture" tabindex="-1" aria-labelledby="pictureLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="pictureLabel">Deseja mudar sua foto de perfil?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary mb-3 ms-auto" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary mb-3 me-auto" name="atualizarfoto">salvar mudanças</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['atualizarfoto'])) {
                                        updatepicture($connect);
                                    }
                                ?>

                                <form class="row g-3" method="post">
                                    <div class="col-auto">
                                        <h6>Nome:</h6>
                                        <input type="text" name="username" placeholder="<?php echo $nome; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-auto ms-auto me-1">
                                        <br>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#username">Alterar</button>                                        
                                    </div>
                                    <div class="modal fade" id="username" tabindex="-1" aria-labelledby="usernameLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content"> 
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="usernameLabel">Deseja mudar seu username?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary mb-3 ms-auto" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary mb-3 me-auto" name="atualizarnome">salvar mudanças</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['atualizarnome'])) {
                                        updatename($connect);
                                    }
                                ?>
                                
                                <form class="row g-3" method="post">
                                    <div class="col-auto">
                                        <h6>e-mail:</h6>
                                        <input value="" type="text" name="email" placeholder="<?php echo $email; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-auto ms-auto me-1">
                                        <br>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#email">Alterar</button>                                        
                                    </div>
                                    <div class="modal fade" id="email" tabindex="-1" aria-labelledby="emailLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content"> 
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="emailLabel">Deseja mudar seu email?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary mb-3 ms-auto" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary mb-3 me-auto" name="atualizaremail">salvar mudanças</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['atualizaremail'])) {
                                        updateemail($connect);
                                    }
                                ?>
                                
                                <form class="row g-3" method="post">
                                    <div class="col-auto">
                                        <h6>senha:</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="password" name="senha1" placeholder="Senha" class="form-control" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="senha2" placeholder="Confirme sua senha" class="form-control" required>
                                            </div>
                                        </div>
                                        <span id="passwordHelpInline" class="form-text">
                                            A senha deve ter ao menos 4 caracteres.
                                        </span>
                                    </div>
                                    <div class="col-auto ms-auto me-1">
                                        <br>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#senha">Alterar</button>                                        
                                    </div>
                                    <div class="modal fade" id="senha" tabindex="-1" aria-labelledby="senhaLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content"> 
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="senhaLabel">Deseja mudar sua senha?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary mb-3 ms-auto" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary mb-3 me-auto" name="atualizarsenha">salvar mudanças</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['atualizarsenha'])) {
                                        updatesenha($connect);
                                    }
                                ?>
                            </div>
                        </div>

                        <br>
                        <hr class="hr" />
                        <br>

                        <div class="w-75 text-left">
                            <div class="row">
                                <h3>Excluir o perfil</h3>

                                <form class="row g-3" method="post">
                                    <div class="col-7 ms-2">
                                        <h7>
                                            ATENÇÃO! Excluir o perfil fara com que você perca todas as suas informações,
                                            incluindo seus históricos salvos. Essa ação não pode ser desfeita.
                                        </h7>
                                    </div>
                                    <div class="col-auto ms-auto me-1">
                                        <br>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#apagar">Exluir</button>                                        
                                    </div>
                                    <div class="modal fade" id="apagar" tabindex="-1" aria-labelledby="apagarLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content"> 
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="apagarLabel">Deseja MESMO apagar a sua conta?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ATENÇÃO! Essa ação não pode ser desfeita, apagar seu perfil resultara na perda de
                                                    qualquer informação salva incluído seu histórico e não pode ser recuperado.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary mb-3 ms-auto" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger mb-3 me-auto" name="excluir">Excluir</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST['excluir'])) {
                                        users_delete($connect);
                                    }
                                ?>
                            </div>
                        </div>
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