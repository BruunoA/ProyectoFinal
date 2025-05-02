<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>
<body>
    <form action="<?= base_url('configuracio/dades_contacte/modify/' . $dades_contacte['id']) ?>" method="POST">
        <div class="w3-container w3-padding">
            <h1 class="w3-center w3-text-blue">Modificar Dades de Contacte</h1>
            <div class="w3-card w3-white w3-round w3-padding w3-margin">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" value="<?= esc($dades_contacte['nom']) ?>" required>
                <br><br>
                <label for="valor">Valor:</label>
                <input type="text" id="valor" name="valor" value="<?= esc($dades_contacte['valor']) ?>" required>
                <br><br>
                <button type="submit" class="w3-button w3-blue w3-round">Modificar</button>
            </div>
        </div>
    </form>
</body>
</html>