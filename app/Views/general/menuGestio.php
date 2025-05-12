<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()" style="color: white;">☰</div>

        <ul class="menu-items w3-bar">
            <li><a href="<?= base_url('gestio/banner') ?>" class="w3-bar-item w3-btn w3-text-white">Inici</a></li>
            <li><a href="<?= base_url('gestio/sobreNosaltres') ?>" class="w3-bar-item w3-btn w3-text-white">Sobre Nosaltres</a></li>

            <li class="w3-dropdown-hover">
                <button class="w3-btn w3-text-white">Gestio <i class="fa-solid fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color: black;">
                    <a href="<?= base_url('gestio/noticies') ?>" class="w3-bar-item w3-btn w3-text-black" style="background-color:white;">Noticies</a>
                    <a href="<?= base_url('gestio/programes') ?>" class="w3-bar-item w3-btn w3-text-black" style="background-color:white;">Programes</a>
                    <a href="<?= base_url('gestio/equips') ?>" class="w3-bar-item w3-btn w3-text-black" style="background-color:white;">Equips</a>
                </div>
            </li>

            <li><a href="<?= base_url('/gestio/galeria') ?>" class="w3-bar-item w3-btn w3-text-white">Galeria</a></li>

            <li class="w3-dropdown-hover">
                <button class="w3-btn w3-text-white">Configuracio <i class="fa-solid fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color: black;">
                    <a href="<?= base_url('configuracio/dades_contacte') ?>" class="w3-bar-item w3-btn w3-text-black" style="background-color:white;">Dades de Contacte</a>
                    <a href="<?= base_url('config/menu_general') ?>" class="w3-bar-item w3-btn w3-text-black" style="background-color:white;">Menu General</a>
                    <!-- <a href="<?= base_url('config/menu_gestio') ?>" class="w3-bar-item w3-btn w3-text-black" style="background-color:white;">Menu Gestio</a> -->
                    <a href="<?= base_url('xarxes_socials') ?>" class="w3-bar-item w3-btn w3-text-black" style="background-color:white;">Xarxes Socials</a>
                </div>
            </li>

            <li><a href="<?= base_url('gestio/clubs') ?>" class="w3-bar-item w3-btn w3-text-white">Clubs</a></li>

            <li class="w3-dropdown-hover">
                <button class="w3-btn w3-text-white">Contacte <i class="fa-solid fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color: black;">
                    <a href="<?= base_url('gestio/email') ?>" class="w3-bar-item w3-btn w3-text-black" style="background-color:white;">Gestio de gmails</a>
                    <a href="<?= base_url('gestio/assumptes') ?>" class="w3-bar-item w3-btn w3-text-black" style="background-color:white;">Gestio assumptes</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.querySelectorAll('.seccio-select').forEach(select => {
        select.addEventListener('change', function() {
            const selected = this.value;
            if (selected === 'noticies') {
                window.location.href = "<?= base_url('gestio/noticies') ?>";
            } else if (selected === 'events') {
                window.location.href = "<?= base_url('gestio/events') ?>";
            } else if (selected === 'programes') {
                window.location.href = "<?= base_url('gestio/programes') ?>";
            } else if (selected === 'equips') {
                window.location.href = "<?= base_url('gestio/equips') ?>";
            }
        });
    });

    document.querySelectorAll('.seccio-configuracio-select').forEach(select => {
        select.addEventListener('change', function() {
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

    function toggleMenu() {
        document.querySelector(".menu-items").classList.toggle("show");
    }
</script>