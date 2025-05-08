<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/noticies.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title><?= lang('noticies.Titol') ?></title>
</head>

<body>
    <?= $this->include('general/menu'); ?>

    <div class="w3-container" style="margin-top: 2rem;">
        <div class="w3-container w3-teal" style="margin-bottom: 2rem">
            <h1><?= lang('noticies.Titol') ?></h1>
        </div>

        <button onclick="document.getElementById('eventModal').style.display='block'" class="w3-button w3-teal"><?= lang('noticies.VeureEvents') ?></button><br><br>

        <div id="eventModal" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <span onclick="document.getElementById('eventModal').style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
                <div class="w3-container">
                    <h2><?= lang('noticies.Events') ?></h2>
                    <div class="w3-responsive">
                        <table class="w3-table-all w3-hoverable w3-small">
                            <thead>
                                <tr class="w3-teal">
                                    <th><?= lang('noticies.nomEvent') ?></th>
                                    <th><?= lang('noticies.descripcioEvent') ?></th>
                                    <th><?= lang('noticies.dataEvent') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($events as $event): ?>
                                    <tr>
                                        <td><?= esc($event['nom']); ?></td>
                                        <td><?= esc($event['descripcio']); ?></td>
                                        <td><?= esc($event['data']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="w3-row-padding">
            <?php foreach ($gestio as $noticia): ?>
                <div class="w3-col s12 l3 m3 w3-container w3-margin-top">
                    <div class="w3-card w3-hover-shadow w3-round-large" style="display: flex; flex-direction: column; height: 100%; min-height: 300px;">
                        <a href="<?= base_url('noticia/' . $noticia['url']); ?>">
                            <img src="<?= esc($noticia['portada']); ?>" alt="<?= esc($noticia['nom']); ?>" style="width:100%; height: 250px; object-fit:cover;" class="w3-round-top">
                        </a>
                        <div class="w3-container" style="flex-grow: 1; display: flex; flex-direction: column;">
                            <!-- <h5><strong><?= esc($noticia['nom']) ?></strong></h5> -->
                            <h5><strong><?= esc(strlen($noticia['nom']) > 30 ? substr($noticia['nom'], 0, 30) . '...' : $noticia['nom']) ?></strong></h5>
                            <p style="flex-grow: 1"><?= esc($noticia['resum']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="paginador w3-center w3-red" style="color:black">
            <p><?= $pager->links('default', 'daw_template'); ?></p> <?php ?>
        </div>
    </div>
    <?= $this->include('general/footer'); ?>
</body>

</html>