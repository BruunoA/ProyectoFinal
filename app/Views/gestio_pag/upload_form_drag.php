<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <h2><?= esc($title) ?></h2>
    </title>
</head>
<style>
    .drag-over {
        border: dashed 3px red !important;
    }
</style>

<body>
    <?php foreach ($errors as $error) : ?>
        <li><?= esc($error) ?></li>
    <?php endforeach ?>

    <script>
        function dOver(evt) {
            evt.preventDefault();
            evt.target.classList.add('drag-over');
        }

        function dEnter(evt) {
            evt.preventDefault();
            evt.target.classList.add('drag-over');
            document.getElementById("dropContainer").textContent = 'Drop your files here';
        }

        function dLeave(e) {
            e.target.classList.remove('drag-over');
            document.getElementById("dropContainer").textContent = 'Drop Here';
        }

        function dDrop(evt) {
            evt.stopPropagation();
            evt.preventDefault();

            evt.target.classList.remove('drag-over');

            document.getElementById("dropContainer").textContent = '';

            var dt = event.dataTransfer;
            var files = dt.files;

            var count = files.length;
            output("File Count: " + count + "\n");

            for (var i = 0; i < files.length; i++) {
                output(" File " + i + ":\n(" + (typeof files[i]) + ") : <" + files[i] + " > " +
                    files[i].name + " " + files[i].size + "\n");
            }

            var fileInput = document.getElementById('formFiles');
            fileInput.files = dt.files;
        }

        function output(text) {
            document.getElementById("dropContainer").textContent += text;
        }
    </script>

    <div style='padding:25px'>

        <div id="dropContainer" style="border:1px solid black;height:100px;" ondragover="dOver(event)"
            ondragenter="dEnter(event)" ondrop="dDrop(event)" ondragleave="dLeave(event)">
            Drop Here
        </div>

        <div id='files'>
            <input type="file" id="formFiles" name="userfile[]" style="visibility:hidden" />
        </div>

        <div style='padding-top:10px'>
            <select name="carpeta" id="carpeta">
                <option value="galeria">Galeria</option>
                <option value="noticies">Noticies</option>
                <option value="programes">Programes</option>
                <option value="sobreNosaltres">Sobre Nosaltres</option>
            </select>

            <div style='padding-top:10px'>
                <input type="submit" value="upload" />
            </div>

            </form>

        </div>
</body>

</html>