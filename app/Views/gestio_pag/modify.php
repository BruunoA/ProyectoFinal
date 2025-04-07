<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css" />

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/css/elfinder.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/elfinder/2.1.65/js/elfinder.min.js"></script>


    <script src="<?= base_url('ckeditor/ckeditor.js') ?>"></script>
    <title>Document</title>
</head>
<style>
    .note-editor.note-frame .note-editing-area .note-editable {
        height: 200px;
        /* width: 700px; */
    }
</style>

<body>
    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
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
        <select name="seccio" id="seccio" value="<?= old('seccio') ?>">
            <option value="">Selecciona una opcio</option>
            <option value="#" disabled style="font-weight: bold;">Noticies</option>
            <option value="noticies">&nbsp;&nbsp;&nbsp;Noticies</option>
            <option value="event">&nbsp;&nbsp;&nbsp;Events</option> <!-- TODO: VEURE SI FICAR-HO AL WYSIWYG O NO -->
            <option value="#" disabled style="font-weight: bold;">Sobre nosaltres</option>
            <option value="historia">&nbsp;&nbsp;&nbsp;Historia</option>
            <option value="missio">&nbsp;&nbsp;&nbsp;Missio</option>
            <option value="visio">&nbsp;&nbsp;&nbsp;Visio</option>
            <option value="valors">&nbsp;&nbsp;&nbsp;Valors</option>
            <option value="#" disabled style="font-weight: bold;">Programes</option>
            <option value="categories">Categories</option>
            <option value="#" disabled style="font-weight: bold;">Configuracio</option>
            <option value="noticies">&nbsp;&nbsp;&nbsp;Banner</option>
        </select><br>
        <label for="portada">Portada Notícia</label>
        <input class="w3-input w3-border" type="text" name="portada" id="portada" value="<?= old('portada', $gestio['portada']) ?>" readonly>
        <button type="button" class="w3-button w3-blue w3-margin-top" onclick="openFileManager()">Seleccionar imatge</button><br><br>

        <div style="width:800px">
            <textarea name="ckeditor" id="ckeditor"><?= old('ckeditor', $gestio['contingut']) ?>
            </textarea>
        </div>
        <button type="submit">Submit</button>
    </form>

    <script>
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
    </script>
</body>

</html>