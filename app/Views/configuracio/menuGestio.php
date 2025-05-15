<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('gestioMenu.titolGestio') ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/partPrivada.css'); ?>">
</head>

<body>
    <?= $this->include('general/menuGestio'); ?>
    <h2 class="w3-center"><?= lang('gestioMenu.subtitolGestio') ?></h2>

    <?php echo $output; ?>

</body>

</html>