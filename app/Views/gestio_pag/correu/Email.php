<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/partPrivada.css'); ?>">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title><?= lang('contacte.titolGestio') ?></title>
</head>

<body>
    <?= $this->include('general/menuGestio'); ?>
    <div class="w3-container">
        <?= session()->getFlashdata('success') ?>
        <h1 class="w3-center w3-text-blue"><?= lang('contacte.subtitolGestio') ?></h1>
        <?php if (!empty($contactes)): ?>
            <div class="w3-responsive">
                <table class="w3-table w3-bordered w3-striped w3-hoverable">
                    <thead class="w3-blue">
                        <tr>
                            <th><?= lang('contacte.nomGestio') ?></th>
                            <th><?= lang('contacte.gmailGestio') ?></th>
                            <th><?= lang('contacte.assumpteGestio') ?></th>
                            <th><?= lang('contacte.motiuGestio') ?></th>
                            <th><?= lang('contacte.dataGestio') ?></th>
                            <th><?= lang('contacte.accionsGestio') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contactes as $contacte): ?>
                            <tr>
                                <td><?= $contacte['nom'] ?? '' ?></td>
                                <td><?= $contacte['from_email'] ?? '' ?></td>
                                <td><?= $contacte['nom_assumpte'] ?? '' ?></td>
                                <td><?= $contacte['text'] ?? '' ?></td>
                                <td><?= $contacte['created_at'] ?? '' ?></td>
                                <td>
                                    <a href="<?= base_url('gestio/email/send/' . $contacte['id']); ?>" class="w3-button w3-green"><?= lang('contacte.respondre') ?></a>
                                    <a href="<?= base_url('gestio/email/delete/' . $contacte['id']); ?>" class="w3-button w3-red" onclick="return confirm('Vols eliminar aquest missatge?');"><?= lang('contacte.eliminar') ?></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="w3-text-red"><?= lang('contacte.res') ?></p>
        <?php endif; ?>

    </div>
</body>

</html>