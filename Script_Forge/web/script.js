const sectionMessages = document.querySelector("#messages");
const inputMessage = document.querySelector("#message");
const buttonMessage = document.querySelector("#send-message");
const formMessage = document.querySelector("form");
const model = "gpt-3.5-turbo-1106";


const BASE_URL = "https://api.openai.com/v1/chat/completions";
const API_KEY = "sk-proj-9M69UQuko2BH9PXrm0JZT3BlbkFJfZZdmAsXCnFM72WcahaJ";


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

async function insertMessageInHTML() {
    const userInputMessage = document.getElementById("message").value;

    sectionMessages.innerHTML = `
      <div class="image-name">
        <i class="bi bi-person-circle"></i>
        <h4>You</h4>
      </div>
      <p class="message-p"> ${userInputMessage} </p>
    `;

    formMessage.reset();
    resetButtonState();

    const responseGPT = await postMessageGPT(userInputMessage);
    sectionMessages.innerHTML += `
      <div class="image-name">
        <img src="./icon.webp">
        <h4>ChatGPT</h4>
      </div>
      <p class="message-p"> ${responseGPT} </p>

      <div class="mb-3" id="gptResponse">
          <label for="response" class="form-label"></label>
          <textarea readonly class="form-control" id="messages" rows="3"> ${responseGPT} </textarea>
      </div>
    `;
}


function resetButtonState() {
  buttonMessage.classList.remove("color-white"); // talvez possa ser alterado
  buttonMessage.classList.add("color-gray");     // talvez possa ser alterado
  buttonMessage.disabled = true;
}

async function postMessageGPT(message) {
    const body = {
        messages: [
            {
                content: "Escreva um enredo para um jogo de vidêo-game baseado em " + message,
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
        return error.message;
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

