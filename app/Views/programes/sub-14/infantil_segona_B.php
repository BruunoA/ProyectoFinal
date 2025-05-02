<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/classificacio.css'); ?>">

    <title><?= lang('programes.Titol') ?></title>
</head>
<style>
    @media (max-width: 768px) {
        .w3-cell-row {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 21rem;
        }
    }
</style>

<body>
    <?= $this->include('general/menu'); ?>
    <section id="Programes" class="w3-container w3-margin-bottom">
        <h3 id="Programes" class="w3-center w3-text-dark-gray"><strong>Categoria :</strong><?= lang('programes.infantilSegona_B') ?></h3>

        <div class="w3-row w3-center w3-padding-16">
            <div id="IMG" class="w3-col l4 m6 s12 w3-padding">
                <img src="<?= base_url('assets/img/equipo.jpg'); ?>" class="w3-image" style="width:100%; height: auto;">
            </div>

            <div class="w3-col l8 m6 s12 w3-padding w3-light-grey w3-round">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis tempora iure quia magni explicabo
                    iste distinctio nesciunt ad dicta illo expedita cupiditate perspiciatis, saepe doloribus quae nisi
                    est optio fugiat nulla ullam rem.</p>

                <div id="Horario" class="w3-padding-16  w3-round">
                    <p><strong>Días:</strong> Lunes, Miércoles, Viernes</p>
                    <p><strong>Horario:</strong> 9:00 am - 15:00 pm</p>
                </div>
            </div>
        </div>
    </section>

    <?php if (empty($classificacio)) {
    echo "<p>No hi ha resultats.</p>";
} else { ?>
        <table>
            <tr>
                <th>Posición</th>
                <th>Equipo</th>
                <th>Puntos</th>
                <th>PP</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>GF</th>
                <th>GC</th>
            </tr>
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
        </table>
        <?php } ?>

    <?= $this->include('general/footer'); ?>
</body>

</html>