function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("open");

    var main = document.getElementById("main");
    main.classList.toggle("open");
}

function sendMessage() {
    var messageInput = document.getElementById("message");
    var message = messageInput.value;

    if (message.trim() !== "") {
        var conversation = document.getElementById("conversation");

        var messageElement = document.createElement("div");
        messageElement.innerText = message;
        messageElement.classList.add("message");
        conversation.appendChild(messageElement);

        messageInput.value = "";
        messageInput.focus();
    }
}
