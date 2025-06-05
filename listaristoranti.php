<?php
    session_start();
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
        <div class="container mt-3 divBackground p-3">
            <div class="row">
                <form action="inforistorante.php" method="get"></form>
                <?php
                    if ($result = $conn->query("SELECT id_ristorante, nome, indirizzo, citta FROM ristorante")) {
                        if ($result->num_rows>0) {
                            while ($row = $result->fetch_assoc()) {
                                    echo "<div class='col-12 col-sm-6 col-lg-3 my-4'> <div class='card width:53%'> <div class='card-body p-3'> <img src='./images/forchetta.png' class='card-img-top'>";
                                    echo "<h5 class='card-title py-2'>" . $row["nome"] . "</h5>";
                                    echo "<p class='card-text'><i><b>Indirizzo: </b>" . $row["indirizzo"] . " <br><b>Località: </b>" . $row["citta"] .  "</i></p>";
                                    echo "<button type='submit' name='ristorante' value='". $row['id_ristorante'] ."' class='btn btn-outline-secondary btn-sm' title='Info'><i class='bi bi-info-circle'></i></button></div></div></div>";
                                }
                        } else {
                            echo "<h2 class='text-danger'>Nessun ristorante presente!</h2>";
                        }
                    }
                ?>
                </form>
            </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>