<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

        <!-- TODO: ACABAR DE VEURE COM FICAR ELS APARTATS DE FILTRAR-->
        <ul class="menu-items">
            <li><a href="<?= base_url('gestio/banner') ?>">Inici</a></li>
            <li><a href="<?= base_url('gestio/sobreNosaltres') ?>">Sobre Nosaltres</a></li>
            <li><a href="<?= base_url('gestio/programes') ?>">Programes</a></li>
            <select class="seccio-select w3-select">
                <option value="">Noticies</option>
                <option value="noticies">Notícies</option>
                <option value="events">Events</option>
            </select>
            <li><a href="<?= base_url('/gestio/galeria') ?>">Galeria</a></li>
            <select class="seccio-configuracio-select w3-select">
                <option value="">Configuracio</option>
                <option value="dades_contacte">Dades contacte</option>
                <option value="menu_general">Menu general</option>
                <option value="menu_gestio">Menu gestio</option>
                <option value="xarxes_socials">Xarxes Socials</option>
            </select>
            <li><a href="<?= base_url('gestio/mail') ?>">Correu </a></li>
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
                window.location.href = "<?= base_url('config/menu_general') ?>";
            } else if (selected === 'menu_gestio') {
                window.location.href = "<?= base_url('config/menu_gestio') ?>";
            } else if (selected === 'xarxes_socials') {
                window.location.href = "<?= base_url('xarxes_socials') ?>";
            }
        });
    });
</script>
