<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="navbar-brand">
            <a href="./index.php"><img src="./images/logo.png" width="50" heigth ="50"></a> I'desinare
        </div>
        <div class="nav-item">
            <?php
                if ($_SESSION["login"] || $_SESSION["admin"]) {
                    echo '<a href="./homepage.php"><button class="btn"><i class="bi bi-person"></i></button></a>';
                    echo '<a href="./impostazioni.php"><button class="btn"><i class="bi bi-gear-fill"></i></button></a>';
                    echo '<button class="btn btn-outline-danger" onclick="confermaLogout()">Logout</button>';
                } else {
                    echo '<a href="pannellologin.php"><button class="btn btn-outline-success">Login</button></a>';
                }
            ?>
        </div>
    </div>
</nav>