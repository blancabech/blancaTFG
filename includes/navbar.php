<nav class="navbar sticky-top bg-body-tertiary navbar-expand-lg navbar-dark bg-primario" aria-label="Fourth navbar example">
    <div class="container-fluid">

        <a class="navbar-brand ms-4" href="/blancaTFG/index.php">
            <img id="LogoATMST" src="/blancaTFG/public/media/LogoBlanco.png" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 ms-3 gap-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($title === 'Servicios') ? 'active text-acento' : '' ?>" href="/blancaTFG/servicios.php" data-bs-toggle="dropdown" aria-expanded="false">
                        Servicios
                    </a>
                    <ul class="dropdown-menu"> 
                        <li><a class="dropdown-item" href="/blancaTFG/servicios.php">ATM y dolor orofacial</a></li>
                        <li><a class="dropdown-item" href="/blancaTFG/servicios.php#Bruxismo">Bruxismo</a></li>
                        <li><a class="dropdown-item" href="/blancaTFG/servicios.php#Tarifas">Tarifas</a></li>
                    </ul> 
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title === 'Sobre mí') ? 'active text-acento' : '' ?>" href="/blancaTFG/sobreMi.php">
                        Sobre mí
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title === 'Contacto') ? 'active text-acento' : '' ?>" href="/blancaTFG/contacto.php">
                        Contacto
                    </a>
                </li>
            </ul>

            <!-- Dependiendo si hay usuario logeado y si es cliente o admin, se muestran diferentes botones -->
            <div class="d-flex ms-auto me-4">
            <?php if (!isset($_SESSION['id_usuario'])): ?>
                <a href="/blancaTFG/iniciarSesion.php" class="btn btn-sm btn-outline-secondary me-2 bg-primario text-acento border-acento py-2">
                    Iniciar sesión
                </a>
                <a href="/blancaTFG/registrarse.php" class="btn btn-outline-success bg-acento text-primario border-acento py-2">
                    Registrarse
                </a>

            <?php else: ?>
                <?php if ($_SESSION['tipo_usuario'] == 0): ?> <!-- Cliente -->
                    <a href="/blancaTFG/misCitas.php" class="btn btn-outline-success bg-acento text-primario border-acento py-2 me-3">
                        Mis citas
                    </a>
                <?php elseif ($_SESSION['tipo_usuario'] == 1): ?> <!-- Admin -->
                    <a href="/blancaTFG/administrador.php" class="btn bg-acento text-primario me-3 py-2">
                        Panel Admin
                    </a>
                <?php endif; ?>

                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle bg-primario text-acento border-acento py-2" 
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mi cuenta
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="/blancaTFG/auth/logout.php">
                                Cerrar sesión
                            </a>
                        </li>
                        <?php if ($_SESSION['tipo_usuario'] == 0): ?>
                            <li>
                                <a class="dropdown-item text-danger" href="/blancaTFG/auth/eliminarCuenta.php">
                                    Eliminar cuenta
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
            </div>

        </div>
    </div>
</nav>