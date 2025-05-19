<?php 
    require_once "functions/admin_function.php";
    require_once "functions/comun_function.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 

    //verifica se uma sessão esta ativa ou não
    $logged = isset($_SESSION['ativa']) ? TRUE : header("location: login.php");
    $admin = isset($_SESSION['adm']) ? TRUE : header("location: user.php");
    if(!isset( $_GET['id'])) { header("location: user.php"); }

    if(isset( $_GET['id'])) {
        $id = $_GET['id'];
        $usuario = selectone($connect, "usuarios", $id);
        if(isset($_POST['atualizar'])){
            admin_update($connect);
        } 
     } 
?>

<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="../WEB-INF/logo.png" type="image/png">
            <title>Alterando <?php echo $usuario['nm_usuario']?></title>
            <?php
                require '../WEB-INF/libs/BodyLibs.php';
                require '../WEB-INF/libs/HeadLibs.php';
            ?>
            <link rel="stylesheet" href="..\WEB-INF\styles.css"> 
        </head>
        <body class="d-flex flex-column min-vh-100">
            <div style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
                <?php
                    require_once "../navbar/sidebar.php";
                    require_once "../navbar/navbar_comps.php";
                ?>
                <div class="card mb-3 w-50 mx-auto" style="max-width: ;">
                    <div class="row g-0 mx-1 my-4">
                        <div class="col-md-auto mx-auto">
                            <div class="card-body">
                                <div class="card-header bg-transparent mb-5"><h2 class="card-title text-center mt-1">Alterando o usuario <?php echo $usuario['nm_usuario']; ?></h2></div>
                                

                                <form action="" method="POST">
                                    <input value="<?php echo $usuario['sg_admin_s']; ?>" type="hidden" name="admin">
                                    <input value="<?php echo $usuario['cd_usuario']; ?>" type="hidden" name="id">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Username:</label>
                                        <input value="<?php echo $usuario['nm_usuario']; ?>" type="text" name="usarname" class="form-control" id="exampleFormControlInput1" placeholder="<?php echo $usuario['nm_usuario']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">E-mail:</label>
                                        <input value="<?php echo $usuario['nm_email_usuario']; ?>" type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Senha:</label>
                                        <input  type="password" name="senha1" class="form-control" id="exampleFormControlInput1" placeholder="Senha">
                                    </div>
                                    <div class="mb-5">
                                        <label for="exampleFormControlTextarea1" class="form-label">Repita sua senha:</label>
                                        <input  type="password" name="senha2" class="form-control" id="exampleFormControlInput1" placeholder="Senha">
                                    </div>
                                    <div class="mb-5 text-center me-2">
                                        <button type="submit" name="atualizar" class="btn btn-primary w-50">atualizar</button>                                        
                                    </div>
                                </form> 
                                <?php
                                    if(isset($_POST['atualizar'])){
                                        admin_update($connect);
                                    }
                                ?>
                            </div>
                            
                            <div class="card-footer bg-transparent text-center">
                                <a href="../user/admin.php" class="px-0 mb-3">
                                    <span class="ms-1 d-none d-sm-inline"><br>Voltar</span>
                                </a>   
                            </div>
                        </div>
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