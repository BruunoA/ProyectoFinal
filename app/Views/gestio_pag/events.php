<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestió d'Esdeveniments</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <?= $this->include('general/menuGestio'); ?>

    <div class="w3-container" style="margin-top: 2rem;">
        <h1 class="w3-center w3-text-teal"><?= lang('noticies.Events') ?></h1>

        <div class="w3-container w3-margin-top">
            <a href="<?= base_url('create/add/event') ?>" class="w3-button w3-teal w3-margin-bottom">Crear Esdeveniment</a>
            <a href="<?= base_url('gestio/events/tipus') ?>" class="w3-button w3-teal w3-margin-bottom">Afegir/eliminar tipus events</a>
        </div>

        <div class="w3-responsive">
            <table class="w3-table-all w3-hoverable w3-card-4" style="margin-top: 1rem;">
                <thead>
                    <tr class="w3-teal">
                        <th>Nom</th>
                        <th>Data</th>
                        <th>Tipus d'Esdeveniment</th>
                        <th>Estat</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td><?= esc($event['nom']); ?></td>
                            <td><?= esc($event['data']); ?></td>
                            <td><?= esc($event['tipus_event']); ?></td>
                            <td>
                                <?php if ($event['estat'] == 'active'): ?>
                                    <span class="w3-text-green"><b><?= ucfirst(esc($event['estat'])); ?></b></span>
                                <?php else: ?>
                                    <span class="w3-text-red"><b><?= ucfirst(esc($event['estat'])); ?></b></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('gestio/events/editar/' . $event['id']) ?>" class="w3-button w3-blue w3-small">Modificar</a>
                                <a href="<?= base_url('gestio/events/eliminar/' . $event['id']) ?>" class="w3-button w3-red w3-small" onclick="return confirm('Segur que vols eliminar aquest esdeveniment?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>