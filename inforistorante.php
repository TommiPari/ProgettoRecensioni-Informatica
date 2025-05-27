<?php
    session_start();
    if (!$_SESSION["login"]) {
        header("Location: index.php");
        exit;
    }
    include("./connection/connessione.php");
    $id_ristorante = $_GET["ristorante"];
    $ristorante = $conn->query("SELECT nome, indirizzo, citta, ST_X(posizione) as longitudine, ST_Y(posizione) as latitudine FROM ristorante WHERE id_ristorante = $id_ristorante")->fetch_assoc();
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
</head>
<body onload="impostaMarker(<?php echo $ristorante['latitudine']. ', '.$ristorante['longitudine']?>)">
    <div id="background">
        <?php include("./utilsPHP/navbar.php"); ?>
        <!-- Body -->
        <div class="mt-3 w-75 divBackground">
            <h1><?php echo $ristorante["nome"]; ?></h1>
            <p><i><?php echo $ristorante["indirizzo"]. ", ". $ristorante["citta"];?></i></p>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <?php include("./utilsPHP/tabellaRecensioniRistorante.php"); ?>
                    <a href="./homepage.php"><button class="btn btn-outline-danger">Torna indietro</button></a>
                </div>
                <div id="map" class="col-sm-6"></div>
            </div>
        </div>
    </div>
    <?php include("./utilsPHP/formLogout.html"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-q8vbdOJ9FB6c+Od76PVCmYl38J5+B0Sk/sPil9/JAzlZMI6JYt" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>
    <script src="./js/script.js"></script>
</body>
</html>