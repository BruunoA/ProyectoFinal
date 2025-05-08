<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('gestioMenu.titolGestio') ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
</head>

<body>
    <?= $this->include('general/menuGestio'); ?>
    <div class="w3-margin">
        <h2 class="w3-center"><?= lang('gestioMenu.subtitolGeneral') ?></h2>
        <?php echo $output; ?>
    </div>
</body>

</html>