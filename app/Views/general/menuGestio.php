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
            <select id="seccio-select" class="w3-select">
                <option value="">Noticies</option>
                <option value="noticies">Notícies</option>
                <option value="events">Events</option>
            </select>
            <li><a href="<?= base_url('/gestio/menu') ?>">Menu general</a></li>
            <li><a href="<?= base_url('/gestio/galeria') ?>">Galeria</a></li>
            <li><a href="<?= base_url('/gestio/configuracio') ?>">Configuracio</a></li>
        </ul>
    </div>
</nav>

<script>
    document.getElementById('seccio-select').addEventListener('change', function() {
        const selected = this.value;
        if (selected === 'noticies') {
            window.location.href = "<?= base_url('gestio/noticies') ?>";
        } else if (selected === 'events') {
            window.location.href = "<?= base_url('gestio/events') ?>";
        }
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