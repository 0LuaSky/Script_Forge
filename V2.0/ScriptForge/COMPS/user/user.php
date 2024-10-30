<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 
    require_once "functions/comun_function.php";
    require_once "functions/users_function.php";
    //verifica se uma sessão esta ativa ou não
    $logged = isset($_SESSION['ativa']) ? TRUE : header("location: login.php");
    $admin = isset($_SESSION['adm']) ? TRUE : FALSE;

    $foto = base64_encode('https://i.pinimg.com/736x/c3/a7/bb/c3a7bbe8b88ef939371e32be464236eb.jpg');
    $foto2 = base64_decode($foto);
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

                <h1>Meu perfil</h1>
                    <img src="<?php echo $foto2 ?>" class="img-fluid rounded  mx- d-block" alt="image"  width="500" height="600">
                
                    <h3><?php echo $_SESSION['nome'] ?> </h3>
                    
                    <form class="row g-3">
                        <div class="col-auto">
                            <label for="inputPassword6" class="visually-hidden">Password</label>
                            <input value="<?php echo $_SESSION['nome'] ?>" type="text" name="usarname" placeholder="usarname..." class="form-control" required>
                        </div>
                        <div class="col-auto ms-5 me-auto">
                            <button type="submit" class="btn btn-primary mb-3" name="atualizar">Alterar</button>
                        </div>
                        </form>

                <br>
                  
            <?php } ?>
        </body>
    </html>