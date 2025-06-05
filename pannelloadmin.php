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
    <title>ForkScore - Admin</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div id="background">
        <?php include("./utilsPHP/navbar.php"); ?>
        <div class="container mt-4">
            <div class="divBackground p-4">
                <h1 class="text-center mb-4">Benvenuto, <b><?php echo $_SESSION["username"] ?></b></h1>

                <!-- Tabella ristoranti -->
                <?php include("./utilsPHP/tabellaRistoranti.php"); ?>

                <!-- Inserisci nuovo ristorante -->
                <div class="mt-2">
                    <h2 class="text-center mb-3">Inserisci un nuovo ristorante</h2>
                    <div class="card p-4 mx-auto" style="max-width: 600px;">
                        <form action="./script_nuovoRistorante.php" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="indirizzo" placeholder="Indirizzo" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="citta" placeholder="Città" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="lat" placeholder="Latitudine" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="lon" placeholder="Longitudine" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-success">Invia</button>
                            </div>
                            <?php
                                if (isset($_SESSION["esitoRistorante"])) {
                                    echo "<p class='mt-3 text-secondary-emphasis text-center'>" . $_SESSION["esitoRistorante"] . "</p>";
                                    unset($_SESSION["esitoRistorante"]);
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("./utilsPHP/formLogout.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-q8vbdOJ9FB6c+Od76PVCmYl38J5+B0Sk/sPil9/JAzlZMI6JYt" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>
