<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        $_SESSION["login"] = false;
    }
    if (!isset($_SESSION["admin"])) {
        $_SESSION["admin"] = false;
    }
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
</head>

<body>
    <div id="background">
    <?php include("./utilsPHP/navbar.php"); ?>
        <div class="mt-5 w-75 divBackground">
            <h1>I'desinare</h1>
            <div class="row">
                <div class="col-6">
                    <p>I'desinare è la nuova piattaforma digitale dedicata agli amanti del buon cibo e delle esperienze gastronomiche autentiche. Progettata per offrire recensioni affidabili, dettagliate e aggiornate sui ristoranti di ogni tipo (dalle osterie di quartiere alle cucine stellate). I'desinare mette al centro la voce dei clienti reali.<br>
                        Con un'interfaccia intuitiva e un sistema di valutazione trasparente basato su gusto, servizio, ambiente e rapporto qualità-prezzo, la piattaforma permette agli utenti di condividere le proprie esperienze culinarie attraverso recensioni scritte, foto dei piatti e suggerimenti personalizzati.<br>
                        I'desinare non è solo uno spazio per recensire, ma una vera e propria community per chi ama scoprire nuovi sapori: grazie a funzionalità come le liste personalizzate, i percorsi gastronomici e i filtri intelligenti, ogni utente può trovare il locale perfetto per ogni occasione.
                    </p>
                </div>
                <div class="col-6 text-center">
                    <img src="./images/logo.png" class="w-75">
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