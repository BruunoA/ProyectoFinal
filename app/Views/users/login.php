<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Iniciar Sesión</title>
    <style>
        .w3-input {
            margin-bottom: 15px;
        }

        .login-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-footer {
            margin-top: 20px;
        }
    </style>
</head>

<body class="w3-light-grey">
    <?= $this->include('general/menu'); ?>

    <div class="w3-container w3-padding-32">
        <div class="login-container w3-card-4 w3-white">
            <header class="w3-container w3-teal w3-center">
                <h2>Log in</h2>
            </header>

            <form action="<?= base_url('login') ?>" method="post" class="w3-container w3-padding-16">
                <?= csrf_field() ?>

                <div class="w3-section">
                    <label for="nom"><b>Usuari</b></label>
                    <input class="w3-input w3-border w3-round" type="text" name="nom" id="nom" required placeholder="Nom de usuari" value="<?= old('nom') ?>">
                </div>

                <div class="w3-section">
                    <label for="password"><b>Contrasenya</b></label>
                    <input class="w3-input w3-border w3-round" type="password" name="password" id="password" required placeholder="Contrasenya" value="<?= old('password') ?>">
                </div>

                <div class="w3-section form-footer">
                    <button type="submit" class="w3-button w3-blue w3-round w3-block">
                        <i class="fas fa-sign-in-alt"></i> Acceder
                    </button>
                </div>
            </form>
        </div>
        <div class="w3-container w3-center w3-padding-32">
            <p><?= session()->getFlashdata('errorLogin') ?></p>
        </div>
    </div>
    <?= $this->include('general/footer'); ?>
</body>

</html>