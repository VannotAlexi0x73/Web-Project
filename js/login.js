function checkPassword() {
    // On recupère les elements utiles
    var pwd = document.getElementById("password");
    var pwd2 = document.getElementById("password2");
    var submit = document.getElementById("sign_up");

    // Traitement
    if (pwd.value && pwd2.value) {
        if (pwd.value == pwd2.value) {
            submit.disabled = false;
            submit.style.cursor = "pointer";
            // On remet en place de hover
            submit.style.backgroundColor = "#ff6e40";
            submit.onmouseenter = function() {
                this.style.backgroundColor = "#fa4911";
            }
            submit.onmouseout = function() {
                this.style.backgroundColor = "#ff6e40";
            }
            pwd2.style.background = "#a1d66b";
        } else {
            submit.disabled = true;
            submit.style.cursor = "default";
            submit.style.backgroundColor = "#ff9370";
            pwd2.style.background = "#e84848";
        }
    }
}