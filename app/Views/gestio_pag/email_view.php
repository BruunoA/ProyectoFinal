<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responder Mensaje</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container">
    <h1 class="w3-center w3-text-blue">Responder Mensaje</h1>

    <!-- Mostrar el mensaje original -->
    <div class="w3-card w3-padding w3-margin w3-light-grey">
        <h3 class="w3-text-gray">Mensaje Original:</h3>
        <p id="mensaje_original" class="w3-text-black">
            <?= isset($mensaje_original) ? htmlspecialchars($mensaje_original) : 'No hay mensaje disponible.'; ?>
        </p>
    </div>

    <!-- Formulario para responder -->
    <form action="<?= base_url('gestio/mail/send/' . $id) ?>" method="post" class="w3-card w3-padding w3-margin w3-light-grey">
        <!-- Campos del formulario -->
        <label for="email" class="w3-text-blue">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email_remitent) ?>" class="w3-input w3-border w3-margin-bottom" required>

        <label for="mensaje" class="w3-text-blue">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" class="w3-input w3-border w3-margin-bottom" rows="5" required></textarea>

        <button type="submit" class="w3-button w3-blue w3-margin-top">Enviar</button>
    </form>
</body>
</html>