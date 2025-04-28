<?php
    $tags = [
        "Ação", "Apocalíptico", "Aventura", "Battle Royale", "Cartas", "Casual",
        "Co-op", "Corridas", "Cyberpunk", "Defesa de Torres", "Esporte", "Estratégia",
        "Fantasia", "Ficção Científica", "Hack and Slash", "Investigação", "Luta",
        "Metroidvania", "Militar", "Mitologia", "Multiplayer", "Mundo Aberto", "Pescaria",
        "Piratas", "Plataformas", "PvP", "Quebra-Cabeça", "Roguelike", "Romance visual",
        "RPG", "Sandbox", "Simulação", "Single Player", "Sobrevivência", "Steampunk",
        "Tabuleiro", "Terror", "Tiro em primeira pessoa", "Turnos", "Zumbis"
    ];

    // Cria o HTML dos options uma vez só
    $options_html = '<option value="" selected> - - - </option>';
    foreach ($tags as $tag) {
        $options_html .= '<option value="'.$tag.'">'.$tag.'</option>';
    }
?>

<div class="Taggs">
    <div class="taggers01" style="display:flex">
        <?php
        for ($i = 1; $i <= 6; $i++) {
            echo '<div id="tag_'.sprintf('%02d', $i).'_container" style="display:'.($i == 1 ? 'block' : 'none').'; margin-left:'.($i == 1 ? '0%' : '3%').';">';
            echo '<select id="tag_'.sprintf('%02d', $i).'" class="form-select" aria-label="Default select example" style="width:200px;">';
            echo $options_html;
            echo '</select>';
            echo '</div>';
        }
        ?>
    </div>
    <br>
    <div class="taggers02" style="display:flex">
        <?php
        for ($i = 7; $i <= 10; $i++) {
            echo '<div id="tag_'.sprintf('%02d', $i).'_container" style="display:none; margin-left:'.($i == 7 ? '0%' : '3%').';">';
            echo '<select id="tag_'.sprintf('%02d', $i).'" class="form-select" aria-label="Default select example" style="width:200px;">';
            echo $options_html;
            echo '</select>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<br><br>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selects = [];
        const containers = [];

        // Preenche arrays com os selects e seus containers
        for (let i = 1; i <= 10; i++) {
            const num = i.toString().padStart(2, '0');
            selects.push(document.getElementById(`tag_${num}`));
            containers.push(document.getElementById(`tag_${num}_container`));
        }

        function reorganizarTags() {
            // Captura todos os valores preenchidos
            const valores = selects.map(select => select.value).filter(valor => valor !== "");

            // Limpa tudo
            selects.forEach(select => select.value = "");

            // Repreenche de cima para baixo
            valores.forEach((valor, index) => {
                selects[index].value = valor;
            });

            // Atualiza exibição dos containers
            selects.forEach((select, index) => {
                if (index === 0 || selects[index-1].value !== "") {
                    containers[index].style.display = "block";
                } else {
                    containers[index].style.display = "none";
                }
            });

            // Mostrar o próximo container vazio se ainda tiver espaço
            const primeiroVazio = selects.findIndex(select => select.value === "");
            if (primeiroVazio !== -1 && primeiroVazio < selects.length) {
                containers[primeiroVazio].style.display = "block";
            }
        }

        // Adiciona evento de mudança em todos os selects
        selects.forEach(select => {
            select.addEventListener("change", reorganizarTags);
        });
    });
</script>
