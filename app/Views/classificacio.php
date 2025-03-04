<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/classificacio.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title>Classificacio</title>
</head>
<body>
<?= $this->include('general/menu'); ?>
<div class="w3-container" style="display: flex; justify-content: center; gap: 1rem;">
    <?php foreach ($resultats as $resultat): ?>
        <div class="w3-card" style="width: 30%;">
            <div class="w3-container w3-black w3-center w3-padding-16" style="border-radius: 8px; margin-top:1rem">
                <h1 class="w3-xlarge w3-margin-bottom">Resultat</h1>
                <div class="w3-row w3-margin-bottom">
                    <div class="w3-half w3-large"><?= esc($resultat['equip_v']) ?></div>
                    <div class="w3-half w3-large"><?= esc($resultat['equip_l']) ?></div>
                </div>
                <div class="w3-row w3-margin-bottom">
                    <div class="w3-col w3-center w3-xlarge">VS</div>
                </div>
                <div class="w3-row w3-margin-bottom">
                    <div class="w3-half w3-large"><?= esc($resultat['gols_v']) ?></div>
                    <div class="w3-half w3-large"><?= esc($resultat['gols_l']) ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="w3-container">
    <table>
        <tr>
            <th>Posició</th>
            <th>Equip</th>
            <th>Punts</th>
            <th>Partits Jugats</th>
            <th>Partits Guanyats</th>
            <th>Partits Empatats</th>
            <th>Partits Perduts</th>
            <th>Gols a Favor</th>
            <th>Gols en Contra</th>
            <th>Diferència de Gols</th>
        </tr>
        <?php foreach ($taula as $equip): ?>
        <tr>
            <td><?= esc($equip['posicio']) ?></td>
            <td><?= esc($equip['equip']) ?></td>
            <td><?= esc($equip['punts']) ?></td>
            <td><?= esc($equip['pj']) ?></td>
            <td><?= esc($equip['pg']) ?></td>
            <td><?= esc($equip['pe']) ?></td>
            <td><?= esc($equip['pp']) ?></td>
            <td><?= esc($equip['gf']) ?></td>
            <td><?= esc($equip['gc']) ?></td>
            <td><?= esc($equip['dg']) ?></td>
        </tr>
<?php endforeach; ?>
    </table>
</div>
<?= $this->include('general/footer'); ?>
</body>
</html>