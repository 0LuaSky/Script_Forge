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

        function atualizarExibicaoTags() {
            for (let i = 0; i < selects.length; i++) {
                if (i === 0) {
                    // Sempre mostra a primeira
                    containers[i].style.display = "block";
                } else {
                    // Mostra a atual se a anterior estiver preenchida
                    if (selects[i - 1].value !== "") {
                        containers[i].style.display = "block";
                    } else {
                        containers[i].style.display = "none";
                        selects[i].value = ""; // Limpa o select escondido
                    }
                }
            }
        }

        // Adiciona evento de mudança em todos os selects
        selects.forEach(select => {
            select.addEventListener("change", atualizarExibicaoTags);
        });

        // Roda uma vez na carga da página
        atualizarExibicaoTags();
    });
</script>
