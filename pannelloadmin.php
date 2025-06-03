<?php
    session_start();
    if (!$_SESSION["admin"]) {
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
    <title>ForkScore</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div id="background">
        <?php include("./utilsPHP/navbar.php"); ?>v>
        </nav>
        <!-- Body -->
        <div class="mt-3 w-75 divBackground">
            <h1>Benvenuto <?php echo $_SESSION["username"] ?></h1>
            <?php include("./utilsPHP/tabellaRistoranti.php"); ?>
            <h2>Inserisci un nuovo ristorante</h2>
            <form action="./script_nuovoRistorante.php" method="post">
                <input type="text" class="form-control" name="nome" placeholder="Nome"><br>
                <input type="text" class="form-control" name="indirizzo" placeholder="Indirizzo"><br>
                <input type="text" class="form-control" name="citta" placeholder="Citta"><br>
                <input type="double" class="form-control" name="lat" placeholder="Latitudine"><br>
                <input type="double" class="form-control" name="lon" placeholder="Longitudine"><br>
                <button type="submit" class="btn btn-outline-success mb-3">Invia</button><br>
                <?php
                    if (isset($_SESSION["esitoRistorante"])) {
                        echo "<p>".$_SESSION["esitoRistorante"]."</p>";
                        unset($_SESSION["esitoRistorante"]);
                    }
                ?>
            </form>
        </div>
    </div>
    <?php include("./utilsPHP/formLogout.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-q8vbdOJ9FB6c+Od76PVCmYl38J5+B0Sk/sPil9/JAzlZMI6JYt" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>