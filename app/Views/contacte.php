<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

    <title><?=lang('contacte.Titol')?></title>
</head>

<body>
<?= $this->include('general/menu'); ?>

    <div class="w3-row content">
        <div class="w3-half w3-padding">
            <h2 class="w3-center"><?=lang('contacte.Titol')?></h2>
            <form class="w3-container w3-card w3-padding w3-white" action="<?= base_url('contacte/send') ?>" method="post">
                <div class="w3-section">
                    <label><?=lang('contacte.Camp_nom')?></label>
                    <input class="w3-input w3-border" name="nom" type="text" required>
                </div>
                <div class="w3-section">
                    <label><?=lang('contacte.Camp_correu')?></label>
                    <input class="w3-input w3-border" name="from_email"  type="email" required>
                </div>
                <div class="w3-section">
                    <label><?=lang('contacte.Camp_assumpte')?></label>
                    <input class="w3-input w3-border" name="assumpte"  type="text" required>
                </div>
                <div class="w3-section">
                    <label><?=lang('contacte.Camp_motiu')?></label>
                    <textarea class="w3-input w3-border" name="text" rows="4"  required placeholder="<?=lang('contacte.Placeholder')?>"></textarea>
                </div>
                <button type="submit" class="w3-btn w3-blue"><?=lang('contacte.Boto_enviar')?></button>
            </form>
        </div>

        <div class="w3-half w3-padding">
            <h2 class="w3-center"><?=lang('contacte.TitolContacte')?></h2>
            <div class="w3-card w3-white w3-padding w3-margin-bottom">
                <p><strong><?=lang('contacte.CampUbicacio')?> </strong><?= $ubicacio['valor']?></p>
                <p><strong><?=lang('contacte.CampTelefon')?> </strong><?= $telefon['valor']?></p>
                <p><strong><?=lang('contacte.CampCorreu')?> </strong><?= $correu['valor']?></p>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d745.0913701723812!2d0.5514229867548115!3d41.66944958758179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a71eaf593a5081%3A0x85412f105933abd3!2sCamp%20Municipal%20de%20Alpicat%20-%20Club%20Atl%C3%A8tic%20d%E2%80%99Alpicat!5e0!3m2!1ses!2ses!4v1741114931620!5m2!1ses!2ses" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <?= $this->include('general/footer'); ?>

</body>

</html>
