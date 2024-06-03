const buttons = document.getElementsByClassName("albums-button");

for (let button of buttons) {
    button.onclick = () => {
        for (let node of button.parentElement.childNodes) {
            if (node.classList !== undefined) {
                if (node.classList.contains("show-albums")) {
                    node.classList.remove("show-albums");
                    return;
                }
    
                if (node.classList.contains("albums")) {
                    node.classList.add("show-albums");
                }
            }
        }
    };
}