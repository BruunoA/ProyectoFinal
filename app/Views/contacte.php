<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

    <title>Contacto</title>
</head>

<body>
<?= $this->include('general/menu'); ?>

    <div class="w3-row content">
        <div class="w3-half w3-padding">
            <h2 class="w3-center">Contáctanos</h2>
            <form class="w3-container w3-card w3-padding w3-white">
                <div class="w3-section">
                    <label>Nombre</label>
                    <input class="w3-input w3-border" type="text" required>
                </div>
                <div class="w3-section">
                    <label>Correo Electrónico</label>
                    <input class="w3-input w3-border" type="email" required>
                </div>
                <div class="w3-section">
                    <label>Asunto</label>
                    <input class="w3-input w3-border" type="text" required>
                </div>
                <div class="w3-section">
                    <label>Motivo</label>
                    <textarea class="w3-input w3-border" rows="4" required placeholder="Escriba su motivo aquí..."></textarea>
                </div>
                <button type="submit" class="w3-btn w3-blue">Enviar</button>
            </form>
        </div>

        <div class="w3-half w3-padding">
            <h2 class="w3-center">Nuestra Ubicación</h2>
            <div class="w3-card w3-white w3-padding w3-margin-bottom">
                <p><strong>Ubicación:</strong> Camí del Graó, 25110, 25110 Alpicat, Lleida</p>
                <p><strong>Teléfono:</strong> +34 123-456-7890</p>
                <p><strong>Correo Electrónico:</strong> contacto@ejemplo.com</p>
            </div>
            <div class="iframe-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d745.0913701723812!2d0.5514229867548115!3d41.66944958758179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a71eaf593a5081%3A0x85412f105933abd3!2sCamp%20Municipal%20de%20Alpicat%20-%20Club%20Atl%C3%A8tic%20d%E2%80%99Alpicat!5e0!3m2!1ses!2ses!4v1741114931620!5m2!1ses!2ses" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <?= $this->include('general/footer'); ?>

</body>

</html>
