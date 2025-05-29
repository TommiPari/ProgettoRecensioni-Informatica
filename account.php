<?php
    session_start();
    if (!$_SESSION["login"]) {
        header("Location: index.php");
        exit;
    }
    include("./connection/connessione.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div id="background">
        <?php include("./utilsPHP/navbar.php"); ?>
        <!-- Body -->
        <div class="mt-3 w-75 divBackground">
            <h1>Impostazioni account</h1><hr>

            <div>
                <h3>Cambio password</h3>
                <form action="./script_cambioPassword.php" method="post">
                    <div class="input-group">
                        <input type="password" class="form-control w-50" placeholder="Inserire una nuova password" name="password" required>
                        <span class="input-group-text bg-success"><button type="submit" class="btn btn-success">Invia</button></span>
                    </div>
                    <?php
                        if (isset($_SESSION["erroreCambioPassword"])) {
                            switch($_SESSION["erroreCambioPassword"]) {
                                case 0:
                                    echo "<p class='text-success'>Password cambiata con successo!</p>";
                                    break;
                                case 1:
                                    echo "<p class='text-danger'>Inserire una password differente da quella attuale</p>";   
                                    break;
                                case 2:
                                    echo "<p class='text-danger'>Errore nella query!</p>";
                                    break;
                            }
                        }
                        unset($_SESSION["erroreCambioPassword"]);
                    ?>
                </form>
            </div>
        </div>
    </div>
    <?php include("./utilsPHP/formLogout.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-q8vbdOJ9FB6c+Od76PVCmYl38J5+B0Sk/sPil9/JAzlZMI6JYt" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>