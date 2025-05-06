<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Banner</title>
</head>
<body>
<?= $this->include('general/menuGestio'); ?>
<?= session()->getFlashdata('success') ?>
    <div class="w3-container">
    <a href="<?= base_url('gestio/banner/add') ?>" class="w3-button w3-black w3-margin"><?= lang('albumsGestio.pujar') ?></a>
        <table class="w3-table w3-bordered w3-striped">
            <h1 class="w3-center">Gestió de Banners</h1>
            <thead>
                <tr class="w3-light-grey">
                    <th>Títol</th>
                    <th>Descripció</th>
                    <th>Imatge</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($banner as $item): ?>
                    <tr>
                        <td><?= $item['titol']; ?></td>
                        <td><?= $item['descripcio']; ?></td>
                        <td><img src="<?= $item['ruta']; ?>" alt="Banner Image" style="width:100px;height:auto;"></td>
                        <td>
                            <a href="<?= base_url('gestio/banner/modify/' . $item['id']); ?>" class="w3-button w3-blue">Editar</a>
                            <a href="<?= base_url('gestio/banner/delete/' . $item['id']); ?>" class="w3-button w3-red" onclick="return confirm('Estas seguro de que deseas eliminar aquest banner?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>