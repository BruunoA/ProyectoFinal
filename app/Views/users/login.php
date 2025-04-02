<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Log in</title>
</head>
<body>
<?= $this->include('general/menu'); ?>

<div class="w3-container" style="margin-top: 2rem;">
    <div class="w3-container w3-teal" style="margin-bottom: 2rem">
        <h1>Log in</h1>
    </div>

    <form action="<?= base_url('login') ?>" method="post">
        <?= csrf_field() ?>
        <div class="w3-row-padding">
            <div class="w3-col l6 m6 s12">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom" required>
            </div>
            <div class="w3-col l6 m6 s12">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
        </div>
        <button type="submit" class="w3-button w3-blue">Log in</button>
    </form>

<?= $this->include('general/footer'); ?>
</body>
</html>