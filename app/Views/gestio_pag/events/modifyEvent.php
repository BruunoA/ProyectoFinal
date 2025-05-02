<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con W3.CSS</title>

    <!-- W3.CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- jQuery y elFinder -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/css/elfinder.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/js/elfinder.min.js"></script>

    <!-- CKEditor -->
    <script src="<?= base_url('ckeditor/ckeditor.js') ?>"></script>

    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 400px;
        }
    </style>
</head>

<body class="w3-container w3-padding">

    <?php if (session()->has('errors')): ?>
        <div class="w3-panel w3-red w3-padding">
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form class="w3-card w3-padding w3-margin-top" method="post" action="<?= base_url('gestio/events/modify/' . $events['id']) ?>">
        <?= csrf_field() ?>

        <label for="nom" class="w3-text-black"><b>Nom</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="nom" id="nom" value="<?= old('nom', $events['nom'] ?? '') ?>" required>
        <!-- TODO: MIRAR SI DEIXAR O NO RESUM PER ALS EVENTS -->
        <!-- <label for="resum" class="w3-text-black"><b>Resum</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="resum" id="resum" value="<?= old('resum', $events['resum'] ?? '') ?>" required> -->

        <label for="tipus_event" class="w3-text-black"><b>Tipus event</b></label>
        <select class="w3-select w3-border w3-margin-bottom" name="tipus_event" id="tipus_event" required>
            <option value="">Selecciona una opció</option>
            <option value="competicio" <?= (old('tipus_event', $events['tipus_event'] ?? '') === 'competicio') ? 'selected' : '' ?>>&nbsp;&nbsp;&nbsp;Competicio</option>
            <option value="entrenament" <?= (old('tipus_event', $events['tipus_event'] ?? '') === 'entrenament') ? 'selected' : '' ?>>&nbsp;&nbsp;&nbsp;Entrenament</option>
            <option value="activitat" <?= (old('tipus_event', $events['tipus_event'] ?? '') === 'activitat') ? 'selected' : '' ?>>&nbsp;&nbsp;&nbsp;Activitat</option>
        </select>

        <div id="event-container" class="w3-margin-bottom">
            <label for="data" class="w3-text-black"><b>Data Event</b></label>
            <input class="w3-input w3-border" type="date" id="data" name="data" value="<?= old('data', $events['data'] ?? '') ?>">
        </div>

        <button type="submit" class="w3-button w3-green w3-margin-top">Submit</button>
    </form>

</body>

</html>
