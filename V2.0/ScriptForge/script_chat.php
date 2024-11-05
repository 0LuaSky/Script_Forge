    const sectionMessages = document.querySelector("#messages");
    const inputMessage = document.querySelector("#message");
    const buttonMessage = document.querySelector("#send-message");
    const formMessage = document.querySelector("form");
    const model = "gpt-3.5-turbo-1106";

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
        const hasValue = inputMessage.value != "";

        buttonMessage.classList.toggle("color-white", hasValue);
        buttonMessage.classList.toggle("color-gray", !hasValue);
        buttonMessage.disabled = !hasValue;

        if (hasValue && event.key === "Enter") {
            event.preventDefault();
            insertMessageInHTML();
        }
    });

    async function insertMessageInHTML() {
        const userInputMessage = document.getElementById("message").value;

        formMessage.reset();
        resetButtonState();

        const responseGPT = await postMessageGPT(userInputMessage, op01, op02, op03, op04, op05, op06, op07, op08, op09, op10);
        const tittleGPT = await posttittleGPT(userInputMessage);    

        sectionMessages.innerHTML = `
        <br><br><br><br><br>
        <div id="resposta">
            <div class="image-name" style="display:flex">
                <i class="bi bi-cup-hot"></i>
                <h4>&nbsp${tittleGPT}</h4>
            </div>
            <div class="mb-3" id="gptResponse">
                <label for="response" class="form-label"></label>
                <textarea readonly class="form-control" id="messages" style="height:600px;"> ${responseGPT} </textarea>
            </div>
        </div>
        `;
    }


    function resetButtonState() {
        buttonMessage.classList.remove("color-white"); // talvez possa ser alterado
        buttonMessage.classList.add("color-gray");     // talvez possa ser alterado
        buttonMessage.disabled = true;
    }

    async function postMessageGPT(message, opt01, opt02, opt03, opt04, opt05, opt06, opt07, opt08, opt09, opt10) {
        const body = {
            messages: [
                {
                    content:"Escreva um enredo para um jogo " + opt01 + opt02 + opt03 + opt04 + opt05 + opt06 + opt07 + opt08 + opt09 + opt10 + " de vidêo-game baseado em " + message,
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
    Sinto muito";
        } finally {
            hideLoadingIndicator();
        }
        
        
    }
    async function posttittleGPT(message) {
        const body = {
            messages: [
                {
                    content: "Escreva um titulo para um jogo de vidêo-game baseado em " + message,
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
            return "Não foi possilve criar um titulo.";
        } finally {
            hideLoadingIndicator();
        }
        
        
    }

    function showLoadingIndicator() {
    const loadingElement = document.createElement("div");
    loadingElement.className = "lds-ellipsis";
    loadingElement.innerHTML = "<div></div><div></div><div></div><div></div>";
    sectionMessages.appendChild(loadingElement);
    }

    function hideLoadingIndicator() {
    const loadingElement = sectionMessages.querySelector(".lds-ellipsis");
    if (loadingElement) loadingElement.remove();
    }
