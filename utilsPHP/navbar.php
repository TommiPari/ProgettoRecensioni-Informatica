<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm" style="box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a href="./index.php" class="navbar-brand d-flex align-items-center gap-2" >
                <img src="./images/logo.png" alt="Logo" width="50" height="50">
                <b class="fs-4">ForkScore</b>
            </a>
        </div>
        <div class="mx-auto text-center">
            <a href="./listaristoranti.php" class="btn btn-link text-dark oggettoNav">
                <i class="fa fa-utensils me-2"></i>
                Tutti i ristoranti
            </a>
        </div>
        <div class="d-flex align-items-center">
            <?php
                if ($_SESSION["login"]) {
                    if ($_SESSION["admin"]) {
                        echo '<a href="./pannelloadmin.php" class="btn btn-link text-dark me-2 oggettoNav"><i class="bi bi-house-door fs-5"></i></a>';
                    } else {
                        echo '<a href="./homepage.php" class="btn btn-link text-dark me-2 oggettoNav"><i class="bi bi-house-door fs-5"></i></a>';
                    }
                    echo '<a href="./account.php" class="btn btn-link text-dark me-2 oggettoNav"><i class="bi bi-person fs-5"></i></a>';
                    echo '<button class="btn btn-outline-danger" onclick="confermaLogout()">Logout</button>';
                } else {
                    echo '<a href="pannellologin.php" class="btn btn-outline-success">Login</a>';
                }
            ?>
        </div>
    </div>
</nav>
