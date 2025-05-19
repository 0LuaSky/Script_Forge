const sectionMessages = document.querySelector("#messages");
const sectionSave = document.querySelector("#saves");
const inputMessage = document.querySelector("#message");
const buttonMessage = document.querySelector("#send-message");
const formMessage = document.querySelector("form");
const model = "gpt-3.5-turbo";

const BASE_URL = "https://api.openai.com/v1/chat/completions";
const API_KEY = "";

const respostasSalvas = [];
respostasSalvas[0] = OriginalResponseGPT;
let count = 0;

formMessage.addEventListener("submit", (e) => e.preventDefault());
buttonMessage.addEventListener("click", insertMessageInHTML);


inputMessage.addEventListener("keyup", (event) => {
    const hasValue = inputMessage.value !== "";

    buttonMessage.classList.toggle("color-white", hasValue);
    buttonMessage.classList.toggle("color-gray", !hasValue);
    buttonMessage.disabled = !hasValue;

    if (hasValue && event.key === "Enter") {
        event.preventDefault();
    }
});

async function character(){
    const originaltext = OriginalResponseGPT;
    const options = op00;
    const prompt = Originalprompt;
    const userInputMessage = "Elabore mais os personagens";

    const characterButton = document.getElementById("character-buttom");
    characterButton.disabled = true;

    try{
        const responseGPT = await postMessageGPT(originaltext, userInputMessage, options, prompt);
        count ++;

        // Inserindo a resposta no HTML
        sectionMessages.innerHTML +=  `
        <div class="rounded-5 border mb-3">
            <div class="m-3 mb-5">
                <div class="row mx-auto d-flex ">
                    <div class="col-10">
                        <input class="form-control me-5 rounded-5" type="text" name="question" placeholder="elabore mais o texto..." value="${userInputMessage}">
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary mb-3 mx-auto w-100 rounded-5" onclick="rewrite(this)" data-index="${count}">Reescrever</button>
                    </div>
                </div>
                <div class="mb-4">
                    <textarea  class="form-control" style="height:300px;">${responseGPT}</textarea>
                </div>
            </div>
        </div>`;

        save(count, responseGPT)
    } catch (error) {
        sectionMessages.innerHTML = "Erro ao gerar o script.";
        console.error(error);
    } finally {
        hideLoadingIndicator(); // Oculta quando finalizar
    }
}
async function scenary(){
    const originaltext = OriginalResponseGPT;
    const options = op00;
    const prompt = Originalprompt;
    const userInputMessage = "Elabore mais o cenario em que se passa o jogo";

    const characterButton = document.getElementById("cenary-buttom");
    characterButton.disabled = true;

    try{
        const responseGPT = await postMessageGPT(originaltext, userInputMessage, options, prompt);
        count ++;

        // Inserindo a resposta no HTML
        sectionMessages.innerHTML +=  `
        <div class="rounded-5 border mb-3">
            <div class="m-3 mb-5">
                <div class="row mx-auto d-flex ">
                    <div class="col-10">
                        <input class="form-control me-5 rounded-5" type="text" name="question" placeholder="elabore mais o texto..." value="${userInputMessage}">
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary mb-3 mx-auto w-100 rounded-5" onclick="rewrite(this)" data-index="${count}">Reescrever</button>
                    </div>
                </div>
                <div class="mb-4">
                    <textarea  class="form-control" style="height:300px;">${responseGPT}</textarea>
                </div>
            </div>
        </div>`;

        save(count, responseGPT)
    } catch (error) {
        sectionMessages.innerHTML = "Erro ao gerar o script.";
        console.error(error);
    } finally {
        hideLoadingIndicator(); // Oculta quando finalizar
    }
}
async function history(){
    const originaltext = OriginalResponseGPT;
    const options = op00;
    const prompt = Originalprompt;
    const userInputMessage = "Elabore mais a historia do jogo jogo";

    const characterButton = document.getElementById("history-buttom");
    characterButton.disabled = true;

    try{
        const responseGPT = await postMessageGPT(originaltext, userInputMessage, options, prompt);

        count ++;

        // Inserindo a resposta no HTML
        sectionMessages.innerHTML +=  `
        <div class="rounded-5 border mb-3">
            <div class="m-3 mb-5">
                <div class="row mx-auto d-flex ">
                    <div class="col-10">
                        <input class="form-control me-5 rounded-5" type="text" name="question" placeholder="elabore mais o texto..." value="${userInputMessage}">
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary mb-3 mx-auto w-100 rounded-5" onclick="rewrite(this)" data-index="${count}">Reescrever</button>
                    </div>
                </div>
                <div class="mb-4">
                    <textarea  class="form-control" style="height:300px;">${responseGPT}</textarea>
                </div>
            </div>
        </div>`;

        save(count, responseGPT)
    } catch (error) {
        sectionMessages.innerHTML = "Erro ao gerar o script.";
        console.error(error);
    } finally {
        hideLoadingIndicator(); // Oculta quando finalizar
    }
}

async function elaborate(){
    const originaltext = OriginalResponseGPT;
    const options = op00;
    const prompt = Originalprompt;
    const userInputMessage = document.getElementById("message").value;

    try{
        const responseGPT = await postMessageGPT(originaltext, userInputMessage, options, prompt);

        count++

        // Inserindo a resposta no HTML
        sectionMessages.innerHTML +=  `
        <div class="rounded-5 border mb-3">
            <div class="m-3 mb-5">
                <div class="row mx-auto d-flex ">
                    <div class="col-10">
                        <input class="form-control me-5 rounded-5" type="text" name="question" placeholder="elabore mais o texto..." value="${userInputMessage}">
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary mb-3 mx-auto w-100 rounded-5" onclick="rewrite(this)" data-index="${count}">Reescrever</button>
                    </div>
                </div>
                <div class="mb-4">
                    <textarea  class="form-control" style="height:300px;">${responseGPT}</textarea>
                </div>
            </div>
        </div>`

        document.getElementById("message").value = "";
        save(count, responseGPT)
    } catch (error) {
        sectionMessages.innerHTML = "Erro ao gerar o script.";
        console.error(error);
    } finally {
        hideLoadingIndicator(); // Oculta quando finalizar
    }
}

async function rewrite(button){
    const originaltext = OriginalResponseGPT;
    const options = op00;
    const prompt = Originalprompt;
    const userInputMessage = document.getElementById("message").value;

    const container = button.closest(".border"); // pega o bloco atual
    const input = container.querySelector("input[name='question']");
    const textarea = container.querySelector("textarea");

    const newPrompt = input.value;
    const index = parseInt(button.getAttribute("data-index"));


    try {
        const responseGPT = await postMessageGPT(OriginalResponseGPT, newPrompt, op00, Originalprompt);
        textarea.value = responseGPT; // atualiza só esse textarea

        if (!isNaN(index)) {
            save(index, responseGPT); // salva após reescrever
        }
    } catch (error) {
        textarea.value = "Erro ao reescrever.";
        console.error(error);
    }
     finally {
        hideLoadingIndicator(); // Oculta quando finalizar
    }
}

function save(index, responseGPT) {
    respostasSalvas[index] = responseGPT;

    const titulo = document.getElementById("titulo").value;
    let safeTitulo = escapeHTML(titulo);
    const userInputMessage = Originalprompt;
    const responses = respostasSalvas.join("\n\n---\n\n");


    let op01 = sessionStorage.getItem("tag01");
    let op02 = sessionStorage.getItem("tag02");
    let op03 = sessionStorage.getItem("tag03");
    let op04 = sessionStorage.getItem("tag04");
    let op05 = sessionStorage.getItem("tag05");
    let op06 = sessionStorage.getItem("tag06");
    let op07 = sessionStorage.getItem("tag07");
    let op08 = sessionStorage.getItem("tag08");
    let op09 = sessionStorage.getItem("tag09");
    let op10 = sessionStorage.getItem("tag10");


    console.log("Estado atual:", responses);

    sectionSave.innerHTML =  `
    <form action="" class="row" method="post">
        <div class="col-auto m-auto mt-4">
            ${!sessaoAtiva ? `
                <button type="button" class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#save" style="width: 300px;" disabled>Salvar</button>
                <div class="d-flex">
                    <p class="mx-auto form-text mt-3">
                        Você deve estar logado para poder salvar.
                    </p>   
                </div>   
            ` : '<button type="button" class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#save" style="width: 300px;">Salvar</button>'}                      
        </div>

        <div class="modal fade" id="save" tabindex="-1" aria-labelledby="saveLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="saveLabel">Deseja salvar este roteiro?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <input value="${userInputMessage}" type="hidden" name="prompt">
                        
                        <input value="${safeTitulo}" type="hidden" name="titulo">
                        <textarea name="resposta" hidden>${responses}</textarea>

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
                        <button type="submit" class="btn btn-primary mb-3 me-auto" name="salvar" data-bs-dismiss="modal" >Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>`;
}
function escapeHTML(str) {
  return String(str)
    .replace(/&/g, "&amp;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#39;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;");
}


async function postMessageGPT(originaltext, userInputMessage, options, prompt) {
    const body = {
        messages: [
            {
                content: `Com base no seguinte texto "${originaltext}" "${userInputMessage}", lembrando que é um jogo de video game "${options}" basenado em "${prompt}"`,
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

function showLoadingIndicator() {
    const loadingElement = document.createElement("div");
    loadingElement.id = "loading-text";
    loadingElement.style.textAlign = "center";
    loadingElement.style.fontWeight = "bold";
    loadingElement.style.fontSize = "18px";
    loadingElement.style.marginTop = "20px";
    loadingElement.style.marginBottom = "40px";
    loadingElement.textContent = "Gerando script";
    
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