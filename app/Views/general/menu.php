<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

        <ul class="menu-items">
            <?php // foreach ($menu as $item): ?>
                <li>
                    <!-- <a href="<?php // base_url($item['enllaç']) ?>"><?php // $item['nom'] ?></a> -->

                    <!-- Mostrar submenú si tiene hijos -->
                    <?php // if (!empty($item['children'])): ?>
                        <ul>
                            <?php //foreach ($item['children'] as $child): ?>
                                <li><a href="<?php // base_url($child['enllaç']) ?>"><?php // $child['nom'] ?></a></li>
                            <?php //endforeach; ?>
                        </ul>
                    <?php // endif; ?>
                </li>
            <?php // endforeach; ?>
        </ul>
    </div>
</nav>

<script>
    function toggleMenu() {
        document.querySelector(".menu-items").classList.toggle("show");
    }
</script>