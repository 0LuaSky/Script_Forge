<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 
    require_once "functions/admin_function.php";
    require_once "functions/comun_function.php";

    //verifica se uma sessão esta ativa ou não
    $logged = isset($_SESSION['ativa']) ? TRUE : header("location: login.php");
    $admin = isset($_SESSION['adm']) ? TRUE : FALSE;

    $usuarios = admin_selectall($connect, "usuarios");
?>

<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="../WEB-INF/logo.png" type="image/png">
            <title>Administrador</title>
            <?php
                require '../WEB-INF/libs/BodyLibs.php';
                require '../WEB-INF/libs/HeadLibs.php';
            ?> 
        </head>
        
        <body class="d-flex flex-column min-vh-100">
            <div style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
                <?php require_once "../navbar/navbar_comps.php"; ?>
                <?php require_once "../navbar/sidebar.php"; ?>

                <!-- Caso tenha uma sessao ativa ira aparecer tal texto -->
                
                <?php if($logged && $admin) { ?>  
                    <!-- a ser alterado--> 
                    <h1>Painel de controle dos usuarios</h1>
                    <h3>Seja bem vindo <?php echo $_SESSION['nome'] ?> </h3>
                    <br>   

                    <!-- criar um novo usuario apartir do administrador -->
                    <span>Insira um novo usuario aqui: 
                        <a href="../user/cadastro.php" class="px-0 mb-3">
                            <span class="ms-1 d-none d-sm-inline"> Cadastar.</span>
                        </a>
                    </span>

                    <!--Tabela que mostra usuarios cadastrados -->
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"> Id </th>
                                    <th scope="col"> Nome </th>
                                    <th scope="col"> e-mail </th>
                                    <th scope="col"> Data de criação </th>
                                    <th scope="col"> Data de alteração </th>
                                    <th scope="col"> Opções </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usuarios as $usuarios) : ?>
                                    <tr>
                                        <td> <?php echo $usuarios['cd_usuario']; ?></td>
                                        <td> <?php echo $usuarios['nm_usuario']; ?></td>
                                        <td> <?php echo $usuarios['nm_email_usuario']; ?></td>
                                        <td> <?php echo $usuarios['dt_cadastro']; ?></td>
                                        <td> <?php echo $usuarios['dt_alteracao']; ?></td>
                                        <td> 
                                            <a href="user.php?id=<?php echo $usuarios['cd_usuario'] ?>">Expandir</a> 
                                            <a href="update.php?id=<?php echo $usuarios['cd_usuario'] ?>">Editar</a> 
                                            <a href="admin.php?id=<?php echo $usuarios['cd_usuario'] ?>&nome=<?php echo $usuarios['nm_usuario']; ?>&admin=<?php echo $usuarios['sg_admin_s']; ?>">Excluir</a> 
                                        </td>
                                    </tr>  
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>  
                    <?php    
                        //verifica e chama a função delete
                        if (isset($_GET['id'])){ ?>
                            <form action="admin.php" method="post">
                                <div class="modal fade" id="apagar" tabindex="-1" aria-labelledby="apagarLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content"> 
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="apagarLabel">Deseja apagar o usuario <?php echo $_GET['nome']; ?>?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <input type="hidden" value="<?php echo $_GET['nome']; ?>" readonly>
                                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" readonly>
                                            <input type="hidden" name="admin" value="<?php echo $_GET['admin']; ?>" readonly>
                                        
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary mb-3 ms-auto" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-danger mb-3 me-auto" name="delete">Excluir</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>   
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var modalElement = new bootstrap.Modal(document.getElementById('apagar'));
                                    modalElement.show(); // Força o modal a aparecer
                                });
                            </script>
                        <?php } 

                        //caso tenha confimado chama a função delete
                        if(isset($_POST['delete'])){
                            admin_delete($connect, "usuarios", $_POST['id'], $_POST['admin']);
                        }
                    ?>
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