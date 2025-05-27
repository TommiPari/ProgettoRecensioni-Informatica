<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="navbar-brand">
            <img src="./images/logo.png" width="50" heigth ="50"> I'desinare
        </div>
        <div class="nav-item">
            <?php
                if ($_SESSION["login"] || $_SESSION["admin"]) {
                    echo '<button class="btn btn-outline-danger" onclick="confermaLogout()">Logout</button>';
                    echo '<a href="./impostazioni.php"><button class="btn"><i class="bi bi-gear-fill"></i></button></a>';
                } else {
                    echo '<a href="pannellologin.php"><button class="btn btn-outline-success">Login</button></a>';
                }
            ?>
        </div>
    </div>
</nav>