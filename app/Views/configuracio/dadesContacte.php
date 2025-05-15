<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('gestioGeneral.titolDades') ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <?= $this->include('general/menuGestio'); ?>
    <div class="w3-margin">
        <h2 class="w3-center"><?= lang('gestioGeneral.subtitolDades') ?></h2>
        <?php echo $output; ?>
    </div>
</body>

</html>