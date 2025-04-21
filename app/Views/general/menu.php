<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

        <ul class="menu-items">
            <li><a href="<?= base_url('/') ?>">Inici</a></li>
            <li><a href="<?= base_url('contacte') ?>">Contacte</a></li>
            <li><a href="<?= base_url('sobreNosaltres') ?>">Sobre Nosaltres</a></li>
            <li><a href="<?= base_url('programes') ?>">Programes</a></li>
            <li><a href="<?= base_url('noticies') ?>">Noticies</a></li>
            <li><a href="<?= base_url('galeria') ?>">Galeria</a></li>
            <li><a href="<?= base_url('classificacio') ?>">Classificacio</a></li>
            <li class="menu-dropdown">
                <select onchange="location = this.value;" class="menu-select">
                    <?php if (!session()->get('logged_in')): ?>
                        <option value="">Acces privat</option>
                        <option value="<?= base_url('login') ?>">👤 Iniciar sessio</option>
                    <?php else: ?>
                        <option value="">Acces privat</option>
                        <option value="<?= base_url('logout') ?>">🚪 Tancar sessio</option>
                    <?php endif; ?>
                    <?php if (session()->get('logged_in') && session()->get('rol') == 'admin'): ?>
                        <option value="<?= base_url('gestio') ?>">⚙️ Gestio</option>
                    <?php endif; ?>
                </select>
            </li>
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