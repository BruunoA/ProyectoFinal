<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Foto - <?= esc($foto['titol']) ?></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .error-message {
            color: #f44336;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .w3-card-custom {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .w3-input:focus {
            border-color: #2196F3 !important;
            box-shadow: 0 0 5px #2196F3;
        }

        .w3-button-custom {
            transition: background-color 0.3s ease;
        }

        .w3-button-custom:hover {
            background-color: #0056b3 !important;
        }
    </style>
</head>

<body class="w3-light-grey">

    <div class="w3-margin-top form-container">
        <header class="w3-blue w3-padding w3-card-custom">
            <h1 class="w3-center"><i class="fa fa-image"></i> Editar Foto</h1>
        </header>

        <?php if (isset($success)): ?>
            <div class="w3-panel w3-green w3-display-container w3-card-custom">
                <span onclick="this.parentElement.style.display='none'"
                    class="w3-button w3-large w3-display-topright">&times;</span>
                <?= $success ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="w3-panel w3-red w3-display-container w3-card-custom">
                <span onclick="this.parentElement.style.display='none'"
                    class="w3-button w3-large w3-display-topright">&times;</span>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="w3-card-4 w3-margin-top w3-white w3-card-custom">
            <div class="w3-row">
                <div class="w3-half w3-padding">
                    <img class="w3-image w3-border w3-round"
                        src="<?= base_url($foto['ruta']) ?>"
                        alt="<?= esc($foto['titol']) ?>">
                    <div class="w3-margin-top">
                        <p class="w3-small w3-text-grey">
                            <strong>Data de pujada:</strong> <?= date('d/m/Y H:i', strtotime($foto['created_at'])) ?>
                        </p>
                    </div>
                </div>

                <div class="w3-half w3-padding">
                    <form action="<?= base_url('gestio/galeria/edit_foto/' . $foto['id']) ?>" method="post">
                        <div class="w3-margin-bottom">
                            <label class="w3-text-blue"><strong>Títol</strong></label>
                            <input class="w3-input w3-border w3-round <?= isset($errors['titol']) ? 'w3-border-red' : '' ?>"
                                type="text" name="titol"
                                value="<?= old('titol', esc($foto['titol'])) ?>" required>
                            <?php if (isset($errors['titol'])): ?>
                                <span class="error-message"><?= esc($errors['titol']) ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="w3-margin-bottom">
                            <label class="w3-text-blue"><strong>Descripció</strong></label>
                            <textarea class="w3-input w3-border w3-round <?= isset($errors['descripcio']) ? 'w3-border-red' : '' ?>"
                                name="descripcio" rows="4"><?= old('descripcio', esc($foto['descripcio'])) ?></textarea>
                            <?php if (isset($errors['descripcio'])): ?>
                                <span class="error-message"><?= esc($errors['descripcio']) ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="w3-margin-top w3-bar">
                            <button type="submit" class="w3-button w3-blue w3-round w3-button-custom w3-bar-item">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                            <span class="w3-bar-item" style="width: 10px;"></span>
                            <button type="button" class="w3-button w3-grey w3-round w3-button-custom w3-bar-item"
                                onclick="window.location.href='<?= base_url('gestio/galeria_fotos/' . $foto['id_album']) ?>'">
                                <i class="fa fa-arrow-left"></i> Tornar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- </html> -->