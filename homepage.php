<?php
    session_start();
    if ($_SESSION["login"]) {
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
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <h2 class="navbar-brand">Recensioni ristorante</h2>
                <button class="btn btn-outline-danger" onclick="confermaLogout()">Logout</button>
            </div>
        </nav>
        <!-- Body -->
        <div class="mt-3 w-75 divBackground">
            <h1>Benvenuto <?php echo $_SESSION["username"] ?></h1>
            <h3>Numero di recensioni effettuate: 
                <?php
                    $recensioni = $conn->query("SELECT COUNT(*) as tot FROM recensione r JOIN utente u ON u.id_utente = r.id_utente WHERE u.username = '". $_SESSION["username"] ."'")->fetch_assoc()["tot"];
                    echo $recensioni;
                ?>
            </h3><br>
            <?php include("./utilsPHP/tabellaRecensioni.php"); ?>
            <h2>Lascia una nuova recensione</h2>
            <form action="./script_nuovaRecensione.php" method="post">
                <div class="stelleValutazione">
                    <input id="voto-5" type="radio" name="voto" value="5" required/>
                    <label for="voto-5" title="5 stelle">
                        <svg viewBox="0 0 576 512" height="1em">
                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                        </svg>
                    </label>
                    <input id="voto-4" type="radio" name="voto" value="4" required/>
                    <label for="voto-4" title="4 stelle">
                        <svg viewBox="0 0 576 512" height="1em">
                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                        </svg>
                    </label>
                    <input id="voto-3" type="radio" name="voto" value="3" required/>
                    <label for="voto-3" title="3 stelle">
                        <svg viewBox="0 0 576 512" height="1em">
                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                        </svg>
                    </label>
                    <input id="voto-2" type="radio" name="voto" value="2" required/>
                    <label for="voto-2" title="2 stelle">
                        <svg viewBox="0 0 576 512" height="1em">
                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                        </svg>
                    </label>
                    <input id="voto-1" type="radio" name="voto" value="1" required/>
                    <label for="voto-1" title="1 stella">
                        <svg viewBox="0 0 576 512" height="1em">
                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"></path>
                        </svg>
                    </label>
                </div> <br>
                <?php include("./utilsPHP/selectRistoranti.php"); ?> <br>
                <button type="submit" class="btn btn-outline-success mb-3">Invia</button><br>
                <?php
                    if (isset($_SESSION["esitoRecensione"])) {
                        echo "<p>".$_SESSION["esitoRecensione"]."</p>";
                        unset($_SESSION["esitoRecensione"]);
                    }
                ?>
            </form>
        </div>
    </div>
    <!-- Logout -->
    <div class="d-none divInTheMiddle divBackground" id="confermaLogout">
        <div class="text-end mb-2">
            <button class="btn btn-danger" onclick="chiudiLogout()">X</button>
        </div>    
        <div class="p-3">
            <h1>Sei sicuro di voler effettuare il logout?</h1><br>
            <form action="./logout.php" class="text-center">
                <button type="submit" class="btn btn-outline-danger">Conferma logout</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-q8vbdOJ9FB6c+Od76PVCmYl38J5+B0Sk/sPil9/JAzlZMI6JYt" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>
</html>