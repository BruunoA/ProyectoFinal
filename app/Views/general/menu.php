<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

        <ul class="menu-items">
            <li><a href="<?= base_url('/') ?>">Inici</a></li>
            <li><a href="<?= base_url('contacte') ?>">Contacte</a></li>
            <li><a href="<?= base_url('sobreNosaltres') ?>">Sobre Nosaltres</a></li>
            <!-- <li><a href="<?php // base_url('programes') 
                                ?>">Programes</a></li> -->
            <li class="menu-dropdown">
                <select onchange="location = this.value;" class="menu-select">
                    <option value="">Programes</option>
                    <option value="">Selecciona un programa</option>
                    <option value="<?= base_url('programes/juvenil_segona') ?>">Juvenil Segona</option> 
                    <option value="<?= base_url('programes/amateur_segona') ?>">Amateur Segona</option>
                    <option value="<?= base_url('programes/amateur_tercera') ?>">Amateur Tercera</option>
                    <option value="<?= base_url('programes/cadet_primera') ?>">Cadet Primera</option>
                    <!-- <option value="<?= base_url('programes/cadet_segona') ?>">Cadet Segona</option> -->
                    <!-- <option value="<?= base_url('programes/infantil_segona_A') ?>">Infantil Segona A</option> -->
                    <!-- <option value="<?= base_url('programes/infantil_segona_B') ?>">Infantil Segona B</option> -->
                    <!-- Agrega más opciones aquí si es necesario -->
                </select>
            </li>
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
        </ul>
    </div>
</nav>

<script>
    function toggleMenu() {
        document.querySelector(".menu-items").classList.toggle("show");
    }
</script>