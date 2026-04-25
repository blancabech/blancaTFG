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
                    <a class="nav-link dropdown-toggle <?= ($title === 'Servicios') ? 'active text-acento' : '' ?>" href="/blancaTFG/servicios.php" data-bs-toggle="dropdown" aria-expanded="false">Servicios</a>
                    <ul class="dropdown-menu"> 
                        <li><a class="dropdown-item" href="/blancaTFG/servicios.php">ATM y dolor orofacial</a></li>
                        <li><a class="dropdown-item" href="/blancaTFG/servicios.php#Bruxismo">Bruxismo</a></li>
                    </ul> 
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title === 'Sobre mí') ? 'active text-acento' : '' ?>" href="/blancaTFG/sobreMi.php">Sobre mí</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title === 'Contacto') ? 'active text-acento' : '' ?>" href="/blancaTFG/contacto.php">Contacto</a>
                </li>
            </ul>
            <form class="d-flex ms-auto me-4">
                <button class="btn btn-sm btn-outline-secondary me-2 bg-primario text-acento border-acento" type="button">Iniciar sesión</button>
                <button class="btn btn-outline-success bg-acento text-primario border-primario" type="button">Registrarse</button>
            </form>
        </div>
    </div>
</nav>