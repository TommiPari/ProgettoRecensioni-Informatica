<?php
    session_start();
    include("./connection/connessione.php");
    $id_utente = $conn->query("SELECT id_utente as id FROM utente WHERE username = '". $_SESSION["username"]."'")->fetch_assoc()["id"];
    $id_ristorante = $_POST["ristorante"];
    $voto = $_POST["voto"];
    if ($conn->query("SELECT COUNT(*) FROM recensione WHERE id_utente = $id_utente AND id_ristorante = $id_ristorante")->num_rows>0) {
        $_SESSION["esitoRecensione"] = "Impossibile fare altre recensioni per questo ristorante";
    } else {
        $_SESSION["esitoRecensione"] = "Recensione avvenuta con successo!";
        $conn->query("INSERT INTO recensione (voto, id_utente, id_ristorante) VALUES ($voto, $id_utente, $id_ristorante')");
    }
    header("Location: homepage.php");
    exit;
?>