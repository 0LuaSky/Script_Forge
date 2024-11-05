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
                $_SESSION['id'] = $return['cd_usuario'];
                $_SESSION['nome'] = $return['nm_usuario'];
                $_SESSION['foto'] = $return['im_usuario'];
                $_SESSION['adm'] = $return['sg_admin_s'];
                
                comum_aviso("Seja bem vindo", "", "user.php");
            }else{
                comum_aviso("Erro!", "Usuario não encontrado, tente novamente", ""  );
            }
        }
    }

    function comum_selectone($connect, $tabela, $id){
        //(int) força a se tornar um valor interio
        $querry = "SELECT * FROM $tabela WHERE cd_usuario =".(int)$id; 
        $executar = mysqli_query($connect, $querry);
        $return = mysqli_fetch_assoc($executar);
        return $return;
    }

    function comum_insert($connect){
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
                    comum_aviso("Usuario criado com sucesso.", "", "login.php");
                }else{
                    comum_aviso("Erro! Usuario não criado.", "Falha ao conectar com o banco de dados, tente novamente mais tarde", "");
                }

            }else{
                comum_aviso("Erro! Usuario não criado.", $erros, "");
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

    function comum_aviso($mensagem, $conteudo, $location){
        if (!is_array($conteudo) && $conteudo != "") {
            $conteudo = [$conteudo]; // Converte a string em um array de um único elemento
        }
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