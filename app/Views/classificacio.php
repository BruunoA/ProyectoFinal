<?= $this->extend('layouts/main') ?>

<?= $this->section('menu') ?>

<div class="w3-container" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 1rem;">
    <?php foreach ($resultados as $resultado): ?>
        <div class="w3-card-4" style="width: 30%;">
            <div class="w3-container w3-black w3-center w3-padding-32" style="border-radius: 8px;">
                <h1 class="w3-xlarge w3-margin-bottom">Resultat</h1>
                <div class="w3-row w3-margin-bottom">
                    <div class="w3-half w3-large"><?= esc($resultado['equipo_v']) ?></div>
                    <div class="w3-half w3-large"><?= esc($resultado['equipo_l']) ?></div>
                </div>
                <div class="w3-row w3-margin-bottom">
                    <div class="w3-col w3-center w3-xlarge">VS</div>
                </div>
                <div class="w3-row w3-margin-bottom">
                    <div class="w3-half w3-large"><?= esc($resultado['goles_v']) ?></div>
                    <div class="w3-half w3-large"><?= esc($resultado['goles_l']) ?></div>
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
        <?php foreach ($tabla as $equipo): ?>
        <tr>
            <td><?= esc($equipo['posicion']) ?></td>
            <td><?= esc($equipo['equipo']) ?></td>
            <td><?= esc($equipo['puntos']) ?></td>
            <td><?= esc($equipo['partidos_jugados']) ?></td>
            <td><?= esc($equipo['partidos_ganados']) ?></td>
            <td><?= esc($equipo['partidos_empatados']) ?></td>
            <td><?= esc($equipo['partidos_perdidos']) ?></td>
            <td><?= esc($equipo['goles_favor']) ?></td>
            <td><?= esc($equipo['goles_contra']) ?></td>
            <td><?= esc($equipo['diferencia_goles']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?= $this->endSection() ?>
