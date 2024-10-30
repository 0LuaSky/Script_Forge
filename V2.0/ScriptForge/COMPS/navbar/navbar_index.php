<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $logged = isset($_SESSION['ativa']) ? TRUE : FALSE;
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
        </head>
        <body>          
            <nav class="navbar bg-body-tertiary fixed-top">
                <div class="container-fluid navbar-brand">
                    <span style="font-size: 32px">
                        <a class="nav-link" href="index.php">
                            <i class="bi bi-body-text" ></i>
                            Script Forge
                        </a>
                    </span>
            
                    <button id="navbaricon" class="navbar-toggler btn-dark px-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="border-width: 0px">
                        <i class="bi bi-person-circle" style=" font-size: 32px"></i>
                        <span class="ms-1 d-none d-sm-inline" style=" font-size: 32px">
                            <?php if($logged) {
                                echo $_SESSION['nome'];
                            } ?>
                        </span>
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
                                                <a class="nav-link" href="COMPS/user/user.php">
                                                    <?php echo $_SESSION['nome']; ?>
                                                </a>
                                            </span>
                                            
                                        </form>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Historico
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">historico 1</a></li>
                                            <li><a class="dropdown-item" href="#">historico 2</a></li>
                                            <li><a class="dropdown-item" href="#">historico 3</a></li>
                                            <li><a class="dropdown-item" href="#">historico 4</a></li>
                                            <li><a class="dropdown-item" href="#">historico 5</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#">Mais</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item" style='position: absolute; margin-bottom: 10px; bottom: 0;'>
                                        <form class="d-flex">
                                            <div class="sticky-bottom">
                                                <span  class="navbar-text me-2">
                                                    <a class="nav-link" href="COMPS/user/logout.php">
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
                                               <a class="nav-link" href="COMPS/user/login.php">Login</a>
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





