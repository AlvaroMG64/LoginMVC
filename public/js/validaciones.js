document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("form");
    if (!form) return;

    form.addEventListener("submit", e => {

        const usuario = document.getElementById("identificador").value.trim();
        const password = document.getElementById("password").value.trim();

        const usuarioRegex = /^[A-Za-z0-9_]{8,15}$/;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%&*?-])[A-Za-z\d!@#$%&*?-]{8,15}$/;

        let msg = "";

        if (!usuarioRegex.test(usuario)) {
            msg = "Usuario inválido (8–15 caracteres alfanuméricos o _)";
        } else if (!passwordRegex.test(password)) {
            msg = "Contraseña insegura.";
        }

        if (msg) {
            e.preventDefault();
            alert(msg);
        }
    });
});