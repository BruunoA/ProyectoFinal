<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<?php mostrar_tree($cat) ?>

<script>
    function toggleMenu() {
        document.querySelector(".menu-items").classList.toggle("show");
    }
</script>