<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 
    require_once "functions/admin_function.php";
    //verifica se uma sessão esta ativa ou não
    $logged = isset($_SESSION['ativa']) ? TRUE : header("location: login.php");
    $admin = isset($_SESSION['adm']) ? TRUE : FALSE;
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
        
        <body style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
            <?php require_once "../navbar/navbar_comps.php"; ?>
            <?php require_once "../navbar/sidebar.php"; ?>

            <!-- Caso tenha uma sessao ativa ira aparecer tal texto -->
            
            <?php if($logged) { ?>   
                <h1>Painel de controle dos usuarios</h1>
                <h3>Seja bem vindo <?php echo $_SESSION['nome'] ?> </h3>
                <br>

                <!-- Caso seja um admin novas funções devem aparecer 
                possivel alteração por parte de css/estilização -->
                <?php if($admin) { ?>
                    <?php
                        //chama função para inserir usuario
                        if(isset($_POST['cadastrar'])){
                            insert($connect);
                        }
                        $tabela = "usuarios";
                        $usuarios = selectall($connect, $tabela);
                        
                        //verifica e chama a função delete
                        if (isset($_GET['id'])){ ?>
                            <h3> deseja apagar o usuario: <?php echo $_GET['nome']; ?>
                                <form action="session.php" method="post">
                                    <input type="text" value="<?php echo $_GET['nome']; ?>" readonly>
                                    <input type="text" name="id" value="<?php echo $_GET['id']; ?>" readonly>
                                    <input type="hidden" name="admin" value="<?php echo $_GET['admin']; ?>" readonly>
                                    <input type="submit" name="delete" value="delete">
                                </form>
                            </h3>
                        <?php } 

                        //caso tenha confimado chama a função delete
                        if(isset($_POST['delete'])){
                            delete($connect, "usuarios", $_POST['id'], $_POST['admin']);
                        }
                    ?>

                    <!-- criar um novo usuario apartir do administrador -->
                    <form action="" method="POST">
                        <fieldset>
                            <legend>Inserir novo usuario</legend>
                            <input type="text" name="usarname" placeholder="usarname..." required>
                            <input type="email" name="email" placeholder="E-mail..." required>
                            <input type="password" name="senha1" placeholder="senha..." required>
                            <input type="password" name="senha2" placeholder="confirme sua senha..." required>
                            <input type="submit" name="cadastrar" value="cadastrar">
                        </fieldset>
                    </form>


                    <!--Tabela que mostra usuarios cadastrados -->
                    <div>
                        <table border="1">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Nome </th>
                                    <th> e-mail </th>
                                    <th> Data de criação </th>
                                    <th> Data de alteração </th>
                                    <th> Opções </th>
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
                                            <a href="">Expandir</a> 
                                            <a href="update.php?id=<?php echo $usuarios['cd_usuario'] ?>">Editar</a> 

                                            <a href="session.php?id=<?php echo $usuarios['cd_usuario'] ?>&nome=<?php echo $usuarios['nm_usuario']; ?>&admin=<?php echo $usuarios['sg_admin_s']; ?>">Excluir</a> 
                                        </td>
                                    </tr>  
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>  
                <?php } ?>  
            <?php } ?>
        </body>
    </html>