<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()" style="color: white;">☰</div>

        <ul class="menu-items">
            <img src="<?= base_url('uploads/alpicatLogo.png') ?>" alt="Logo" height="32">
            <?php foreach (mostrar_tree() as $menu): ?>
                <?php if (isset($menu['children'])): ?>
                    <div class="w3-dropdown-hover">
                        <button class="w3-btn w3-text-white"><?= $menu['nom'] ?> <i class="fa-solid fa-caret-down"></i></button>
                        <div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color: black;">
                            <?php foreach ($menu['children'] as $child): ?>
                                <a href="<?= base_url($child['valor']) ?>" class="w3-bar-item w3-btn w3-text-black" style="background-color:white;"><?= $child['nom'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="<?= base_url($menu['valor']) ?>" class="w3-bar-item w3-btn w3-text-white">
                        <?= $menu['nom'] ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <div class="xarxes_socials">
            <?php
            $xarxes_socials = mostrar_footer();
            foreach ($xarxes_socials as $xarxa): ?>
                <a href="<?= $xarxa['valor']; ?>" target="_blank">
                    <i class="<?= esc($xarxa['icona']); ?>"></i>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</nav>

<script>
    function toggleMenu() {
        document.querySelector(".menu-items").classList.toggle("show");
    }
</script>