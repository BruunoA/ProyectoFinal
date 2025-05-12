<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <title><?= lang('gestioGeneral.titolXarxes') ?></title>
</head>

<body>
    <?= $this->include('general/menuGestio'); ?>
    <div class="w3-margin w3-margin-top">
        <h2 class="w3-center"><?= lang('gestioGeneral.subtitolXarxes') ?></h2>
        <?php echo $output; ?>
    </div>
</body>

</html>