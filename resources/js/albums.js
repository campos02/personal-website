const buttons = document.getElementsByClassName("albums-button");

for (let button of buttons) {
    button.onclick = () => {
        for (let node of button.parentElement.childNodes) {
            if (node.id === "album-list") {
                // Close other album lists
                const albumLists = document.getElementsByClassName("show-albums");
                for (let albumList of albumLists) {
                    if (albumList != node)
                        albumList.classList.remove("show-albums");
                }

                // Close if open and vice versa
                if (node.classList.contains("show-albums")) {
                    node.classList.remove("show-albums");
                    return;
                }
    
                node.classList.add("show-albums");
            }
        }
    };
}