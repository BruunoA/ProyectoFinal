<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestió d'Esdeveniments</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <?= $this->include('general/menuGestio'); ?>

    <div class="w3-container" style="margin-top: 2rem;">
        <h1 class="w3-center w3-text-teal"><?= lang('noticies.Events') ?></h1>

        <?php echo $output; ?>
    </div>

</body>

</html>