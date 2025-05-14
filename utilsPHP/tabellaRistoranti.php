<table class="table mx-auto w-75">
    <?php
        if ($result = $conn->query("SELECT r.nome, r.indirizzo, r.citta, COUNT(*) as recensioni FROM ristorante r LEFT JOIN recensione rc ON r.id_ristorante = rc.id_ristorante GROUP BY r.nome")) {
            if ($result->num_rows > 0) {
                foreach ($result->fetch_fields() as $column) {
                    echo "<th>".ucfirst($column->name)."</th>";
                }
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["nome"]."</td>";
                    echo "<td>".$row["indirizzo"]."</td>";
                    echo "<td>".$row["citta"]."</td>";
                    echo "<td>".$row["recensioni"]."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<p style='color:red'>Nessun ristorante presente!</p>";
            }
        } else {
            echo "<h1 style='color:red'>Errore nella query</h1>";
        }
    ?>
</table>