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

                header("Location: session.php");
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

    //função que busca apenas um resultado na tabela, util para encontrar um especifico dentro de uma lista  
    //tabela representa a table que sera selecionada, pode ser util caso em algum momento precise mostrar outras tabelas, como o historico e etc.
    function selectone($connect, $tabela, $id){
        //(int) força a se tornar um valor interio
        //talvez seja possivel adicionar OR no banco para buscar parecidos com tal nome ou com tal email
        $querry = "SELECT * FROM $tabela WHERE cd_usuario =".(int)$id; 
        $executar = mysqli_query($connect, $querry);
        $return = mysqli_fetch_assoc($executar);
        return $return;
    }

    //funçao que busca varios/todos os ususuarios no tabela
    //Possivel reutilizar em outras partes do codigo

    function selectall($connect, $tabela, $where = 1, $order = ""){
        if(!empty($order)){
            $order = "ORDER BY '$order'";
        }

        $querry = "SELECT * FROM $tabela WHERE $where $order"; 
        $executar = mysqli_query($connect, $querry);
        $return = mysqli_fetch_all($executar, MYSQLI_ASSOC);
        return $return;
    }

    //função para cadastrar um usuario possivel usar depois 
    function insert($connect){
        if(isset($_POST['cadastrar']) && !empty($_POST['usarname']) && !empty($_POST['email']) && !empty($_POST['senha1']) && !empty($_POST['senha2'])){
            $erros = array();
            $email = strtolower(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
            $nome = mysqli_real_escape_string($connect, $_POST['usarname']);

            $querry = "SELECT nm_email_usuario FROM usuarios WHERE nm_email_usuario = '$email'";
            $executar = mysqli_query($connect, $querry);
            $return = mysqli_num_rows($executar);

            //verifica o tamanho do nome que o usuario quer inserir
            if(strlen($nome) < 4){
                $erros[] = "O nome deve conter ao menos 4 caracteres!";
            }

            //verifica se as senhas estão iguais
            if($_POST['senha1'] != $_POST['senha2']) {
                $erros[] = "As senhas não conferem!";
            }
            //verifica se o email ja existe

            if(!empty($return)){
                $erros[] = "E-mail ja cadastrado!";
            }

            //casso não aja erros, inserir o usuario no bando de dados
            if(empty($erros)){
                $senha = sha1($_POST['senha1']);

                //NOW() usa a data atual do computador ou seja, não usa a data real, possivel alteração no futuro
                $querry = "INSERT INTO usuarios (nm_usuario, nm_email_usuario, cd_senha, dt_cadastro)
                VALUES ('$nome', '$email', '$senha', NOW())";
                $executar = mysqli_query($connect, $querry);
                //se tiver dado certo avisara que deu certo.
                if($executar) {
                    echo "Usuario cadastrado com sucesso.";
                }else{
                    echo "Erro usuario não cadastrado.";
                }

            }else{
                foreach($erros as $erros){
                    //talvez seja melhor mostrar como um alert?
                    echo "<p>Erro! $erros</p>";
                }
            }
        }
    }
    
    //função para deletar usuarios do banco de dados
    function delete($connect, $tabela, $id, $admin){
        if( !empty($id)){
            $erros = array();
            
            if($id == $_SESSION['id']){
                $erros[] = "Impossivel deletar o proprio usuario.";
            }
            if($admin != null){
                $erros[] = "Impossivel deletar um administrador.";
            }
            if(empty($erros)){
                $querry = "DELETE FROM $tabela WHERE cd_usuario =".(int)$id;
                $executar = mysqli_query($connect, $querry);
                if($executar) {
                    echo "Usuario deletado com sucesso.";
                }else{
                    echo "Erro usuario não deletado.";
                }
            }else{
                foreach($erros as $erros){
                    //talvez seja melhor mostrar como um alert?
                    echo "<p>Erro! $erros</p>";
                }
            }
        }
    }

    //função que altera dados no banco
    function update($connect){
        if(isset($_POST['atualizar']) && !empty($_POST['email'])){
            $erros = array();

            $ownid = $_SESSION['id'];
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $nome = mysqli_real_escape_string($connect, $_POST['usarname']);
            $senha = sha1($_POST['senha1']);

            //busca o email atual da pessoa
            $querry = "SELECT nm_email_usuario FROM usuarios WHERE cd_usuario = $id";
            $executar = mysqli_query($connect, $querry);
            $return = mysqli_fetch_assoc($executar);

            //busca o se existe outro email ja cadastrado
            $querry = "SELECT nm_email_usuario FROM usuarios WHERE nm_email_usuario = '$email' AND nm_email_usuario <> '". $return['nm_email_usuario']."'";
            $executar = mysqli_query($connect, $querry);
            $return = mysqli_num_rows($executar);

            //verifica se o email esta vazio
            if(empty($email)){
                $erros[] = "Insira um e-mail valido!";
            }

            //verifica se o nome esta vazio esta vazio
            if(empty($nome)){
                $erros[] = "Insira um username valido!";
            }
            
            //verifica o tamanho do nome que o usuario quer inserir
            if(strlen($nome) < 4){
                $erros[] = "O nome deve conter ao menos 4 caracteres!";
            }

            //verifica se vai mudar as senhas e se as senhas estão iguais
            if(!empty($_POST['senha1']) || !empty($_POST['senha2'])){
                if($_POST['senha1'] != $_POST['senha2']) {
                    $erros[] = "As senhas não conferem!";
                }
            }

            //verifica se esta tentando alterar um adm
            if(!empty($_POST['admin'])){
                //verifica se o id do admin é o mesmo que o id de quem esta tentando alterar
                if($ownid != $id){
                    $erros[] = "impossivel alterar outros administradores";
                }
            }

            //verifica se o email ja existe
            if(!empty($return)){
                $erros[] = "E-mail ja cadastrado!";
            }

            //caso não tenha tido nenhum erro, sera possivel fazer um Update(não esquece o where!!!)
            if(empty($erros)){
                //verifica se existe uma alteração na senha
                if(!empty($senha)){
                    //NOW() usa a data atual do computador ou seja, não usa a data real, possivel alteração no futuro
                    $querry = "UPDATE usuarios SET nm_usuario = '$nome' , nm_email_usuario = '$email', cd_senha = '$senha', dt_alteracao = NOW()
                    WHERE cd_usuario =". (int) $id;
                }else{
                    $querry = "UPDATE usuarios SET nm_usuario = '$nome' , nm_email_usuario = '$email', dt_alteracao = NOW()
                    WHERE cd_usuario =". (int) $id;
                }

                $executar = mysqli_query($connect, $querry);
                if($executar) {
                    echo "Usuario alterado com sucesso.";
                }else{
                    echo "Erro usuario não alterado.";
                }

            }else{
                foreach($erros as $erros){
                    //talvez seja melhor mostrar como um alert?
                    echo "<p>Erro! $erros</p>";
                }
            }
        }
    }
?>