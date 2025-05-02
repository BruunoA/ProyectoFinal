<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dades de Contacte</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-light-grey">
<?= $this->include('general/menuGestio'); ?>
    <div class="w3-container w3-padding">
        <?php if (isset($dades_contacte) && !empty($dades_contacte)): ?>
            <h1 class="w3-center w3-text-blue">Dades de Contacte</h1>
            <div class="w3-card w3-white w3-round w3-padding w3-margin">
                <table class="w3-table w3-bordered w3-striped w3-centered">
                    <thead>
                        <tr class="w3-blue">
                            <th>Nom</th>
                            <th>Valor</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dades_contacte as $dada): ?>
                            <tr>
                                <td><?= esc($dada['nom']) ?></td>
                                <td><?= esc($dada['valor']) ?></td>
                                <td>
                                    <a href="/configuracio/dades_contacte/modify/<?= esc($dada['id']) ?>" class="w3-button w3-blue w3-round">Modificar</a>
                                    <a href="/configuracio/dades_contacte/delete/<?= esc($dada['id']) ?>" class="w3-button w3-red w3-round" onclick="return confirm('Estàs segur que vols eliminar aquesta dada?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="w3-panel w3-yellow w3-padding w3-round">
                <h1 class="w3-center">No hi ha dades de contacte disponibles.</h1>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>