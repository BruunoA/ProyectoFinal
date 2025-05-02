<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('programes.amateurSegona') ?></title>
</head>
<body>
<div class="w3-container table-responsive">
    <?php if (empty($classificacio)) {
    echo "<p>No hi ha resultats.</p>";
} else { ?>
        <table>
            <tr>
                <th>Posición</th>
                <th>Equipo</th>
                <th>Puntos</th>
                <th>PP</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>GF</th>
                <th>GC</th>
            </tr>
            <?php foreach ($classificacio as $equip): ?>
                <tr>
                    <td><?= esc($equip['posicio']) ?></td>
                    <td><?= esc($equip['nom']) ?></td>
                    <td><?= esc($equip['punts']) ?></td>
                    <td><?= esc($equip['pj']) ?></td>
                    <td><?= esc($equip['pg']) ?></td>
                    <td><?= esc($equip['pe']) ?></td>
                    <td><?= esc($equip['pp']) ?></td>
                    <td><?= esc($equip['gf']) ?></td>
                    <td><?= esc($equip['gc']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php } ?>
    </div>
</body>
</html>