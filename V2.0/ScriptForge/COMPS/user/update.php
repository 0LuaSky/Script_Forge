<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 
    require_once "functions/admin_function.php";
    //verifica se uma sessão esta ativa ou não
    $logged = isset($_SESSION['ativa']) ? TRUE : header("location: login.php");
    $admin = isset($_SESSION['adm']) ? TRUE : header("location: session.php");
    if(!isset( $_GET['id'])) { header("location: session.php"); }
?>

<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
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
                <?php if($logged) { ?>   
                    <h1>Painel de controle do usuario</h1>
                    <h3>Seja bem vindo <?php echo $_SESSION['nome'] ?> </h3>

                    <a href="session.php">Voltar <a>
                    <br>

                    <!-- Caso seja um admin novas funções devem aparecer 
                    possivel alteração por parte de css/estilização -->
                    <?php if($admin) { ?>

                        <?php if(isset( $_GET['id'])) { ?>
                            <?php
                                $id = $_GET['id'];
                                $usuario = selectone($connect, "usuarios", $id);
                                if(isset($_POST['atualizar'])){
                                    update($connect);
                                }
                            ?>
                            <h2> Editando o usuario <?php echo $usuario['nm_usuario']; ?>
                        <?php } ?>

                        <!-- altera um usuario apartir do administrador -->
                        <form action="" method="POST">
                            <fieldset>
                                <legend>Editar usuario</legend>
                                <input value="<?php echo $usuario['sg_admin_s']; ?>" type="hidden" name="admin">
                                <input value="<?php echo $usuario['cd_usuario']; ?>" type="hidden" name="id">
                                <input value="<?php echo $usuario['nm_usuario']; ?>" type="text" name="usarname" placeholder="usarname..." required>
                                <input value="<?php echo $usuario['nm_email_usuario']; ?>" type="email" name="email" placeholder="E-mail..." required>
                                <input type="password" name="senha1" placeholder="senha...">
                                <input type="password" name="senha2" placeholder="confirme sua senha...">
                                <input type="submit" name="atualizar" value="atualizar">
                            </fieldset>
                        </form>

                    <?php } ?>  
                <?php } ?>
            </div>
        </body>
        <?php require "../navbar/footer.php";?>
    </html>