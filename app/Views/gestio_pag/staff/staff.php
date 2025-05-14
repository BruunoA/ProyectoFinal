<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title><?= lang('staff.titol') ?></title>
</head>

<body>
    <?= $this->include('general/menuGestio'); ?>
    <div class="">
        <a href="<?= base_url('gestio/staff/add') ?>" class="w3-button w3-blue w3-margin"><?= lang("staff.crear") ?></a>
    </div>
    <?= session()->getFlashdata('success') ?>
    <h1 class="w3-center"><?= lang("staff.subtitol") ?></h1>
    <div class="w3-container w3-padding">
        <table class="w3-table-all w3-hoverable w3-card">
            <thead>
                <tr class="w3-black">
                    <th><?= lang('staff.nom') ?></th>
                    <th><?= lang('staff.carrec') ?></th>
                    <th><?= lang('staff.imatge') ?></th>
                    <th><?= lang('staff.accions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($staff as $persona): ?>
                    <tr>
                        <td><?= $persona['nom'] ?></td>
                        <td><?= $persona['nom_carrec'] ?></td>
                        <td>
                            <img src="<?= $persona['img'] ?>" alt="<?= $persona['nom'] ?>" style="width:80px; height:auto;" class="w3-image w3-round">
                        </td>
                        <td>
                            <a href="<?= base_url('gestio/staff/modify/' . $persona['id']) ?>" class="w3-button w3-blue w3-round w3-small" title="Editar">
                                <i class="fa fa-edit"> <?= lang('staff.editar') ?></i>
                            </a>
                            <a href="<?= base_url('gestio/staff/delete/' . $persona['id']) ?>" class="w3-button w3-red w3-round w3-small" title="Eliminar" onclick="return confirm('¿Seguro que quieres eliminar este registro?');">
                                <i class="fa fa-trash"> <?= lang('staff.eliminar') ?></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginador w3-center w3-margin-top w3-black">
            <p><?= $pager->links('default', 'daw_template'); ?></p>
        </div>
    </div>
</body>

</html>