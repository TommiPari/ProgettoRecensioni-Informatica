<?php
    session_start();
    include("./connection/connessione.php");
    $id = $conn->query("SELECT id_utente as id FROM utente WHERE username = '". $_SESSION["username"]."'")->fetch_assoc()["id"];
    $conn->query("INSERT INTO recensione (voto, id_utente, id_ristorante) VALUES (".$POST["voto"].", $id, ".$POST["ristorante"].")");
    header("Location: homepage.php");
    exit;
?>