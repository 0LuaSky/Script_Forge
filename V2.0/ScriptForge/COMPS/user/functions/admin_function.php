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

    function admin_selectall($connect, $tabela, $where = 1, $order = ""){
        if(!empty($order)){
            $order = "ORDER BY '$order'";
        }

        $querry = "SELECT * FROM $tabela WHERE $where $order"; 
        $executar = mysqli_query($connect, $querry);
        $return = mysqli_fetch_all($executar, MYSQLI_ASSOC);
        return $return;
    }

    //função para cadastrar um usuario possivel usar depois 
    function admin_insert($connect){
        if(isset($_POST['cadastrar']) && !empty($_POST['usarname']) && !empty($_POST['email']) && !empty($_POST['senha1']) && !empty($_POST['senha2'])){
            $erros = array();
            $email = strtolower(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
            $nome = mysqli_real_escape_string($connect, $_POST['usarname']);
            $senha1 = $_POST['senha1'];
            $senha2 = $_POST['senha2'];
            $senhacripto = sha1($senha1);

            $querry = "SELECT nm_email_usuario FROM usuarios WHERE nm_email_usuario = '$email'";
            $executar = mysqli_query($connect, $querry);
            $return = mysqli_num_rows($executar);

            if(strlen($senha1) < 4){
                $erros[] = "A senha deve conter ao menos 4 caracteres!";
            }

            if(empty($senha1) || empty($senha2)){
                $erros[] = "Os dois campos devem ser preenchidos!";
            }

            if($senha1 != $senha2) {
                $erros[] = "As senhas não conferem!";
            }

            //verifica se o email não foi enviado vazio
            if(empty($email)){
                $erros[] = "Insira um e-mail valido!";
            }

            //verifica se o email ja existe
            if(!empty($return)){
                $erros[] = "E-mail ja cadastrado!";
            }

            if(empty($nome)){
                $erros[] = "Insira um username valido!";
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
                    comum_aviso("Usuario criado com sucesso.", "", "admin.php");
                }else{
                    comum_aviso("Erro! Usuario não criado.", "Falha ao conectar com o banco de dados, tente novamente mais tarde", "");
                }

            }else{
                comum_aviso("Erro! Usuario não criado.", $erros, "");
            }
        }
    }
    
    //função para deletar usuarios do banco de dados
    function admin_delete($connect, $tabela, $id, $admin){
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
                    admin_aviso("Usuario apagado com sucesso.", "", "admin.php");
                }else{
                    admin_aviso("Erro! Usuario não apagado.", "Falha ao conectar com o banco de dados, tente novamente mais tarde", "");
                }

            }else{
                admin_aviso("Erro! Usuario não apagado.", $erros, "");
            }
        }
    }

    //função que altera dados no banco
    function admin_update($connect){
        if(isset($_POST['atualizar']) && !empty($_POST['email'])){
            $erros = array();

            $ownid = $_SESSION['id'];
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $nome = mysqli_real_escape_string($connect, $_POST['usarname']);
            $senha1 = $_POST['senha1'];
            $senha2 = $_POST['senha2'];
            $senhacripto = sha1($senha1);

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
            if(!empty($senha1) || !empty($senha2)){
                if(strlen($senha1) < 4 || strlen($senha2) < 4){
                    $erros[] = "A senha deve conter ao menos 4 caracteres!";
                }
                if($senha1 != $senha2) {
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
                if(!empty($senha1) || !empty($senha2)){
                    //NOW() usa a data atual do computador ou seja, não usa a data real, possivel alteração no futuro
                    $querry = "UPDATE usuarios SET nm_usuario = '$nome' , nm_email_usuario = '$email', cd_senha = '$senhacripto', dt_alteracao = NOW()
                    WHERE cd_usuario =". (int) $id;
                }else{
                    $querry = "UPDATE usuarios SET nm_usuario = '$nome' , nm_email_usuario = '$email', dt_alteracao = NOW()
                    WHERE cd_usuario =". (int) $id;
                }

                $executar = mysqli_query($connect, $querry);
                if($executar) {
                    admin_aviso("Usuario alterado com sucesso.", "", "admin.php");
                }else{
                    admin_aviso("Erro! Usuario não alterado.", "Falha ao conectar com o banco de dados, tente novamente mais tarde", "");
                }

            }else{
                admin_aviso("Erro! Usuario não alterado.", $erros, "");
            }
        }
    }

    function admin_aviso($mensagem, $conteudo, $location){
        ?>
            <div class="modal fade" id="alerta" tabindex="-1" aria-labelledby="alertaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="alertaLabel"><?php echo $mensagem ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <?php if($conteudo != ""){ ?>
                            <div class="modal-body">
                            <?php foreach($conteudo as $conteudo){?>
                                    <?php echo $conteudo ?><br>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary mx-auto" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var myModal = new bootstrap.Modal(document.getElementById('alerta'));
                    document.getElementById('alerta').addEventListener('hidden.bs.modal', function () { minhaFuncao(); });
                    myModal.show();
                });
                function minhaFuncao() {
                    window.location.href = '<?php echo $location; ?>';
                }
            </script>
        <?php
    }
?>