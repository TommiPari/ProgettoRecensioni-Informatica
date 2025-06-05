<?php
$query = "
    SELECT r.nome, r.indirizzo, r.citta, COUNT(rc.id_recensione) as recensioni 
    FROM ristorante r 
    LEFT JOIN recensione rc ON r.id_ristorante = rc.id_ristorante 
    GROUP BY r.nome, r.indirizzo, r.citta
";

if ($result = $conn->query($query)) {
    if ($result->num_rows > 0): ?>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-hover table-bordered text-center align-middle w-100">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Indirizzo</th>
                        <th>Città</th>
                        <th>Recensioni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["nome"]) ?></td>
                            <td><?= htmlspecialchars($row["indirizzo"]) ?></td>
                            <td><?= htmlspecialchars($row["citta"]) ?></td>
                            <td>
                                <span class="badge bg-primary"><?= $row["recensioni"] ?></span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center mt-3" role="alert">
            Nessun ristorante presente!
        </div>
    <?php endif;
} else {
    echo "<div class='alert alert-danger text-center'>Errore nella query.</div>";
}
?>