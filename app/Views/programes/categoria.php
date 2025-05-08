<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/classificacio.css'); ?>">
    <title><?= lang('programes.categoria') . esc($titol) ?></title>
</head>

<body class="w3-light-grey">

    <?= $this->include('general/menu'); ?>

    <section id="Programes" class="w3-container w3-margin-bottom w3-padding-large w3-white w3-card-4 w3-round-large">
        <h3 class="w3-center w3-text-dark-grey">
            <strong><?= lang('programes.categoria') ?></strong> <?= esc($titol) ?>
        </h3>

        <div class="w3-row-padding w3-padding-16">
            <div class="w3-col l4 m6 s12">
                <!-- <img src="<?= base_url('assets/img/equipo.jpg'); ?>" class="w3-image w3-card-4 w3-round-large" alt="Imatge de l'equip"> -->
                <img src="<?= $categoria['img'] ?>" class="w3-image w3-card-4 w3-round-large" alt="Imatge de l'equip">
            </div>

            <div class="w3-col l8 m6 s12">
                <div class="w3-padding w3-light-grey w3-round-large w3-card-2">
                    <p class="w3-justify"><?= $categoria['descripcio'] ?></p>

                    <div class="w3-padding-16">
                        <!-- <p><strong>Dies:</strong> Dilluns, dimarts, dimecres</p>
                        <p><strong>Horari:</strong> 9:00 - 15:00</p> -->
                    <p>
                        <?= $categoria['horari'] ?>
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="w3-container w3-margin-bottom w3-padding">
        <?php if (empty($classificacio)) : ?>
            <p class="w3-center w3-text-red"><?= lang('programes.noResultats') ?><a href="https://www.fcf.cat/club/2425/alpicat-club-de-futbol-ue/pb7"><?= lang('programes.enllaç') ?></a></p>
        <?php else : ?>
            <div class="w3-responsive">
                <table class="w3-table w3-striped w3-bordered w3-hoverable w3-white w3-card-4">
                    <thead class="w3-light-grey">
                        <tr>
                            <th><?= lang('programes.posicio') ?></th>
                            <th><?= lang('programes.equip') ?></th>
                            <th><?= lang('programes.punts') ?></th>
                            <th><?= lang('programes.pj') ?></th>
                            <th><?= lang('programes.pg') ?></th>
                            <th><?= lang('programes.pe') ?></th>
                            <th><?= lang('programes.pp') ?></th>
                            <th><?= lang('programes.gf') ?></th>
                            <th><?= lang('programes.gc') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($classificacio as $equip): ?>
                            <tr>
                                <td><?= esc($equip['posicio']) ?></td>
                                <td><?= esc($equip['nom']) ?></td>
                                <td><?= esc($equip['punts']) ?></td>
                                <td><?= esc($equip['pj']) ?></td>
                                <td><?= esc($equip['pg']) ?></td>
                                <td><?= esc($equip['pe']) ?></td>
                                <td><?= esc($equip['pp']) ?></td>
                                <td><?= esc($equip['gf']) ?></td>
                                <td><?= esc($equip['gc']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </section>

    <?= $this->include('general/footer'); ?>
</body>
</html>
