<?php
    require_once "function.php";
?>
<!DOCTYPE html>
    <html data-bs-theme="dark">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Faça seu login</title>
            <?php
                require '../WEB-INF/libs/BodyLibs.php';
                require '../WEB-INF/libs/HeadLibs.php';
            ?> 
        </head>
        <body style="margin-top: 100px; margin-left: 2%; margin-right: 2%;">
            
            <form action="#" method="POST">
                <fieldset>
                    <legend>Painel de login </legend>
                    <input type="text" name="email" placeholder="E-mail..." required>
                    <input type="password" name="senha" placeholder="senha..." required>
                    <input type="submit" name="acessar" value="acessar">
                </fieldset>
            </form> 
            <?php
                if(isset($_POST['acessar'])){
                    login($connect);
                }
            ?>
            <?php require_once "../navbar/navbar_comps.php"; ?>
         </body>
    </html>