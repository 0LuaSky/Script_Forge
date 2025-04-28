const sectionMessages = document.querySelector("#messages");
const inputMessage = document.querySelector("#message");
const buttonMessage = document.querySelector("#send-message");
const formMessage = document.querySelector("form");
const model = "gpt-3.5-turbo";

const BASE_URL = "https://api.openai.com/v1/chat/completions";
const API_KEY = "";

const selectop01 = document.querySelector("#tag_01");
const selectop02 = document.querySelector("#tag_02");
const selectop03 = document.querySelector("#tag_03");
const selectop04 = document.querySelector("#tag_04");
const selectop05 = document.querySelector("#tag_05");
const selectop06 = document.querySelector("#tag_06");
const selectop07 = document.querySelector("#tag_07");
const selectop08 = document.querySelector("#tag_08");
const selectop09 = document.querySelector("#tag_09");
const selectop10 = document.querySelector("#tag_10");

let op01 = selectop01.value;
let op02 = selectop02.value;
let op03 = selectop03.value;
let op04 = selectop04.value;
let op05 = selectop05.value;
let op06 = selectop06.value;
let op07 = selectop07.value;
let op08 = selectop08.value;
let op09 = selectop09.value;
let op10 = selectop10.value;

selectop01.addEventListener("change", () => {
  op01 = selectop01.value;
});
selectop02.addEventListener("change", () => {
  op02 = selectop02.value;
});
selectop03.addEventListener("change", () => {
  op03 = selectop03.value;
});
selectop04.addEventListener("change", () => {
  op04 = selectop04.value;
});
selectop05.addEventListener("change", () => {
  op05 = selectop05.value;
});
selectop06.addEventListener("change", () => {
  op06 = selectop06.value;
});
selectop07.addEventListener("change", () => {
  op07 = selectop07.value;
});
selectop08.addEventListener("change", () => {
  op08 = selectop08.value;
});
selectop09.addEventListener("change", () => {
  op09 = selectop09.value;
});
selectop10.addEventListener("change", () => {
  op10 = selectop10.value;
});


formMessage.addEventListener("submit", (e) => e.preventDefault());
buttonMessage.addEventListener("click", insertMessageInHTML);


inputMessage.addEventListener("keyup", (event) => {
    const hasValue = inputMessage.value !== "";

    buttonMessage.classList.toggle("color-white", hasValue);
    buttonMessage.classList.toggle("color-gray", !hasValue);
    buttonMessage.disabled = !hasValue;

    if (hasValue && event.key === "Enter") {
        event.preventDefault();
        insertMessageInHTML();
    }
});

    // Função principal para inserir resposta no HTML
    async function insertMessageInHTML() {
        const userInputMessage = document.getElementById("message").value;

        // Resetando o formulário e estado do botão


        // Fazendo as requisições assíncronas para o GPT
        try{
            const responseGPT = await postMessageGPT(userInputMessage, op01, op02, op03, op04, op05, op06, op07, op08, op09, op10);
            const tittleGPT = await posttittleGPT(userInputMessage);

            // Inserindo a resposta no HTML
            sectionMessages.innerHTML = `
            <br><br><br><br><br>
            <div id="resposta">
                <div class="image-name" style="display:flex">
                    <i class="bi bi-cup-hot"></i>
                    <h4 id="titulo">&nbsp${tittleGPT}</h4>
                </div>
                <div class="mb-3" id="gptResponse">
                    <label for="response" class="form-label"></label>
                    <textarea readonly class="form-control" id="messages" style="height:400px;"> ${responseGPT} </textarea>
                </div>
                <form action="" class="row g-3" method="post">
                    <div class="col-auto m-auto">
                        <br>
                        <button type="button" class="btn btn-primary ms-auto me-1" data-bs-toggle="modal" data-bs-target="#save" style="width: 300px;" onclick="setAcao('salvar')">Salvar</button>
                        <button type="button" class="btn btn-primary me-auto" data-bs-toggle="modal" data-bs-target="#save" style="width: 300px;" onclick="setAcao('elaborar')">Elaborar (WIP)</button>                         
                    </div>
                    <div class="modal fade" id="save" tabindex="-1" aria-labelledby="saveLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="saveLabel">Deseja salvar este roteiro?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <script>
                                        let titulo = document.getElementById("titulo").value;
                                    </script>
                                    <input value="${userInputMessage}" type="hidden" name="prompt">
                                    <input id="tituloInput" type="hidden" name="titulo">
                                    <input id="respostaInput" type="hidden" name="resposta">
                                    <input value="${responseGPT}" type="hidden" name="resposta">
                                    <input value="${op01}" type="hidden" name="op01">
                                    <input value="${op02}" type="hidden" name="op02">
                                    <input value="${op03}" type="hidden" name="op03">
                                    <input value="${op04}" type="hidden" name="op04">
                                    <input value="${op05}" type="hidden" name="op05">
                                    <input value="${op06}" type="hidden" name="op06">
                                    <input value="${op07}" type="hidden" name="op07">
                                    <input value="${op08}" type="hidden" name="op08">
                                    <input value="${op09}" type="hidden" name="op09">
                                    <input value="${op10}" type="hidden" name="op10">
                                    <button type="button" class="btn btn-secondary mb-3 ms-auto" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary mb-3 me-auto" name="salvar" data-bs-dismiss="modal" onclick="processarSalvamento()">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            `;
        } catch (error) {
            sectionMessages.innerHTML = "Erro ao gerar o script.";
            console.error(error);
        } finally {
            hideLoadingIndicator(); // Oculta quando finalizar
        }

        document.getElementById("save").addEventListener('show.bs.modal', function () {
            const titulo = document.getElementById("titulo").innerText.trim(); // Captura o título
            document.getElementById("tituloInput").value = titulo; // Atribui o título ao campo oculto
        });
        document.getElementById("save").addEventListener('show.bs.modal', function () {
            const resposta = document.getElementById("messages").innerText.trim(); // Captura o título
            document.getElementById("respostaInput").value = resposta; // Atribui o título ao campo oculto
        });
    }
    
    let acaoSelecionada = "";

    function setAcao(acao) {
        acaoSelecionada = acao;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const btnSalvar = document.getElementById('btnSalvar');
    
        btnSalvar.addEventListener('click', async function () {
            const prompt = document.getElementById('promptInput').value;
            const titulo = document.getElementById('tituloInput').value;
            const resposta = document.getElementById('respostaInput').value;
            const opcoes = [
                document.getElementById('op01Input').value,
                document.getElementById('op02Input').value,
                document.getElementById('op03Input').value,
                document.getElementById('op04Input').value,
                document.getElementById('op05Input').value,
                document.getElementById('op06Input').value,
                document.getElementById('op07Input').value,
                document.getElementById('op08Input').value,
                document.getElementById('op09Input').value,
                document.getElementById('op10Input').value,
            ];
    
            console.log("Salvando os dados:");
            console.log({ prompt, titulo, resposta, opcoes });
    
            // Aqui você pode fazer o que quiser: enviar via fetch(), salvar no localStorage etc.
            // Exemplo básico:
            /*
            const formData = { prompt, titulo, resposta, opcoes };
            await fetch('/salvar', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(formData)
            });
            */
    
            if (acaoSelecionada === "elaborar") {
                window.location.href = 'google.com'; // ou outro destino
            }
        });
    });

    function resetButtonState() {
        buttonMessage.classList.remove("color-white"); // talvez possa ser alterado
        buttonMessage.classList.add("color-gray");     // talvez possa ser alterado
        buttonMessage.disabled = true;
    }

    async function postMessageGPT(message, opt01, opt02, opt03, opt04, opt05, opt06, opt07, opt08, opt09, opt10) {
        const body = {
            messages: [
                {
                    content: `Esqueça os roteiros anteriores. Escreva apenas um enredo para um jogo de vídeo-game de ${opt01}, ${opt02}, ${opt03}, ${opt04}, ${opt05}, ${opt06}, ${opt07}, ${opt08}, ${opt09}, ${opt10}, baseado em "${message}". Não coloque título.`,
                    role: "system"
                }
            ],
            model: model,
            temperature: 0.2,
            max_tokens: 2000,
            top_p: 1,
            frequency_penalty: 0.5,
            presence_penalty: 0
        };
        
        showLoadingIndicator();
        
        try{
            const response = await fetch(BASE_URL, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Authorization: `Bearer ${API_KEY}`
                },
                body: JSON.stringify(body)
            });
            
            const returnResponseJson = await response.json();
            
            console.log(returnResponseJson);
            return returnResponseJson.choices[0].message.content;
    
        }catch (error){
            console.error("Erro na requisição:", error.message);
            return "Algo deu errado na hora de escrever o roteiro\n\
    Sinto muito.";
        } finally {
            hideLoadingIndicator();
        }
        
        
    }

    async function posttittleGPT(message) {
        const body = {
            messages: [
                {
                    content:"esqueca os titulos anteriores e Escreva um titulo para um jogo de vidêo-game baseado em " + message,
                    role: "system"
                }
            ],
            model: model,
            temperature: 0.2,
            max_tokens: 2000,
            top_p: 1,
            frequency_penalty: 0.5,
            presence_penalty: 0
        };
        
        showLoadingIndicator();
        
        try{
            const response = await fetch(BASE_URL, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Authorization: `Bearer ${API_KEY}`
                },
                body: JSON.stringify(body)
            });
            
            const returnResponseJson = await response.json();
            
            console.log(returnResponseJson);
            return returnResponseJson.choices[0].message.content;
    
        }catch (error){
            console.error("Erro na requisição:", error.message);
            return "Não foi possivel escrever um titulo.";
        } finally {
            hideLoadingIndicator();
        }
        
        
    }

    function showLoadingIndicator() {
        const loadingElement = document.createElement("div");
        loadingElement.id = "loading-text";
        loadingElement.style.textAlign = "center";
        loadingElement.style.fontWeight = "bold";
        loadingElement.style.fontSize = "18px";
        loadingElement.style.marginTop = "20px";
        loadingElement.textContent = "Gerando script";
        
        sectionMessages.innerHTML = ""; // limpa antes de mostrar o loading
        sectionMessages.appendChild(loadingElement);
    
        let dots = "";
        loadingInterval = setInterval(() => {
            dots = dots.length < 3 ? dots + "." : "";
            loadingElement.textContent = "Gerando script" + dots;
        }, 500);
    }

    function hideLoadingIndicator() {
        clearInterval(loadingInterval); // para o loop
        const loadingElement = document.getElementById("loading-text");
        if (loadingElement) loadingElement.remove();
    }