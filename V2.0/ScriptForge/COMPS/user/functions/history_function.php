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

    //funçao que busca varios/todos os ususuarios no tabela
    function history_selectall($connect, $tabela, $id){

        $querry = "SELECT * FROM historico WHERE cd_usuario = ". $id; 
        $executar = mysqli_query($connect, $querry);
        $return = mysqli_fetch_all($executar, MYSQLI_ASSOC);
        return $return;
    }

    function history_selectlast($connect, $tabela,){
        $id = $_SESSION['id'];
    
        // Corrigindo a consulta SQL e melhorando a sintaxe
        $query = "SELECT * FROM historico WHERE cd_usuario = $id ORDER BY dt_alterado DESC"; 
        $executar = mysqli_query($connect, $query);
        $return = mysqli_fetch_all($executar, MYSQLI_ASSOC);
        return $return;
    }

    function history_selectone($connect, $tabela, $id){
        $userid = $id;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }else{
            $id = 0;
        }
        
        $querry = "SELECT * FROM historico WHERE cd_usuario = " . $userid . " AND cd_historico = " . $id; 
        $executar = mysqli_query($connect, $querry);
        $return = mysqli_fetch_assoc($executar);
        return $return;
    }

    function history_insert($connect){
        if(isset($_POST['salvar'])){
            $erros = array();
            //verifica se é uma string valida
            $prompt = mysqli_real_escape_string($connect, $_POST['prompt']);
            $titulo =  $_POST['titulo'];
            $resposta = $_POST['resposta'];
            $id = $_SESSION['id'];

            //history_aviso("$titulo", "$resposta", "main.php");

            $op01 = isset($_POST['op01']) && !empty($_POST['op01']) ? mysqli_real_escape_string($connect, $_POST['op01']) : "";
            $op02 = isset($_POST['op02']) && !empty($_POST['op02']) ? mysqli_real_escape_string($connect, $_POST['op02']) : "";
            $op03 = isset($_POST['op03']) && !empty($_POST['op03']) ? mysqli_real_escape_string($connect, $_POST['op03']) : "";
            $op04 = isset($_POST['op04']) && !empty($_POST['op04']) ? mysqli_real_escape_string($connect, $_POST['op04']) : "";
            $op05 = isset($_POST['op05']) && !empty($_POST['op05']) ? mysqli_real_escape_string($connect, $_POST['op05']) : "";
            $op06 = isset($_POST['op06']) && !empty($_POST['op06']) ? mysqli_real_escape_string($connect, $_POST['op06']) : "";
            $op07 = isset($_POST['op07']) && !empty($_POST['op07']) ? mysqli_real_escape_string($connect, $_POST['op07']) : "";
            $op08 = isset($_POST['op08']) && !empty($_POST['op08']) ? mysqli_real_escape_string($connect, $_POST['op08']) : "";
            $op09 = isset($_POST['op09']) && !empty($_POST['op09']) ? mysqli_real_escape_string($connect, $_POST['op09']) : "";
            $op10 = isset($_POST['op10']) && !empty($_POST['op10']) ? mysqli_real_escape_string($connect, $_POST['op10']) : "";

            //casso não aja erros, inserir o usuario no bando de dados
            if(empty($erros)){
                //NOW() usa a data atual do computador ou seja, não usa a data real, possivel alteração no futuro
                $querry = "INSERT INTO historico (ds_prompt, nm_titulo, ds_resposta, nm_tag01, nm_tag02, nm_tag03, nm_tag04, nm_tag05, nm_tag06, nm_tag07, nm_tag08, nm_tag09, nm_tag10, cd_usuario, dt_gerado, dt_alterado)
                VALUES ('$prompt', '$titulo', '$resposta', '$op01', '$op02', '$op03', '$op04', '$op05', '$op06', '$op07', '$op08', '$op09', '$op10', $id, NOW(), NOW())";
                $executar = mysqli_query($connect, $querry);
                //se tiver dado certo avisara que deu certo.
                if($executar) {
                    history_aviso("Roteiro salvo com sucesso.", "", "main.php");
                }else{
                    history_aviso("Erro! não foi possivel salvar o roteiro.", "Falha ao conectar com o banco de dados, tente novamente mais tarde.", "");
                }
            }else{
                history_aviso("Erro! não foi possivel salvar o roteiro.", $erros, "");
            }
        }
    }

    function history_delete($connect){        
        if(!isset( $_GET['fakeid'])){
            if (isset($_POST['delete'])) {
                $id = $_GET['id'];  
        
                $querry = "DELETE FROM historico WHERE cd_historico =".(int)$id;
                $executar = mysqli_query($connect, $querry);
                if($executar) {
                    history_aviso("Roteiro apagado com sucesso.", "", "historico.php");
                }else{
                    users_aviso("Erro! não foi possivel apagar o roteiro.", "Algo deu errado, tente de novo mais tarde.", "historico.php");
                }
            }
        }else{
            users_aviso("Erro! Erro! não foi possivel apagar o roteiro.", "Impossível alterar informações de usuário enquanto estiver visualizando ele", "historico.php");
        }
    }

    function history_aviso($mensagem, $conteudo, $location){
        ?>
            <div class="modal fade" id="alerta" tabindex="-1" aria-labelledby="alertaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="alertaLabel"><?php echo $mensagem ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- se ouver um erro-->
                        <?php if ($conteudo != "") { ?>
                            <div class="modal-body">
                                <?php
                                if (is_array($conteudo)) {
                                    // Itera sobre o array e exibe cada erro em uma nova linha
                                    foreach ($conteudo as $erro) {
                                        echo "<p>" . htmlspecialchars($erro) . "</p>";
                                    }
                                } else {
                                    echo htmlspecialchars($conteudo);
                                }
                                ?>
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