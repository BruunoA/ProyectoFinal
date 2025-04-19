<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <a class="w3-button w3-blue w3-margin-top" href="<?= base_url('gestio/menu/add') ?>">Afegir menú</a><br><br>
    <?php if (!empty($menu)): ?>
        <table class="w3-table w3-bordered w3-striped w3-hoverable">
            <thead>
                <tr>
                    <th><?= lang('gestioMenu.nom') ?></th>
                    <th><?= lang('gestioMenu.enllaç') ?></th>
                    <th><?= lang('gestioMenu.id_pare') ?></th>
                    <th><?= lang('gestioMenu.visibilitat') ?></th>
                    <th><?= lang('gestioMenu.ordre') ?></th>
                    <th><?= lang('gestioMenu.accio') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menu as $item): ?>
                    <tr>
                        <td><?= esc($item['nom']) ?></td>
                        <td><?= esc($item['enllaç']) ?></td>
                        <td><?= esc($item['id_pare']) ?></td>
                        <td><?= esc($item['visibilitat']) ?></td>
                        <td><?= esc($item['ordre']) ?></td>
                        <td>
                            <a href="<?= base_url('gestio/menu/modify/' . $item['id']) ?>" class="w3-button w3-blue w3-small"><?= lang('gestioMenu.modificar') ?></a>
                            <a href="<?= base_url('gestio/menu/delete/' . $item['id']) ?>" class="w3-button w3-red w3-small"><?= lang('gestioMenu.eliminar') ?></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hi ha elements al menú.</p>
    <?php endif; ?>

</body>

</html>