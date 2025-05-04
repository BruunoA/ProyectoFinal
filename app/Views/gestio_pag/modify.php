<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Contingut</title>

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

    <form class="w3-card w3-padding w3-margin-top" method="post" action="<?= base_url('modify/' . $gestio['id']) ?>">
        <?= csrf_field() ?>

        <label for="nom" class="w3-text-black"><b>Títol</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="nom" id="nom" value="<?= old('nom', $gestio['nom']) ?>" required>

        <label for="resum" class="w3-text-black"><b>Resum</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="resum" id="resum" value="<?= old('resum', $gestio['resum']) ?>" required>

        <label for="seccio" class="w3-text-black"><b>Secció</b></label>
        <select class="w3-select w3-border w3-margin-bottom" name="seccio" id="seccio" required>
            <option value="">Selecciona una opció</option>
            <option value="" disabled class="w3-bold">Noticies</option>
            <option value="noticies" <?= old('seccio', $gestio['seccio']) === 'noticies' ? 'selected' : '' ?>>&nbsp;&nbsp;&nbsp;Noticies</option>
            <option value="" disabled class="w3-bold">Sobre nosaltres</option>
            <option value="historia" <?= old('seccio', $gestio['seccio']) === 'historia' ? 'selected' : '' ?>>&nbsp;&nbsp;&nbsp;Història</option>
            <option value="missio" <?= old('seccio', $gestio['seccio']) === 'missio' ? 'selected' : '' ?>>&nbsp;&nbsp;&nbsp;Missió</option>
            <option value="visio" <?= old('seccio', $gestio['seccio']) === 'visio' ? 'selected' : '' ?>>&nbsp;&nbsp;&nbsp;Visió</option>
            <option value="valors" <?= old('seccio', $gestio['seccio']) === 'valors' ? 'selected' : '' ?>>&nbsp;&nbsp;&nbsp;Valors</option>
        </select>

        <div id="portada-container" class="w3-margin-bottom" style="display: none;">
            <label for="portada" class="w3-text-black"><b>Portada Notícia</b></label>
            <input class="w3-input w3-border" type="text" id="portada" name="portada" readonly value="<?= old('portada', $gestio['portada']) ?>">
            <button type="button" class="w3-button w3-blue w3-margin-top" onclick="openFileManager()">Seleccionar imatge</button>
        </div>

        <label for="estat" class="w3-text-black"><b>Estat</b></label>
        <select class="w3-select w3-border w3-margin-bottom" name="estat" id="estat" required>
            <option value="">Selecciona una opció</option>
            <option value="no_publicat" <?= old('estat', $gestio['estat']) === 'no_publicat' ? 'selected' : '' ?>>No Publicat</option>
            <option value="publicat" <?= old('estat', $gestio['estat']) === 'publicat' ? 'selected' : '' ?>>Publicat</option>
        </select>

        <label class="w3-text-black w3-margin-top"><b>Contingut</b></label>
        <div class="w3-margin-bottom">
        <textarea name="ckeditor" id="ckeditor" required><?= old('contingut', $gestio['contingut'] ?? 'No hi ha contingut') ?></textarea>
        </div>

        <button type="submit" class="w3-button w3-green w3-margin-top">Submit</button>
    </form>

    <script>

        function mostrarPortada() {
            const seccio = document.getElementById('seccio').value;
            const portadaContainer = document.getElementById('portada-container');
            if (seccio === 'noticies') {
                portadaContainer.style.display = 'block';
            } else {
                portadaContainer.style.display = 'none';
            }
        }
        document.getElementById('seccio').addEventListener('change', function() {
            const contenidorContingut = document.querySelector('#ckeditor').closest('.w3-margin-bottom');
            const ckeditor = document.getElementById('ckeditor');

            const portada = document.getElementById('portada-container');
            if (this.value === 'noticies') {
                portada.style.display = 'block';
            } else {
                portada.style.display = 'none';
            }
        });

        const connectorUrl = "<?= base_url('fileconnector') ?>";
        const uploadTargetHash = 'l1_XA';

        ClassicEditor
            .create(document.querySelector('#ckeditor'), {
                removePlugins: ['Markdown'],
                toolbar: {
                    items: [
                        "fontFamily", "fontSize", "|", "bold", "italic", "underline", "strikethrough", "|", "subscript", "superscript", "specialCharacters", "|",
                        "fontColor", "fontBackgroundColor", "highlight", "removeFormat", "|", "bulletedList", "numberedList", "outdent", "indent", "todoList", "|",
                        "-",
                        "link", "blockQuote", "horizontalLine", "|", "CKFinder", "imageUpload", "insertTable", "mediaEmbed", "|", "undo", "redo", "|", "htmlEmbed",
                        "code", "codeBlock", "sourceEditing"
                    ],

                    shouldNotGroupWhenFull: true
                },
                language: "es",
                image: {
                    toolbar: ["imageTextAlternative", "imageStyle:inline", "imageStyle:block", "imageStyle:side", "linkImage"]
                },
                table: {
                    contentToolbar: ["tableColumn", "tableRow", "mergeTableCells", "tableCellProperties", "tableProperties"]
                },
            })
            .then(editor => {

                editor.editing.view.change(writer => {
                    writer.setStyle('height', '400px', editor.editing.view.document.getRoot());
                });

                const ckf = editor.commands.get('ckfinder'),
                    fileRepo = editor.plugins.get('FileRepository'),
                    ntf = editor.plugins.get('Notification'),
                    i18 = editor.locale.t,
                    // Insert images to editor window
                    insertImages = urls => {
                        const imgCmd = editor.commands.get('imageUpload');
                        if (!imgCmd.isEnabled) {
                            ntf.showWarning(i18('Could not insert image at the current position.'), {
                                title: i18('Inserting image failed'),
                                namespace: 'ckfinder'
                            });
                            return;
                        }
                        editor.execute('imageInsert', {
                            source: urls
                        });
                    },
                    // To get elFinder instance
                    getfm = open => {
                        return new Promise((resolve, reject) => {
                            // Execute when the elFinder instance is created
                            const done = () => {
                                if (open) {
                                    // request to open folder specify
                                    if (!Object.keys(_fm.files()).length) {
                                        // when initial request
                                        _fm.one('open', () => {
                                            _fm.file(open) ? resolve(_fm) : reject(_fm, 'errFolderNotFound');
                                        });
                                    } else {
                                        // elFinder has already been initialized
                                        new Promise((res, rej) => {
                                            if (_fm.file(open)) {
                                                res();
                                            } else {
                                                // To acquire target folder information
                                                _fm.request({
                                                    cmd: 'parents',
                                                    target: open
                                                }).done(e => {
                                                    _fm.file(open) ? res() : rej();
                                                }).fail(() => {
                                                    rej();
                                                });
                                            }
                                        }).then(() => {
                                            // Open folder after folder information is acquired
                                            _fm.exec('open', open).done(() => {
                                                resolve(_fm);
                                            }).fail(err => {
                                                reject(_fm, err ? err : 'errFolderNotFound');
                                            });
                                        }).catch((err) => {
                                            reject(_fm, err ? err : 'errFolderNotFound');
                                        });
                                    }
                                } else {
                                    // show elFinder manager only
                                    resolve(_fm);
                                }
                            };

                            // Check elFinder instance
                            if (_fm) {
                                // elFinder instance has already been created
                                done();
                            } else {
                                // To create elFinder instance
                                _fm = $('<div/>').dialogelfinder({
                                    // dialog title
                                    title: 'File Manager',
                                    // connector URL
                                    url: connectorUrl,
                                    // start folder setting
                                    startPathHash: open ? open : void(0),
                                    // Set to do not use browser history to un-use location.hash
                                    useBrowserHistory: false,
                                    // Disable auto open
                                    autoOpen: false,
                                    // elFinder dialog width
                                    width: '80%',
                                    // set getfile command options
                                    commandsOptions: {
                                        getfile: {
                                            oncomplete: 'close',
                                            multiple: true
                                        }
                                    },
                                    // Insert in CKEditor when choosing files
                                    getFileCallback: (files, fm) => {
                                        let imgs = [];
                                        fm.getUI('cwd').trigger('unselectall');
                                        $.each(files, function(i, f) {
                                            if (f && f.mime.match(/^image\//i)) {
                                                imgs.push(fm.convAbsUrl(f.url));
                                            } else {
                                                editor.execute('link', fm.convAbsUrl(f.url));
                                            }
                                        });
                                        if (imgs.length) {
                                            insertImages(imgs);
                                        }
                                    }
                                }).elfinder('instance');
                                done();
                            }
                        });
                    };

                // elFinder instance
                let _fm;

                if (ckf) {
                    // Take over ckfinder execute()
                    ckf.execute = () => {
                        getfm().then(fm => {
                            fm.getUI().dialogelfinder('open');
                        });
                    };
                }

                // Make uploader
                const uploder = function(loader) {
                    let upload = function(file, resolve, reject) {
                        getfm(uploadTargetHash).then(fm => {
                            let fmNode = fm.getUI();
                            fmNode.dialogelfinder('open');
                            fm.exec('upload', {
                                    files: [file],
                                    target: uploadTargetHash
                                }, void(0), uploadTargetHash)
                                .done(data => {
                                    if (data.added && data.added.length) {
                                        fm.url(data.added[0].hash, {
                                            async: true
                                        }).done(function(url) {
                                            resolve({
                                                'default': fm.convAbsUrl(url)
                                            });
                                            fmNode.dialogelfinder('close');
                                        }).fail(function() {
                                            reject('errFileNotFound');
                                        });
                                    } else {
                                        reject(fm.i18n(data.error ? data.error : 'errUpload'));
                                        fmNode.dialogelfinder('close');
                                    }
                                })
                                .fail(err => {
                                    const error = fm.parseError(err);
                                    reject(fm.i18n(error ? (error === 'userabort' ? 'errAbort' : error) : 'errUploadNoFiles'));
                                });
                        }).catch((fm, err) => {
                            const error = fm.parseError(err);
                            reject(fm.i18n(error ? (error === 'userabort' ? 'errAbort' : error) : 'errUploadNoFiles'));
                        });
                    };

                    this.upload = function() {
                        return new Promise(function(resolve, reject) {
                            if (loader.file instanceof Promise || (loader.file && typeof loader.file.then === 'function')) {
                                loader.file.then(function(file) {
                                    upload(file, resolve, reject);
                                });
                            } else {
                                upload(loader.file, resolve, reject);
                            }
                        });
                    };
                    this.abort = function() {
                        _fm && _fm.getUI().trigger('uploadabort');
                    };
                };

                // Set up image uploader
                fileRepo.createUploadAdapter = loader => {
                    return new uploder(loader);
                };


            })
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {
            $('#summernote').summernote();
        });

        function openFileManager() {
            $('<div/>').dialogelfinder({
                url: '<?= base_url("fileconnector") ?>',
                width: '80%',
                height: '80%',
                commandsOptions: {
                    getfile: {
                        oncomplete: 'close',
                        multiple: false
                    }
                },
                getFileCallback: function(file) {
                    console.log(file);
                    $('#portada').val(file.url);
                }
            });
        }
    </script>
</body>

</html>