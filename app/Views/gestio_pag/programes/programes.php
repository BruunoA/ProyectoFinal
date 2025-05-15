<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

<body>

    <?= $this->include('general/menuGestio'); ?>
    <h1 class="w3-center">Gestió de Programes</h1>
    <?= session()->getFlashdata('success'); ?>
    <div class="w3-section w3-margin">
        <a href="<?= base_url('gestio/programes/add') ?>" class="w3-button w3-blue w3-round w3-margin-bottom">Afegir programa</a>
    </div>

    <div class="w3-responsive w3-card-4 w3-light-grey w3-margin">
        <table class="w3-table-all w3-hoverable w3-card-4">
            <thead>
                <tr class="w3-light-grey">
                    <th>Títol</th>
                    <!-- <th>Descripció</th> -->
                    <!-- <th>Imatge</th> -->
                    <!-- <th>Horari</th> -->
                    <th>Equip</th>
                    <th colspan="2">Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $categoria): ?>
                    <tr>
                        <td><?= $categoria['titol'] ?></td>
                        <!-- <td><?php // $categoria['descripcio'] ?></td> -->
                        <!-- <td><img src="<?= $categoria['img'] ?>" alt="<?= $categoria['titol'] ?>" width="100"></td> -->
                        <!-- <td><?php // $categoria['horari'] ?></td> -->
                        <td><?= $categoria['nom'] ?></td>
                        <td>
                            <a href="<?= base_url('gestio/modify/programa/' . $categoria['id']) ?>" class="w3-button w3-green w3-round"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('gestio/eliminar/' . $categoria['id']) ?>" class="w3-button w3-red w3-round" onclick="return confirm('Estàs segur que vols eliminar aquest programa?');"><i class="fa-solid fa-trash"></i></a>
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