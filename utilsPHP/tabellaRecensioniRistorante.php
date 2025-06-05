<?php
$query = "
    SELECT u.username, r.voto, r.data 
    FROM recensione r 
    JOIN utente u ON r.id_utente = u.id_utente 
    JOIN ristorante rs ON rs.id_ristorante = r.id_ristorante 
    WHERE rs.id_ristorante = '$id_ristorante'
";

if ($result = $conn->query($query)) {
    if ($result->num_rows > 0): ?>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-hover table-bordered text-center align-middle w-100">
                <thead class="table-dark">
                    <tr>
                        <th>Username</th>
                        <th>Voto</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["username"]) ?></td>
                            <td><span class="badge text-dark"><?= $row["voto"] ?>⭐</span></td>
                            <td><?= date("d/m/Y", strtotime($row["data"])) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center mt-3" role="alert">
            Nessuna recensione effettuata!
        </div>
    <?php endif;
} else {
    echo "<div class='alert alert-danger text-center'>Errore nella query.</div>";
}
?>