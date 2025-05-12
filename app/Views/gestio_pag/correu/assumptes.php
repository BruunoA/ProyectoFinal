<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title><?= lang('contacte.titolAssumptes') ?></title>
</head>

<body>
    <?= $this->include('general/menuGestio'); ?>
    <div class="w3-margin">
        <h2 class="w3-center"><?= lang('contacte.subtitolAssumptes') ?></h2>
        <?= $output ?>
    </div>
</body>

</html>