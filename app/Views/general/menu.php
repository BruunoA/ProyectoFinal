<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>

</style>
<nav class="menu" style=" z-index: 1;">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

        <ul class="menu-items">
            <?php $logo = mostrar_logo(); ?>
            <img src="<?= $logo['img'] ?>" alt="Logo" height="40" style="width: 40px;">
            <?php foreach (mostrar_tree() as $menu_item): ?>
                <?php if (empty($menu_item['children'])): ?>
                    <li>
                        <a href="<?= base_url($menu_item['valor']) ?>"><?= $menu_item['nom'] ?></a>
                    </li>
                <?php else: ?>
                    <li class="has-submenu">
                        <a href="<?= base_url($menu_item['valor']) ?>">
                            <?= $menu_item['nom'] ?> <i class="fa-solid fa-caret-down"></i>
                        </a>
                        <ul class="submenu">
                            <?php foreach ($menu_item['children'] as $child): ?>
                                <?php if (empty($child['children'])): ?>
                                    <li>
                                        <a href="<?= base_url($child['valor']) ?>"><?= $child['nom'] ?></a>
                                    </li>
                                <?php else: ?>
                                    <li class="has-submenu">
                                        <a href="<?= base_url($child['valor']) ?>">
                                            <?= $child['nom'] ?> <i class="fa-solid fa-caret-right"></i>
                                        </a>
                                        <ul class="submenu nivell-3">
                                            <?php foreach ($child['children'] as $grandchild): ?>
                                                <li>
                                                    <a href="<?= base_url($grandchild['valor']) ?>"><?= $grandchild['nom'] ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if (session()->has('logged_in') && session('logged_in')): ?>
                <li>
                    <a href="<?= base_url('gestio') ?>"><?= lang('home.gestio') ?></a>
                </li>
                <a href="<?= base_url('logout') ?>"><?= lang('home.logout') ?></a>
            <?php else: ?>
                <li>
                    <a href="<?= base_url('login') ?>"><?= lang('home.login') ?></a>
                </li>
            <?php endif; ?>
        </ul>
        <?= $footer = mostrar_footer();

        foreach ($footer as $item): ?>
            <a href="<?= base_url($item['valor']); ?>" style="color: white; text-decoration: none; margin: 0 10px;"><?= esc($item['nom']); ?></a>
        <?php endforeach; ?>
    </div>
</nav>

<script>
    function toggleMenu() {
        const menu = document.querySelector(".menu-items");
        menu.classList.toggle("show");
    }

    document.querySelectorAll('.has-submenu > a').forEach(link => {
        link.addEventListener('click', function(e) {
            // if (window.innerWidth <= 768) {
            const parentItem = this.parentElement;
            const isSubmenuActive = parentItem.classList.contains('active');

            if (parentItem.querySelector('.submenu')) {
                e.preventDefault();
                parentItem.classList.toggle('active');

                document.querySelectorAll('.has-submenu').forEach(item => {
                    if (item !== parentItem) {
                        item.classList.remove('active');
                    }
                });
            } else if (isSubmenuActive) {
                return true;
            }
            // }
        });
    });

    // document.querySelectorAll('.submenu a').forEach(subLink => {
    //     subLink.addEventListener('click', function(e) {
    //         // if (window.innerWidth <= 768) {
    //             if (!this.parentElement.classList.contains('has-submenu')) {
    //                 return true;
    //             // }
    //         }
    //     });
    // });
</script>