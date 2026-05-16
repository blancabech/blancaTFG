<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$toast = null;
$toast_tipo = "danger";

if (isset($_SESSION["toast_mensaje"])) {
    $toast = $_SESSION["toast_mensaje"];
    $toast_tipo = $_SESSION["toast_tipo"] ?? "success";
    unset($_SESSION["toast_mensaje"], $_SESSION["toast_tipo"]);
} elseif (isset($_SESSION["toast_error"])) {
    $toast = $_SESSION["toast_error"];
    $toast_tipo = "danger";
    unset($_SESSION["toast_error"]);
}
?>
<div class="toast-container position-fixed top-5 end-0 p-3">
    <div id="toast" class="toast text-bg-<?= $toast_tipo ?> border-0" role="alert">
        <div class="toast-body"></div>
    </div>
</div>

<?php if ($toast): ?>
<script>
document.addEventListener("DOMContentLoaded", () => {
    mostrarToast("<?= $toast ?>", "<?= $toast_tipo ?>");
});
</script>
<?php endif; ?>