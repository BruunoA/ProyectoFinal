<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respondre Missatge</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body class="w3-container">
    <div class="container">
        <h1 class="w3-center w3-text-blue">Respondre Missatge</h1>
        <a href="<?= base_url('gestio/mail') ?>" class="w3-button w3-light-grey w3-margin-bottom">
            <i class="fas fa-arrow-left"></i> Enrere
        </a>
        <div class="w3-card w3-padding w3-margin w3-light-grey">
            <h3 class="w3-text-gray">Missatge Original:</h3>
            <p><strong>De:</strong> <?= $contacte['nom'] ?> (<?= $contacte['from_email'] ?>)</p>
            <p><strong>Assumpte:</strong> <?= $contacte['id_assumpte'] ?></p>
            <p><strong>Data:</strong> <?= $contacte['created_at'] ?></p>
            <p><strong>Missatge:</strong></p>
            <div class="w3-panel w3-border w3-border-gray w3-padding">
                <?= esc($contacte['text']) ?>
            </div>
        </div>

        <form action="<?= base_url('gestio/mail/send/' . $id) ?>" method="post" class="w3-card w3-padding w3-margin">
            <div class="w3-section">
                <label class="w3-text-blue"><strong>Per a:</strong></label>
                <input type="text" class="w3-input w3-border"
                    value="<?= esc($contacte['nom'] . ' <' . $contacte['from_email'] . '>') ?>" readonly>
            </div>

            <div class="w3-section">
                <label class="w3-text-blue"><strong>Assumpte:</strong></label>
                <input type="text" class="w3-input w3-border" name="assumpte"
                    value="Re: <?= esc($contacte['id_assumpte']) ?>" readonly>
            </div>

            <div class="w3-section">
                <label class="w3-text-blue"><strong>La teva resposta:</strong></label>
                <textarea class="w3-input w3-border" name="mensaje" rows="8" required></textarea>
            </div>

            <button type="submit" class="w3-button w3-green">
                <i class="fas fa-paper-plane"></i> Enviar resposta
            </button>
            <a href="<?= base_url('gestio/mail') ?>" class="w3-button w3-red">
                <i class="fas fa-times"></i> Cancel·lar
            </a>
        </form>
    </div>
</body>

</html>