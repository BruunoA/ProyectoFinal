<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('gestioMenu.titolGestio') ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
</head>
<body >
<?= $this->include('general/menuGestio'); ?>
    <a class="w3-button w3-blue w3-margin-top" href="<?= base_url('config/menu/add') ?>"><?= lang('gestioMenu.afegirGeneral') ?></a><br><br>
    <h2 class="w3-center"><?= lang('gestioMenu.subtitolGestio') ?></h2>
    <?php if (!empty($menu)): ?>
        <table class="w3-table w3-bordered w3-striped w3-hoverable">
            <thead>
                <tr>
                    <th><?= lang('gestioMenu.nom') ?></th>
                    <th><?= lang('gestioMenu.valor') ?></th>
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
                        <td><?= esc($item['valor']) ?></td>
                        <td><?= esc($item['id_pare']) ?></td>
                        <td><?= esc($item['visibilitat']) ?></td>
                        <td><?= esc($item['ordre']) ?></td>
                        <td>
                            <a href="<?= base_url('config/menu/modify/' . $item['id']) ?>" class="w3-button w3-blue w3-small"><?= lang('gestioMenu.modificar') ?></a>
                            <a href="<?= base_url('config/menu/delete/' . $item['id']) ?>" class="w3-button w3-red w3-small" onclick="return confirm('Estàs segur que vols eliminar aquest element?');"><?= lang('gestioMenu.eliminar') ?></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p><?= lang('gestioMenu.noElements') ?></p>
    <?php endif; ?>

</body>

</html>