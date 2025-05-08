<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Gestio inici</title>
</head>
<body>
<?= $this->include('general/menuGestio'); ?>
<?= session()->getFlashdata('success') ?>
    <div class="w3-container w3-margin">
    <a href="<?= base_url('wysiwyg') ?>" class="w3-button w3-black w3-margin"><?= lang('albumsGestio.pujar') ?></a>
        <table class="w3-table w3-bordered w3-striped">
            <h1 class="w3-center">Gestió inici</h1>
            <thead>
                <tr class="w3-light-grey">
                    <th>Nom</th>
                    <th>Descripció</th>
                    <th>Imatge</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($banner)): ?>
                    <?php foreach ($banner as $item): ?>
                        <tr>
                            <td><?= $item['nom']; ?></td>
                            <td><?= $item['resum']; ?></td>
                            <td><img src="<?= $item['contingut']; ?>" alt="Banner Image" style="width:100px;height:auto;"></td>
                            <td>
                                <a href="<?= base_url('gestio/modify/' . $item['id']); ?>" class="w3-button w3-blue">Editar</a>
                                <a href="<?= base_url('gestio/delete/' . $item['id']); ?>" class="w3-button w3-red" onclick="return confirm('Estas seguro de que deseas eliminar aquest banner?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="w3-center">
                            <p class="w3-text-red">No hi ha banners disponibles</p>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if (!empty($logo)): ?>
                    <?php foreach ($logo as $item): ?>
                        <tr>
                            <td><?= $item['nom']; ?></td>
                            <!-- <td><?= $item['resum']; ?></td> -->
                            <td><img src="<?= $item['contingut']; ?>" alt="Banner Image" style="width:100px;height:auto;"></td>
                            <td>
                                <a href="<?= base_url('gestio/modify/' . $item['id']); ?>" class="w3-button w3-blue">Editar</a>
                                <a href="<?= base_url('gestio/delete/' . $item['id']); ?>" class="w3-button w3-red" onclick="return confirm('Estas seguro de que deseas eliminar aquest banner?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="w3-center">
                            <p class="w3-text-red">No hi ha logos disponibles</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>