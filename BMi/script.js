import env from './env.js';
const apiKey = env.API_KEY;
const messageBar = document.querySelector(".bar-wrapper input");
const sendBtn = document.querySelector(".bar-wrapper button");
const messageBox = document.querySelector(".message-box");
let API_URL = "https://api.openai.com/v1/chat/completions";
let API_KEY = apiKey;
sendBtn.onclick = function () {
  if(messageBar.value.length > 0){
    const UserTypedMessage = messageBar.value;
    messageBar.value = "";
    let message =
    `<div class="chat message">
    <img src="user.png"> 
    <span>  
      ${UserTypedMessage}
    </span>
  </div>`;

  let response = 
  `<div class="chat response">
  <img src="bot.png">
  <span class= "new">...
  </span>
</div>`

    messageBox.insertAdjacentHTML("beforeend", message);

    setTimeout(() =>{
      messageBox.insertAdjacentHTML("beforeend", response);

      const requestOptions = {
        method : "POST",
        headers: {
          "Content-Type": "application/json",
          "Authorization": `Bearer ${API_KEY}`
        },
        body: JSON.stringify({
          "model": "gpt-3.5-turbo",
          "messages": [{"role": "user", "content": UserTypedMessage}]
        })
      }
      
      const ChatBotResponse = document.querySelector(".response .new");
      fetch(API_URL, requestOptions).then(res => res.json()).then(data => {
        console.log(data);
        ChatBotResponse.innerHTML = data.choices[0].message.content;
        ChatBotResponse.classList.remove("new");
      }).catch((error) => {
        console.error("Error: ", error);
        ChatBotResponse.innerHTML = "Please try again"
      })
    }, 100);
  }
}


