<?php
    //playlist com as instruções para todo o funcionamento do bd pode ser encontrado aqui:
    //https://youtube.com/playlist?list=PLWBY_WThFknHcMzXR8mXq5Ljeg7A3py1a&si=ZCzJ7_jamDZuQVZU
    $host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "banco_scriptforge";

    //conecta com o banco de dados
    //usado em qualqer função que interage com o banco de dados
    $connect = mysqli_connect($host, $db_user, $db_pass, $db_name);

    function login($connect){
        //verifica se foi chamado e se tudo esta preenchido
        if( isset($_POST['acessar']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
            
            //criptografia tipo sha1
            $senha = sha1($_POST['senha']);
            $email = filter_input(INPUT_POST, 'email');

            $querry = "SELECT * FROM usuarios WHERE nm_email_usuario = '$email' AND cd_senha = '$senha' ";
            $executar = mysqli_query($connect, $querry);
            $return = mysqli_fetch_assoc($executar);

            if(!empty($return['cd_usuario'])){
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['ativa'] = TRUE;
                $_SESSION['nome'] = $return['nm_usuario'];
                $_SESSION['id'] = $return['cd_usuario'];
                $_SESSION['adm'] = $return['sg_admin_s'];

                header("Location: user.php");
            }else{
                echo "usuario ou senha incorreto";
            }
        }
    }

    //desconecta da sessão
    function logout(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();

        header("location: ../../index.php");
    }
?>