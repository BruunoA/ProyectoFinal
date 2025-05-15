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
        <div class="w3-container w3-blue" style="margin-bottom: 2rem">
            <h1 class="w3-center w3-text-white"><?= lang('noticies.Titol') ?></h1>
        </div>
        <form method='get' action="<?= base_url('noticies'); ?>" id="searchForm" class="w3-container w3-padding w3-card w3-margin-bottom">

            <div class="w3-row w3-margin-bottom">
                <input type='text' name='q' value='<?= $search ?>' class="w3-input" placeholder="<?= lang('noticies.Buscar') ?>">
            </div>

            <div class="w3-row w3-margin-bottom">
                <select name="club" id="club" class="w3-select w3-border">
                    <option value=""><?= lang('noticies.Clubs') ?></option>
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club['id'] ?>" <?= old('club', $noticia['id_club'] ?? '') == $club['id'] ? 'selected' : '' ?>>
                            <?= $club['nom'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="w3-row">
                <input type='button' id='btnsearch' value='Cercar' class="w3-button w3-green" onclick='document.getElementById("searchForm").submit();'>
            </div>
        </form>
        <button onclick="document.getElementById('eventModal').style.display='block'" class="w3-button w3-black"><?= lang('noticies.VeureEvents') ?></button><br><br>

        <div id="eventModal" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom">
                <span onclick="document.getElementById('eventModal').style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
                <div class="w3-container">
                    <h2><?= lang('noticies.Events') ?></h2>
                    <div class="w3-responsive">
                        <table class="w3-table-all w3-hoverable w3-small">
                            <thead>
                                <tr class="w3-blue">
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
        <div class="cards-container">
            <?php foreach ($gestio as $noticia): ?>
                <div class="news-card w3-round" style="border: 2px solid black; max-height: 420px;">
                    <a href="<?= base_url('noticia/' . $noticia['url']); ?>">
                        <img src="<?= esc($noticia['portada']); ?>" alt="<?= esc($noticia['nom']); ?>" class="w3-image">
                    </a>
                    <div class="card-content">
                        <h3><?= esc(strlen($noticia['nom']) > 50 ? substr($noticia['nom'], 0, 50) . '...' : $noticia['nom']) ?></h3>
                        <p class="content-preview">
                            <?= esc(strlen($noticia['resum']) > 50 ? substr($noticia['resum'], 0, 50) . '...' : $noticia['resum']) ?>
                        </p>
                        <p>
                            <?= date('d/m/Y', strtotime($noticia['created_at'])) ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="paginador w3-center w3-blue" style="color:black">
            <p><?= $pager->links('default', 'daw_template'); ?></p> <?php ?>
        </div>
    </div>
    <?= $this->include('general/footer'); ?>
</body>

</html>