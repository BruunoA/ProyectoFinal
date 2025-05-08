<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Buzón de Contactos</title>
</head>
<body>
    <?= $this->include('general/menuGestio'); ?>
    <div class="w3-container">
        <h1 class="w3-center w3-text-blue">Buzón de Contactos</h1>
        <?php if (!empty($contactes)): ?>
            <div class="w3-responsive">
                <table class="w3-table w3-bordered w3-striped w3-hoverable">
                    <thead class="w3-blue">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Asunto</th>
                            <th>Motivo</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contactes as $contacte): ?>
                            <tr>
                                <td><?= $contacte['nom'] ?? '' ?></td>
                                <td><?= $contacte['from_email'] ?? '' ?></td>
                                <td><?= $contacte['assumpte'] ?? '' ?></td>
                                <td><?= $contacte['text'] ?? '' ?></td>
                                <td><?= $contacte['created_at'] ?? '' ?></td>
                                <td>
                                    <a href="<?= base_url('gestio/mail/send/' . $contacte['id']); ?>" class="w3-button w3-green">Responder</a>
                                    <a href="<?= base_url('gestio/mail/delete/' . $contacte['id']); ?>" class="w3-button w3-red" onclick="return confirm('¿Estás seguro de que deseas eliminar este contacto?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="w3-text-red">No hay contactos en la base de datos.</p>
        <?php endif; ?>
    </div>
</body>
</html>
