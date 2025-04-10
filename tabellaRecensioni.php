<table class="table mx-auto w-50">
    <?php
        if ($result = $conn->query("SELECT rs.nome, rs.indirizzo, r.voto, r.data FROM recensione r 
                                        JOIN utente u ON r.id_utente = u.id_utente
                                            JOIN ristorante rs ON rs.id_ristorante = r.id_ristorante WHERE username = '".$_SESSION["username"]."'")) {
            if ($result->num_rows > 0) {
                foreach ($result->fetch_fields() as $column) {
                    echo "<th>".$column->name."</th>";
                }
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["nome"]."</td>";
                    echo "<td>".$row["indirizzo"]."</td>";
                    echo "<td>".$row["voto"]."</td>";
                    echo "<td>".$row["data"]."</td>";
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