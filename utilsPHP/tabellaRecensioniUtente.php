<?php
    if (isset($_SESSION["erroreEliminazione"])) {
        echo "<p style='color:red'>". $_SESSION["erroreEliminazione"] ."</p>";
    }
?>
<table class="table mx-auto w-75">
    <?php
        if ($result = $conn->query("SELECT r.id_recensione, rs.nome, rs.indirizzo, r.voto, r.data FROM recensione r JOIN utente u ON r.id_utente = u.id_utente JOIN ristorante rs ON rs.id_ristorante = r.id_ristorante WHERE username = '".$_SESSION["username"]."'")) {
            if ($result->num_rows > 0) {
                foreach ($result->fetch_fields() as $column) {
                    if ($column->name != "id_recensione") {
                        echo "<th>".ucfirst($column->name)."</th>";
                    }
                }
                echo "<th></th>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["nome"]."</td>";
                    echo "<td>".$row["indirizzo"]."</td>";
                    echo "<td>".$row["voto"]."</td>";
                    echo "<td>".$row["data"]."</td>";
                    echo "<td>
                        <form method='post' action='./script_eliminaRecensione.php'>
                            <button type='submit' name='id' value='".$row["id_recensione"]."' class='btn btn-danger'>Elimina</button>
                        </form>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<p style='color:red'>Nessuna recensione effettuata!</p>";
            }
        } else {
            echo "<h1 style='color:red'>Errore nella query</h1>";
        }
    ?>
</table>