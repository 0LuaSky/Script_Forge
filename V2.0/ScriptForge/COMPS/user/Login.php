<?php
    require_once "functions/comun_function.php";
?>
<!DOCTYPE html>
<html data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../WEB-INF/logo.png" type="image/png">
        <title>Faça seu login</title>
        <?php
            require '../WEB-INF/libs/BodyLibs.php';
            require '../WEB-INF/libs/HeadLibs.php';
        ?> 
        <link rel="stylesheet" href="..\WEB-INF\styles.css"> 
        <link rel="stylesheet" href="COMPS\WEB-INF\styles.css"> 
    </head>
    <body class="d-flex flex-column min-vh-100">
        <?php require_once "../navbar/navbar_comps.php"; ?>
        <div style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
            <div class="card mb-3 w-75 mx-auto bg-dark-subtle" style="max-width: ;">
                <div class="row g-0 mx-1 my-4 ">
                    <div class="col-md-5 m-auto">
                        <img src="../WEB-INF/Logo.png" class="img-fluid d-block " alt="ScriptForge"  width="500" height="500">
                    </div>

                    <div class="col-xl-auto px-0 mx-auto md-1">
                        <div class="vr" style="height: 100%; width: 1px;"></div>
                    </div>

                    <div class="col-md-5 mx-auto ">
                        <div class="card-body ">
                            <div class="card-header bg-transparent mb-5"><h2 class="card-title text-center mt-1">Faça seu login</h2></div>

                            <form action="" method="POST">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="form-label">E-mail:</label>
                                    <input  type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com" required>
                                </div>
                                <div class="mb-5">
                                    <label for="exampleFormControlTextarea1" class="form-label">Senha:</label>
                                    <input  type="password" name="senha" class="form-control" id="exampleFormControlInput1" placeholder="Senha" required>
                                </div>
                                <div class="mb-5 text-center me-2">
                                    <button type="submit" name="acessar" class="btn btn-primary w-50">Entrar</button>                                        
                                </div>
                            </form> 
                            <?php
                                if(isset($_POST['acessar'])){
                                    login($connect);
                                }
                            ?>
                        </div>
                        
                        <div class="card-footer bg-transparent text-center">
                            <span>Não possui uma conta?</span>
                            <a href="../user/cadastro.php" class="px-0 mb-3">
                                <span class="ms-1 d-none d-sm-inline"><br>Cadastre-se aqui</span>
                            </a>   
                        </div>
                    </div>
                </div>
            </div>           
        </div>    
    </body>
    <?php require "../navbar/footer.php"; ?>
</html>