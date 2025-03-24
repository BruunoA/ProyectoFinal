<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <title>Document</title>
</head>
<style>
    .note-editor.note-frame .note-editing-area .note-editable {
        height: 200px;
        width: 400px;
    }
</style>

<body>
<?php if (session()->has('errors')) : ?>
    <ul>
        <?php foreach (session('errors') as $error) : ?>
            <li><?= esc($error) ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>
    <form method="post" action="<?= base_url('modify/' . $gestio['id']) ?>">
        <?= csrf_field() ?>
        <label for="nom">Titol</label>
        <input type="text" name="nom" id="nom" value="<?= old('nom', $gestio['nom']) ?>"><br>
        <label for="text">Resum</label>
        <input type="text" name="resum" id="resum" value="<?= old('resum', $gestio['resum']) ?>"><br>
        <label for="seccio">Seccio</label>
        <select name="seccio" id="seccio">
            <option value="noticies">Noticies</option>
            <option value="historia">Historia</option>
            <option value="categories">Categories</option>
        </select><br>
        <textarea id="summernote" name="editordata"><?= old('editordata', $gestio['contingut']) ?></textarea>
        <button type="submit">Submit</button>
    </form>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    </script>
</body>

</html>