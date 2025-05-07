<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Buzón de Contactos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?= $this->include('general/menuGestio'); ?>
    <h1>Buzón de Contactos</h1>
    <?php if (!empty($contactes)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                    <!-- Añade más columnas según tu estructura de base de datos -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactes as $contacte): ?>
                    <tr>
                        <td><?= $contacte['id'] ?></td>
                        <td><?= $contacte['nombre'] ?? '' ?></td>
                        <td><?= $contacte['email'] ?? '' ?></td>
                        <td><?= $contacte['mensaje'] ?? '' ?></td>
                        <td><?= $contacte['created_at'] ?? '' ?></td>
                        <!-- Ajusta estos campos según tu estructura de base de datos -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay contactos en la base de datos.</p>
    <?php endif; ?>
</body>
</html>