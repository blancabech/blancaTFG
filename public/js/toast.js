function mostrarToast(mensaje, tipo = "danger") {
    const toastEl = document.getElementById("toast");
    const toastBody = toastEl.querySelector(".toast-body");
    toastBody.textContent = mensaje;

    toastEl.classList.remove(
        "text-bg-success",
        "text-bg-danger",
        "text-bg-warning",
        "text-bg-info",
        "text-bg-primary",
        "text-bg-secondary",
        "text-bg-dark",
        "text-bg-light"
    );

    toastEl.classList.add("text-bg-" + tipo);

    const instancia = bootstrap.Toast.getInstance(toastEl);
    if (instancia) instancia.dispose();

    const toast = new bootstrap.Toast(toastEl);
    toast.show();
}