<?php
    require_once "functions/comun_function.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $logged = isset($_SESSION['ativa']);
    $admin = isset($_SESSION['adm']);

    if($logged){
        if($admin){
            require_once "functions/admin_function.php";
        }else{
            header("location: user.php");
        }
    }
?>
<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="../WEB-INF/logo.png" type="image/png">
            <title>Faça seu cadastro</title>
            <?php
                require '../WEB-INF/libs/BodyLibs.php';
                require '../WEB-INF/libs/HeadLibs.php';
            ?> 
            <link rel="stylesheet" href="..\WEB-INF\styles.css"> 
        </head>
        <body class="d-flex flex-column min-vh-100">
            <div style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
            <?php 
                require_once "../navbar/navbar_comps.php";
                if($admin) { 
                    require_once "../navbar/sidebar.php";
                }
            ?>
                <div class="card mb-3 w-75 mx-auto" style="max-width: ;">
                    <div class="row g-0 mx-1 my-4">
                        <div class="col-md-5 mx-auto">
                            <div class="card-body">
                                <?php if(!$admin) { ?>
                                    <div class="card-header bg-transparent mb-5"><h2 class="card-title text-center mt-1">Faça seu cadastro.</h2></div>
                                <?php }else {?>
                                    <div class="card-header bg-transparent mb-5"><h2 class="card-title text-center mt-1">Cadastre o usuario.</h2></div>
                                <?php } ?>

                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Username:</label>
                                        <input  type="text" name="usarname" class="form-control" id="exampleFormControlInput1" placeholder="Nome" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">E-mail:</label>
                                        <input  type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Senha:</label>
                                        <input  type="password" name="senha1" class="form-control" id="exampleFormControlInput1" placeholder="Senha" required>
                                    </div>
                                    <div class="mb-5">
                                        <label for="exampleFormControlTextarea1" class="form-label">Repita sua senha:</label>
                                        <input  type="password" name="senha2" class="form-control" id="exampleFormControlInput1" placeholder="Senha" required>
                                    </div>
                                    <div class="mb-5 text-center me-2">
                                        <button type="submit" name="cadastrar" class="btn btn-primary w-50">Cadastrar</button>                                        
                                    </div>
                                </form> 
                                <?php
                                    if(isset($_POST['cadastrar'])){
                                        if($admin){
                                            admin_insert($connect);
                                        }else{
                                            comum_insert($connect);
                                        }
                                    }
                                ?>
                            </div>
                            
                            <?php if(!$admin) { ?>
                                <div class="card-footer bg-transparent text-center">
                                    <span>Ja possui uma conta?</span>
                                    <a href="../user/Login.php" class="px-0 mb-3">
                                        <span class="ms-1 d-none d-sm-inline"><br>Conecte-se aqui</span>
                                    </a>   
                                </div>
                            <?php }else {?>
                                <div class="card-footer bg-transparent text-center">
                                    <a href="../user/admin.php" class="px-0 mb-3">
                                        <span class="ms-1 d-none d-sm-inline"><br>Voltar</span>
                                    </a>   
                                </div>
                            <?php } ?>
                        </div>
                        
                        <div class="col-xl-auto px-0 mx-auto md-1">
                            <div class="vr" style="height: 100%; width: 1px;"></div>
                        </div>
                        
                        <div class="col-md-5 m-auto">
                            <img src="../WEB-INF/Logo.png" class="img-fluid d-block " alt="ScriptForge"  width="500" height="500">
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
        <?php require "../navbar/footer.php"; ?>
    </html>