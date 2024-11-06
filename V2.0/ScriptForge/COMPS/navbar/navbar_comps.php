<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $logged = isset($_SESSION['ativa']) ? TRUE : FALSE;
    if($logged){
        require_once "functions/comun_function.php";

        $nav_usuario = comum_selectone($connect, "usuarios", $_SESSION['id']);
        $nav_nome = $nav_usuario['nm_usuario'];
        $nav_imagem = $nav_usuario['im_usuario'];
    }
?>
<!DOCTYPE html>
    <html lang="en">
        <head>      
            <style>
                .shared-style {
                    display: flex;
                    align-items: center;
                    color: inherit; /* Mantém a cor de texto original */
                    font-size: 32px;
                    text-decoration: none; /* Remove sublinhado do <a> */
                    padding: 0;
                    border: none; /* Remove borda de botões */
                    background: none; /* Remove cor de fundo de botões */
                }

                .shared-img {
                    width: 45px;
                    height: 45px;
                    border-radius: 50%; /* Certifica-se de que a imagem seja circular */
                }
            </style>
        </head>
        <body>          
            <nav class="navbar bg-body-tertiary fixed-top">
                <div class="container-fluid navbar-brand">
                    <span style="font-size: 32px">
                        <a class="nav-link" href="../../main.php">
                            <div class="row">
                                <div class="col-sm-auto">
                                    <img src="../WEB-INF/Logo.png" class="img-fluid d-block " alt="ScriptForge"  width="50" height="50" onerror="this.onerror=null; this.src='COMPS/WEB-INF/Logo.png';">
                                </div>
                                <div class="col-sm-auto">
                                    Script Forge
                                </div>
                            </div>
                        </a>
                    </span>

                    <a href="../user/user.php" class="nav-link shared-style">
                        <?php if($logged) { ?>
                            <div class="row">
                                <div class="col-sm-auto">
                                    <span class="ms-1 d-none d-sm-inline"><?php echo $nav_nome; ?></span>
                                </div>      
                                <div class="col-sm-auto">
                                    <img src="data:image/jpeg;base64,<?php echo $nav_imagem ?>" class="shared-img" alt="image">
                                </div>
                            </div>
                        <?php } else { ?>
                            <i class="bi bi-person-circle"></i>   
                        <?php } ?>
                    </a>     
                </div>
            </nav>
        </body>
    </html>





