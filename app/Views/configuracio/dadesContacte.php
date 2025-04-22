<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($dades_contacte) && !empty($dades_contacte)): ?>
        <h1>Dades de contacte</h1>
        <ul>
            <?php foreach ($dades_contacte as $dada): ?>
                <li><?php echo $dada['nom'] ?></li>
                <li><?php echo $dada['valor'] ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <h1>No hi ha dades de contacte disponibles.</h1>
    <?php endif; ?>
</body>
</html>