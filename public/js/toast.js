function mostrarToast(mensaje) {
    const toastEl = document.getElementById("toast");
    const toastBody = toastEl.querySelector(".toast-body");

    toastBody.textContent = mensaje;

    const toast = new bootstrap.Toast(toastEl);
    toast.show();
}