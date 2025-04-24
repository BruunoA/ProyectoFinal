<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Galería de Fotos</title>
</head>
<body>
    <?php if (!empty($album)): ?>
        <h1><?= htmlspecialchars($album['titol']) ?></h1>
        <?php if (!empty($fotos)): ?>
            <?php foreach ($fotos as $foto): ?>
                <div style="margin-bottom: 20px;">
                    <img src="<?= htmlspecialchars($foto['ruta']) ?>" alt="Photo" style="max-width:200px; margin:10px;"> 
                    <p><?= htmlspecialchars($foto['titol']) ?></p>
                    <p><?= htmlspecialchars($foto['descripcio']) ?></p>
                    <form action="/eliminar_foto" method="post" style="display:inline;">
                        <input type="hidden" name="foto_id" value="<?= htmlspecialchars($foto['id']) ?>">
                        <button type="submit" class="w3-button w3-red">Eliminar</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No se ha trobart cap foto en aquet album</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Album not found.</p>
    <?php endif; ?>
</body>
</html>
