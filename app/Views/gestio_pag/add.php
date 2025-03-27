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

<form method="post" action="<?=base_url('/create/add')?>">
    <?= csrf_field() ?>
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" value="<?= old('nom')?>"><br>
    <label for="text">Resum</label>
    <input type="text" name="resum" id="resum" value="<?= old('resum')?>"><br>
    <label for="seccio">Seccio</label>
        <select name="seccio" id="seccio" value="<?= old('seccio')?>">
        <option value="">Selecciona una opcio</option> <!-- Veure com fer per a que no surti cap seleccionat--> 
        <option value="#" disabled>Noticies</option>    <!-- Son les diferents pàgines que hi ha, per separar el apartats en el select -->
            <option value="noticies">&nbsp;&nbsp;&nbsp;Noticies</option>
            <option value="event">&nbsp;&nbsp;&nbsp;Events</option>    <!-- TODO: VEURE SI FICAR-HO AL WYSIWYG O NO -->  
        <option value="#" disabled>Sobre nosaltres</option>
            <option value="historia">&nbsp;&nbsp;&nbsp;Historia</option>
            <option value="missio">&nbsp;&nbsp;&nbsp;Missio</option>
            <option value="visio">&nbsp;&nbsp;&nbsp;Visio</option>
            <option value="valors">&nbsp;&nbsp;&nbsp;Valors</option>
        <option value="#" disabled>Programes</option>
            <option value="categories">Categories</option>
        </select><br>
        <!-- TODO: ABANS DE FER SUBMIT, MIRAR QUE COMPLEIXI LES REGLES EN BANDA CLIENT I SERVER-->
  <textarea id="summernote" name="editordata"><?= old('editordata')?></textarea></br>
  <button type="submit">Submit</button>
</form>

<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});

// const campSelect = document.getElementById('seccioChange');
// seccioChange.addEventListener('onchange', function(){
//     if(campSelect.value==="event"){
//     modificarRequired();
// }else{
//     console.log('No es event');
// }
// });

// campSelect.addEventListener('change', modificarRequired);
// function modificarRequired(event){
//     const inputModificar = document.getElementById('summernote');
//     inputModificar.removeAttribute('required');
// }
</script>
</body>
</html> 