<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/classificacio.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title>Classificacio</title>
    <style>
        .equips-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        .equip-card {
            width: 30%;
            min-width: 280px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        @media screen and (max-width: 768px) {
            .equips-container {
                flex-direction: column;
                align-items: center;
            }

            .equip-card {
                width: 90%;
            }
        }

        img {
            width: 40px;
            height: 40px;
        }
    </style>
</head>

<body>

    <?= $this->include('general/menu'); ?>

    <div class="w3-container equips-container">
        <?php foreach ($taula as $equip): ?>
            <?php if ($equip['posicio'] == 1): ?>
                <?php $items = range(0, 3); foreach ($items as $i): ?>
                <div class="equip-card">
                    <div class="w3-container w3-green w3-center" style="border-radius: 8px; margin-top:1rem;">
                        <h1 class="w3-xlarge">Resultado</h1>
                        <div class="w3-row">
                            <div class="w3-half w3-large"><strong><?= esc($equip['nom']) ?></strong></div>
                            <div class="w3-half w3-large">
                                <strong>
                                    <?=
                                    $resultats = json_decode($equip['resultats'], true) ?? [];
                                    for ($i = 0; $i < 4; $i++) {
                                        echo isset($resultats[$i]) ? trim($resultats[$i]) . '<br>' : 'Sin resultado<br>';
                                    }
                                    // foreach ($resultats as $resultat) {
                                    //     echo trim($resultat) . '<br>'; 
                                    // prueba
                                    // }
                                    ?>
                                </strong>
                            </div>
                        </div>
                        <footer
                            class="w3-black w3-color-white w3-padding-small w3-border-top-black w3-border-light-gray w3-center w3-margin-bottom"
                            style="border-radius: 20px;">
                            12/12/2025
                        </footer>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <a href="<?= base_url('dades'); ?>" class="w3-button w3-black w3-margin">Actualitzar dades</a>
    <a href="<?= base_url('wysiwyg'); ?>" class="w3-button w3-black w3-margin">WYSIWYG</a>

    <div class="w3-container table-responsive">
        <table>
            <tr>
                <th>Posició</th>
                <th>Equip</th>
                <th>Punts</th>
                <th>PP</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>GF</th>
                <th>GC</th>
                <!-- <th>equips</th> -->
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
                    <!-- <td><?php // $equip['equips'] ?></td> -->
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <pre>

    </pre>

    <?= $this->include('general/footer'); ?>

</body>

</html>