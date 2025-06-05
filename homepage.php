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
    <title>ForkScore</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div id="background">
        <?php include("./utilsPHP/navbar.php"); ?>
        <div class="container mt-3 divBackground">
            <div class="text-center mb-4 p-4">
                <h1 class="mb-3">Benvenuto, <b><?php echo $_SESSION["username"] ?></b>!</h1>
                <h4 class="text-muted">
                    Hai effettuato 
                    <span class="badge bg-success">
                        <?php
                            $recensioni = $conn->query("SELECT COUNT(*) as tot FROM recensione r JOIN utente u ON u.id_utente = r.id_utente WHERE u.username = '". $_SESSION["username"] ."'")->fetch_assoc()["tot"];
                            echo $recensioni;
                        ?>
                    </span> recensioni
                </h4>
            </div>
            <?php include("./utilsPHP/tabellaRecensioniUtente.php"); ?>
            <!-- Nuova recensione -->
            <div class="text-center mb-4">
                <h1>Lascia una nuova recensione</h1>
                <hr>
                <form action="./script_nuovaRecensione.php" method="post">
                    <div class="stelleValutazione mb-3">
                        <?php for ($i = 5; $i >= 1; $i--): ?>
                            <input id="voto-<?php echo $i ?>" type="radio" name="voto" value="<?php echo $i ?>" required />
                            <label for="voto-<?php echo $i ?>" title="<?php echo $i ?> stell<?php echo $i > 1 ? 'e' : '' ?>">
                                <svg viewBox="0 0 576 512" height="1em">
                                    <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                                </svg>
                            </label>
                        <?php endfor; ?>
                    </div>
                    <?php include("./utilsPHP/selectRistoranti.php"); ?> <br>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="submit" class="btn btn-outline-success">Invia</button>
                        <button type="reset" class="btn btn-outline-danger">Annulla</button>
                    </div>
                    <?php
                        if (isset($_SESSION["esitoRecensione"])) {
                            echo "<p class='mt-2 text-secondary-emphasis'>" . $_SESSION["esitoRecensione"] . "</p>";
                            unset($_SESSION["esitoRecensione"]);
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <?php include("./utilsPHP/formLogout.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-q8vbdOJ9FB6c+Od76PVCmYl38J5+B0Sk/sPil9/JAzlZMI6JYt" 
        crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>