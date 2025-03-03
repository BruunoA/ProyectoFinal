<?= $this->extend('layouts/main') ?>

<?= $this->section('menu') ?>

<div class="w3-container" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 1rem;">
    <?php foreach ($resultats as $resultat): ?>
        <div class="w3-card-4" style="width: 30%;">
            <div class="w3-container w3-black w3-center w3-padding-32" style="border-radius: 8px;">
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
            <td><?= esc($equip['partits_jugats']) ?></td>
            <td><?= esc($equip['partits_guanyats']) ?></td>
            <td><?= esc($equip['partits_empatats']) ?></td>
            <td><?= esc($equip['partits_perduts']) ?></td>
            <td><?= esc($equip['gols_favor']) ?></td>
            <td><?= esc($equip['gols_en_contra']) ?></td>
            <td><?= esc($equip['diferencia_gols']) ?></td>
        </tr>
<?php endforeach; ?>
    </table>
</div>

<?= $this->endSection() ?>
