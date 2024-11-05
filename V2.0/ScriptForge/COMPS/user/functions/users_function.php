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
    function users_selectone($connect, $tabela, $id){
        //(int) força a se tornar um valor interio
        //talvez seja possivel adicionar OR no banco para buscar parecidos com tal nome ou com tal email
        $querry = "SELECT * FROM $tabela WHERE cd_usuario =".(int)$id; 
        $executar = mysqli_query($connect, $querry);
        $return = mysqli_fetch_assoc($executar);
        return $return;
    }

    //funçao que busca varios/todos os ususuarios no tabela
    //Possivel reutilizar em outras partes do codigo

    function users_selectall($connect, $tabela, $where = 1, $order = ""){
        if(!empty($order)){
            $order = "ORDER BY '$order'";
        }

        $querry = "SELECT * FROM $tabela WHERE $where $order"; 
        $executar = mysqli_query($connect, $querry);
        $return = mysqli_fetch_all($executar, MYSQLI_ASSOC);
        return $return;
    }

    //função que altera dados no banco
    function updatepicture($connect){
        if(isset($_POST['atualizarfoto'])){
            $erros = array();

            $id = $_SESSION['id'];

            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
                // Lê o conteúdo do arquivo
                $img = file_get_contents($_FILES['imagem']['tmp_name']);
                
                // Codifica a imagem em base64
                $data = base64_encode($img);

                $querry = "UPDATE usuarios SET im_usuario = '$data', dt_alteracao = NOW() WHERE cd_usuario = ". $id;
                $executar = mysqli_query($connect, $querry);
                if($executar) {
                    users_aviso("Usuario alterado com sucesso.", "", "user.php");
                }else{
                    users_aviso("Erro! Usuario não alterado.", "falha ao atualizar o banco de dados, tente novamente mais tarde." ,"");
                }   
            } else {
                users_aviso("Erro! Usuario não alterado.", "falha ao ao carregar a imagem, tente novamente ou use outra imagem.", "");
            }
        }
    }

    function updatename($connect){
        if(isset($_POST['atualizarnome'])){
            $erros = array();
            $id = $_SESSION['id'];
            $nome = mysqli_real_escape_string($connect, $_POST['username']);
            
            if(empty($nome)){
                $erros[] = "Insira um username valido!";
            }

            if(empty($erros)){
                $querry = "UPDATE usuarios SET nm_usuario = '$nome', dt_alteracao = NOW() WHERE cd_usuario = ". $id;
                $executar = mysqli_query($connect, $querry);
                if($executar) {
                    users_aviso("Usuario alterado com sucesso.", "", "user.php");
                }else{
                    users_aviso("Erro! Usuario não alterado.", "falha ao atualizar o banco de dados, tente novamente mais tarde.", "");
                }   
            }else{       
                users_aviso("Erro! Usuario não alterado.", $erros, "");       
            }
        }
    }
    
    function updateemail($connect){
        if(isset($_POST['atualizaremail'])){
            $erros = array();
            $id = $_SESSION['id'];
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            //busca o email atual da pessoa
            $querry = "SELECT nm_email_usuario FROM usuarios WHERE cd_usuario = $id";
            $executar = mysqli_query($connect, $querry);
            $return = mysqli_fetch_assoc($executar);

            //busca o se existe outro email ja cadastrado
            $querry = "SELECT nm_email_usuario FROM usuarios WHERE nm_email_usuario = '$email' AND nm_email_usuario <> '". $return['nm_email_usuario']."'";
            $executar = mysqli_query($connect, $querry);
            $return = mysqli_num_rows($executar);
            
            //verifica se o email não foi enviado vazio
            if(empty($email)){
                $erros[] = "Insira um e-mail valido!";
            }

            //verifica se o email ja existe
            if(!empty($return)){
                $erros[] = "E-mail ja cadastrado!";
            }

            if(empty($erros)){
                $querry = "UPDATE usuarios SET nm_email_usuario = '$email', dt_alteracao = NOW() WHERE cd_usuario = ". $id;
                $executar = mysqli_query($connect, $querry);
                if($executar) {
                    users_aviso("Usuario alterado com sucesso.", "", "user.php");
                }else{
                    users_aviso("Erro! Usuario não alterado.", "falha ao atualizar o banco de dados, tente novamente mais tarde.", "");
                }   
            }else{       
                users_aviso("Erro! Usuario não alterado.", $erros, "");       
            }
        }
    }

    function updatesenha($connect){
        if(isset($_POST['atualizarsenha'])){
            $erros = array();
            $id = $_SESSION['id'];
            $senha1 = $_POST['senha1'];
            $senha2 = $_POST['senha2'];
            $senhacripto = sha1($senha1);

            if(strlen($senha1) < 4){
                $erros[] = "A senha deve conter ao menos 4 caracteres!";
            }

            if(empty($senha1) || empty($senha2)){
                $erros[] = "Os dois campos devem ser preenchidos!";
            }

            if($senha1 != $senha2) {
                $erros[] = "As senhas não conferem!";
            }

            if(empty($erros)){
                $querry = "UPDATE usuarios SET cd_senha = '$senhacripto', dt_alteracao = NOW() WHERE cd_usuario = ". $id;
                $executar = mysqli_query($connect, $querry);
                if($executar) {
                    users_aviso("Usuario alterado com sucesso.", "", "user.php");
                }else{
                    users_aviso("Erro! Usuario não alterado.", "falha ao atualizar o banco de dados, tente novamente mais tarde.", "");
                }   
            }else{       
                users_aviso("Erro! Usuario não alterado.", $erros, "");       
            }
        }
    }

    function users_delete($connect){
        if (isset($_POST['excluir'])) {
            $id = $_SESSION['id'];
    
            $querry = "DELETE FROM usuarios WHERE cd_usuario =".(int)$id;
            $executar = mysqli_query($connect, $querry);
            if($executar) {
                users_aviso("Usuário Deletado com sucesso.", "", "logout.php");
            }else{
                users_aviso("Erro! Usuario não deletado.", "Algo deu errado, tente de novo mais tarde.", "");
            }
        }
    }

    function users_aviso($mensagem, $conteudo, $location){
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