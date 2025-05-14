<?php
    session_start();
    include("./connection/connessione.php");
    $nome = $_POST["nome"];
    $indirizzo = $_POST["indirizzo"];
    $citta = $_POST["citta"];
    if ($conn->query("INSERT INTO ristorante (nome, indirizzo, citta) VALUES ('$nome','$indirizzo', '$citta')")) {
        $_SESSION["esitoRistorante"] = "Ristorante inserito con successo!";
    } else {
        $_SESSION["esitoRistorante"] = "Impossibile inserire il ristorante";
    }
    header("Location: pannelloadmin.php");
    exit;
?>