<!-- tentar mecher melhor nisso, mas por en quanto funciona-->
 <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $logged = isset($_SESSION['ativa']) ? TRUE : FALSE;
    $admin = isset($_SESSION['adm']) ? TRUE : FALSE;
?>
<!DOCTYPE html>
    <html lang="en">
        <head>        
        </head>
        <body> 
            <div class="container-fluid">
                <div class="row flex-nowrap">
                    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 ">
                        <div class="d-flex flex-column align-items-center align-items-sm-start px-0 pt-0 text-white min-vh-100">
                            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                                <li class="nav-item">
                                    <a href="../user/user.php" class="nav-link align-middle px-0">
                                        <i class="fs-4 bi-house"></i> 
                                        <span class="ms-1 d-none d-sm-inline">
                                            <?php if($logged) {
                                                echo $_SESSION['nome'];
                                            } ?>
                                        </span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#" class="nav-link px-0 align-middle">
                                        <i class="fs-4 bi-table"></i>
                                        <span class="ms-1 d-none d-sm-inline">Historico</span>
                                    </a>
                                </li>
                                
                                <?php if($admin) { ?>
                                    <li>
                                        <a href="../user/admin.php"  class="nav-link px-0 align-middle">
                                            <i class="fs-4 bi-people"></i>
                                            <span class="ms-1 d-none d-sm-inline">tabela de usuarios</span>
                                        </a>
                                    </li>
                                <?php } ?> 
                                <a href="../user/logout.php" class="nav-link px-0">
                                    <!--img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle"-->
                                    <i class="fs-4 bi-people"></i>
                                    <span class="ms-1 d-none d-sm-inline">Desconectar</span>
                                </a>   
                            </ul>
                            
                        </div>
                    </div>
                    <div class="col py-3">
                        <!-- area de conteudo, não fechar -->

