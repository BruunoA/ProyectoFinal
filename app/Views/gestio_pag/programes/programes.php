<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Programes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .add-program-link {
            margin: 20px 0;
        }

        .w3-table-all img {
            border-radius: 5px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="w3-container">

    <?= $this->include('general/menuGestio'); ?>
    <h1>Gestió de Programes</h1>
    <?= session()->getFlashdata('success'); ?>
    <div class="w3-section">
        <a href="<?= base_url('gestio/programes/add') ?>" class="w3-button w3-blue w3-round w3-margin-bottom">Afegir programa</a>
        <a href="<?= base_url('gestio/crear/equip') ?>" class="w3-button w3-blue w3-round w3-margin-bottom">Crear equip</a>
    </div>

    <div class="">
        <table class="w3-table-all w3-hoverable w3-card-4">
            <thead>
                <tr class="w3-light-grey">
                    <th>Títol</th>
                    <th>Descripció</th>
                    <th>Imatge</th>
                    <th>Horari</th>
                    <th>Equip</th>
                    <th colspan="2">Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category['titol'] ?></td>
                        <td><?= $category['descripcio'] ?></td>
                        <td><img src="<?= $category['img'] ?>" alt="<?= $category['titol'] ?>" width="100"></td>
                        <td><?= $category['horari'] ?></td>
                        <td><?= $category['id_equip'] ?></td>
                        <td>
                            <a href="<?= base_url('gestio/modify/programa/' . $category['id']) ?>" class="w3-button w3-green w3-round">Modificar</a>
                        </td>
                        <td>
                            <a href="<?= base_url('gestio/eliminar/' . $category['id']) ?>" class="w3-button w3-red w3-round" onclick="return confirm('Estàs segur que vols eliminar aquest programa?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginador w3-center w3-red" style="color:black">
            <p><?= $pager->links('default', 'daw_template'); ?></p> <?php ?>
        </div>
    </div>
</body>

</html>