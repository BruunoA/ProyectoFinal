<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

        <!-- TODO: ACABAR DE VEURE COM FICAR ELS APARTATS DE FILTRAR-->
        <ul class="menu-items">
            <li><a href="">Inici</a></li>
            <!-- <li><a href="">Contacte</a></li> -->
            <li><a href="<?= base_url('gestio/sobreNosaltres') ?>">Sobre Nosaltres</a></li>
            <li><a href="<?= base_url('gestio/programes') ?>">Programes</a></li>
            <select class="seccio-select w3-select">
                <option value="">Noticies</option>
                <option value="noticies">Notícies</option>
                <option value="events">Events</option>
            </select>
            <li><a href="<?= base_url('/gestio/menu') ?>">Menu general</a></li>
            <li><a href="<?= base_url('/gestio/galeria') ?>">Galeria</a></li>
            <!-- <li><a href="<?php // base_url('/gestio/configuracio') ?>">Configuracio</a></li> -->
            <select class="seccio-configuracio-select w3-select">
                <option value="">Configuracio</option>
                <option value="dades_contacte">Dades contacte</option>
                <option value="menu_general">Menu general</option>
                <option value="menu_gestio">Menu gestio</option>
                <option value="footer">Footer</option>
            </select>
        </ul>
    </div>
</nav>

<script>
    document.querySelectorAll('.seccio-select').forEach(select => {
        select.addEventListener('change', function () {
            const selected = this.value;
            if (selected === 'noticies') {
                window.location.href = "<?= base_url('gestio/noticies') ?>";
            } else if (selected === 'events') {
                window.location.href = "<?= base_url('gestio/events') ?>";
            }
        });
    });

    document.querySelectorAll('.seccio-configuracio-select').forEach(select => {
        select.addEventListener('change', function () {
            const selected = this.value;
            if (selected === 'dades_contacte') {
                window.location.href = "<?= base_url('configuracio/dades_contacte') ?>";
            } else if (selected === 'menu_general') {
                window.location.href = "<?= base_url('configuracio/menu_general') ?>";
            } else if (selected === 'menu_gestio') {
                window.location.href = "<?= base_url('configuracio/menu_gestio') ?>";
            } else if (selected === 'footer') {
                window.location.href = "<?= base_url('configuracio/footer') ?>";
            }
        });
    });
    // function toggleMenu() {
    //     document.querySelector(".menu-items").classList.toggle("show");
    // }

    // function filtrarSeccio(seccio) {
    //     document.querySelectorAll(".gestio-item").forEach(item => {
    //         if (item.getAttribute("data-seccio") === seccio) {
    //             item.style.display = "block";
    //         } else {
    //             item.style.display = "none";
    //         }
    //     });
    // }
</script>