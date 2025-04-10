<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/classificacio.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title>Classificació</title>
</head>

<body>

    <?= $this->include('general/menu'); ?>

    <div class="w3-container w3-padding-32">
        <form action="<?= site_url('classificacio/filtrar') ?>" method="POST">
            <div class="w3-row w3-center">
                <div class="w3-col l2 m6 s12" style="margin-right: 32px;" >
                    <select name="categoria" id="categoria" class="w3-select w3-border w3-small">
                        <option value="">Selecciona una categoría</option>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?= esc($categoria['categoria']) ?>"><?= esc($categoria['categoria']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
        
                <div class="w3-col l2 m6 s12">
                    <select name="grupo" id="grupo" class="w3-select w3-border w3-small">
                        <option value="">Selecciona un grupo</option>
                        <?php foreach ($grupos as $grupo): ?>
                            <option value="<?= esc($grupo['grup']) ?>"><?= esc($grupo['grup']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        
            <div class=" w3-margin-top">
                <button type="submit" class="w3-button w3-red w3-small">Filtrar</button>
            </div>
        </form>
    </div>

    <div class="w3-container table-responsive">
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
            <?php foreach ($taula as $equip): ?>
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
    </div>

    <?= $this->include('general/footer'); ?>

</body>

</html>
