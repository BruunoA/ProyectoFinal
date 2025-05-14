<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title><?= lang('albumsGestio.titol') ?></title>
</head>
<body>
<?= $this->include('general/menuGestio'); ?>
<div class="">
    <a href="<?= base_url('gestio/banner/add') ?>" class="w3-button w3-blue w3-margin"><?= lang('albumsGestio.pujar') ?></a>
</div>
<?= session()->getFlashdata('success') ?>
<h1 class="w3-center w3-padding-16"><?= lang('albumsGestio.subtitol') ?? 'Gestió inici' ?></h1>
<div class="w3-container w3-padding">
    <table class="w3-table-all w3-hoverable w3-card">
        <thead>
            <tr class="w3-black">
                <th><?= lang('albumsGestio.titol')?></th>
                <th><?= lang('albumsGestio.imatge')?></th>
                <th><?= lang('albumsGestio.accions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($banner)): ?>
                <?php foreach ($banner as $item): ?>
                    <tr>
                        <td><?= $item['titol']; ?></td>
                        <td>
                            <img src="<?= $item['img']; ?>" alt="Banner Image" style="width:80px;height:auto;" class="w3-image w3-round">
                        </td>
                        <td>
                            <a href="<?= base_url('gestio/banner/modify/' . $item['id']); ?>" class="w3-button w3-blue w3-round w3-small" title="Editar">
                                <i class="fa fa-edit"></i> <?= lang('albumsGestio.editar') ?? 'Editar' ?>
                            </a>
                            <a href="<?= base_url('gestio/banner/delete/' . $item['id']); ?>" class="w3-button w3-red w3-round w3-small" title="Eliminar" onclick="return confirm('Estas seguro de que deseas eliminar aquest banner?');">
                                <i class="fa fa-trash"></i> <?= lang('albumsGestio.eliminar') ?? 'Eliminar' ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="w3-center">
                        <p class="w3-text-red">No hi ha banners disponibles</p>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if (!empty($logo)): ?>
                <?php foreach ($logo as $item): ?>
                    <tr>
                        <td><?= $item['titol']; ?></td>
                        <td>
                            <img src="<?= $item['img']; ?>" alt="Logo Image" style="width:80px;height:auto;" class="w3-image w3-round">
                        </td>
                        <td>
                            <a href="<?= base_url('gestio/banner/modify/' . $item['id']); ?>" class="w3-button w3-blue w3-round w3-small" title="Editar">
                                <i class="fa fa-edit"></i> <?= lang('albumsGestio.editar') ?? 'Editar' ?>
                            </a>
                            <a href="<?= base_url('gestio/banner/delete/' . $item['id']); ?>" class="w3-button w3-red w3-round w3-small" title="Eliminar" onclick="return confirm('Estas seguro de que deseas eliminar aquest banner?');">
                                <i class="fa fa-trash"></i> <?= lang('albumsGestio.eliminar') ?? 'Eliminar' ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="w3-center">
                        <p class="w3-text-red">No hi ha logos disponibles</p>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="paginador w3-center w3-margin-top w3-black">
        <p><?= $pager->links('default', 'daw_template'); ?></p>
    </div>
</div>
</body>
</html>