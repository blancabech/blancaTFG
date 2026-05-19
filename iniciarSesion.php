<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["id_usuario"])) {
    header("Location: /blancaTFG/index.php");
    exit();
}

$title="Iniciar Sesión";
$links_js=["/blancaTFG/public/js/toast.js"];
include "./includes/header.php";
include "./includes/navbar.php";
include "./includes/toast.php";
?>

<body>

<div class="container-fluid vh-100">
    <div class="row h-100">
        <!-- Imagen izquierda -->
        <div class="col-12 col-md-6 p-0"> 
            <img src="./public/media/chica_amarillo.jpg" class="w-100 h-100 object-fit-cover" alt="chica con dolor mandibular">
        </div>
        <!-- Formulario derecha -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center p-0">
            <h1 class="text-center text-primario mt-4 mb-4">Iniciar sesión</h1>    
            <div class="card shadow card-login p-4">
                <form action="/blancaTFG/auth/login.php" method="POST">
                    <div class="mb-3">
                        <label class="text-fuerte form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label class="text-fuerte form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-acento text-primario mt-4 py-2 px-4">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

<?php include "./includes/footer.php";
?>
