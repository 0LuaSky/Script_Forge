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
                        <a class="nav-link" href="../../index.php">
                            <i class="bi bi-body-text" ></i>
                            Script Forge
                        </a>
                    </span>
                        
                    <a href="../user/user.php" class="nav-link align-middle px-3">
                        <i class="bi bi-person-circle" style=" font-size: 32px"></i>                                        <span class="ms-1 d-none d-sm-inline">
                        <span class="ms-1 d-none d-sm-inline" style=" font-size: 32px">
                            <?php if($logged) {
                                echo $_SESSION['nome'];
                            } ?>
                        </span>
                    </a>
                            
                            
                </div>
            </nav>
        </body>
    </html>





