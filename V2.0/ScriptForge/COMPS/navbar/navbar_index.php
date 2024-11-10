<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $logged = isset($_SESSION['ativa']) ? TRUE : FALSE;
    if($logged){
        require_once "COMPS/user/functions/comun_function.php";

        $nav_usuario = comum_selectone($connect, "usuarios", $_SESSION['id']);
        $nav_nome = $nav_usuario['nm_usuario'];
        $nav_imagem = $nav_usuario['im_usuario'];
    }
?>
<!DOCTYPE html>
    <html lang="en">
        <body>
            <nav class="navbar bg-body-tertiary fixed-top" style="background-image: url('https://images3.alphacoders.com/135/1352316.jpeg')">
                <div class="container-fluid ">
                    <span style="font-size: 25px">
                        <a class="nav-link" href="main.php">
                            <div class="row">
                                <div class="col-sm-auto">
                                    <img src="../WEB-INF/Logobranca.png" class="img-fluid d-block " alt="ScriptForge"  width="40" height="40" onerror="this.onerror=null; this.src='COMPS/WEB-INF/Logobranca.png';">
                                </div>
                                <div class="col-sm-auto">
                                    Script Forge
                                </div>
                            </div>
                        </a>
                    </span>
            
                    <button id="navbaricon" class="navbar-toggler shared-style" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <?php if($logged) { ?>
                            <div class="row">
                                <div class="col-sm-auto">
                                    <span class="ms-1 d-none d-sm-inline"><?php echo $_SESSION['nome']; ?></span>
                                </div>      
                                <div class="col-sm-auto">
                                    <img src="data:image/jpeg;base64,<?php echo $_SESSION['foto'] ?>" class="shared-img rounded-circle" alt="image" width="40" height="40">
                                </div>
                            </div>
                        <?php } else { ?>
                            <i class="bi bi-person-circle"></i>   
                        <?php } ?>
                    </button>
                    
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header" style="background-image: url('https://images3.alphacoders.com/135/1352316.jpeg'">
                        <img src="../WEB-INF/Logobranca.png" class="img-fluid d-block " alt="ScriptForge"  width="35" height="35" onerror="this.onerror=null; this.src='COMPS/WEB-INF/Logobranca.png';">

                            <h3 class="offcanvas-title" id="offcanvasNavbarLabel" style="font-size: 24px">
                                Script Forge
                            </h3>
                            <br>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
            
                        
                        <div class="offcanvas-body bg-black p-2 text-dark bg-opacity-25" style='font-size: 25px;'>
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <?php if($logged) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="COMPS/user/user.php">
                                            <i class="bi bi-person me-2"></i>  <!-- Adicione a classe 'me-2' para espaçamento à direita -->
                                            <span >Meu perfil</span>
                                                    
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">
                                            <i class="bi bi-house me-2"></i> <!-- Adicione a classe 'me-2' para espaçamento à direita -->
                                            <span >Pagina inicial</span>
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-clock-history me-2"></i> <!-- Adicione a classe 'me-2' para espaçamento à direita -->
                                            <span class=" ms-2">Histórico</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Histórico 1</a></li>
                                            <li><a class="dropdown-item" href="#">Histórico 2</a></li>
                                            <li><a class="dropdown-item" href="#">Histórico 3</a></li>
                                            <li><a class="dropdown-item" href="#">Histórico 4</a></li>
                                            <li><a class="dropdown-item" href="#">Histórico 5</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Mais</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item" style='position: absolute; margin-bottom: 10px; bottom: 0;'>
                                        <div class="sticky-bottom">
                                            <a class="nav-link" href="COMPS/user/logout.php">
                                                <i class="fs-4 bi bi-box-arrow-left"></i> <!-- Adicione a classe 'me-2' para espaçamento à direita -->
                                                <span >Sair</span>
                                            </a>
                                        </div>
                                    </li>
                                <?php }else{ ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">
                                            <i class="bi bi-house me-2"></i> <!-- Adicione a classe 'me-2' para espaçamento à direita -->
                                            <span >Pagina inicial</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">           
                                        <a class="nav-link" href="COMPS/user/user.php">
                                            <i class="bi bi-person me-2"></i>  <!-- Adicione a classe 'me-2' para espaçamento à direita -->
                                            <span >Login</span>
                                                    
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </body>
    </html>





