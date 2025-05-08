<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<footer style="background-color: black; color: white; padding: 2rem 0; text-align: center;">
    <div>
        <h3>Xarxes socials</h3>
        <?php 
        $xarxes_socials = mostrar_footer(); 
        foreach ($xarxes_socials as $xarxa): ?>
            <a href="<?= $xarxa['valor']; ?>" target="_blank">
            <i class="<?= esc($xarxa['icon']); ?>" style="font-size: 40px; color: white; margin: 0 10px;"></i>
            </a>
        <?php endforeach; ?>
    </div>
    <div>
        <?php 
        $footer = mostrar_tree();

        foreach ($footer as $item): ?>
            <a href="<?= base_url($item['valor']); ?>" style="color: white; text-decoration: none; margin: 0 10px;"><?= esc($item['nom']); ?></a>
        <?php endforeach; ?>
        <!-- <a href="<?= base_url('/') ?>">Inici</a>
        <a href="<?= base_url('contacte') ?>">Contacte</a>
        <a href="<?= base_url('sobre-nosaltres') ?>">Sobre Nosaltres</a>
        <a href="<?= base_url('programes') ?>">Programes</a>
        <a href="<?= base_url('noticies') ?>">Noticies</a>
        <a href="<?= base_url('galeria') ?>">Galeria</a>
        <a href="<?= base_url('classificacio') ?>">Classificacio</a> -->
    </div>
</footer>
