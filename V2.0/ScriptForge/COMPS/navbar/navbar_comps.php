<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $logged = isset($_SESSION['ativa']) ? TRUE : FALSE;
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <?php
                require '../WEB-INF/libs/BodyLibs.php';
                require '../WEB-INF/libs/HeadLibs.php';
            ?>           
        </head>
        <body>          
            <nav class="navbar bg-body-tertiary fixed-top">
                <div class="container-fluid navbar-brand">
                    <span style="font-size: 32px">
                        <a class="nav-link" href="../../index.php">
                            <i class="bi bi-body-text" ></i>
                            Script Forge
                        </a>
                    </span>
            
                    <button id="navbaricon" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <i class="bi bi-person-circle" style=" font-size: 32px"></i>
                    </button>
                    
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h3 class="offcanvas-title" id="offcanvasNavbarLabel">
                                Script Forge
                            </h3>
                            <br>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
            
                        
                        <div class="offcanvas-body" style='font-size: 25px;'>
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <?php if($logged) { ?>
                                    <li class="nav-item">
                                        <form class="d-flex">
                                            <span class="navbar-text me-2">
                                                <a class="nav-link" href="../login_bd/session.php">
                                                    <?php
                                                        echo $_SESSION['nome'];
                                                    ?>
                                                </a>
                                            </span>
                                            
                                        </form>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Historico (a ser implementado)
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Historico 1</a></li>
                                            <li><a class="dropdown-item" href="#">Historico 2</a></li>
                                            <li><a class="dropdown-item" href="#">Historico 3</a></li>
                                            <li><a class="dropdown-item" href="#">Historico 4</a></li>
                                            <li><a class="dropdown-item" href="#">Historico 5</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Ver mais</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item" style='position: absolute; margin-bottom: 10px; bottom: 0;'>
                                        <form class="d-flex">
                                            <div class="sticky-bottom">
                                                <span  class="navbar-text me-2">
                                                    <a class="nav-link" href="../login_bd/logout.php">
                                                        Sair
                                                    </a>
                                                </span>
                                            </div>
                                        </form>
                                    </li>
                                <?php }else{ ?>
                                    <li class="nav-item">
                                        <form class="d-flex">
                                            <div class="m-2">            
                                               <a class="nav-link" href="../login_bd/login.php">Login</a>
                                            </div>
                                        </form>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </body>
    </html>





