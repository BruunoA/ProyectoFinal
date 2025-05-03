<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">

<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

        <ul class="menu-items">
            <?php

            $pares = [];
            $fills = [];

            foreach ($menu as $item) {
                // if ($item['visibilitat'] === 'Si') {
                    if (is_null($item['id_pare'])) {
                        $pares[$item['ordre']] = $item;
                    } else {
                        $fills[$item['id_pare']][] = $item;
                    }
                // }
            }

            ksort($pares);

            foreach ($pares as $pare) {
                $url = base_url($pare['valor']);

                if (isset($fills[$pare['ordre']])) {
                    echo '<li class="menu-dropdown">';
                    echo '<select onchange="location = this.value;" class="menu-select">';
                    echo '<option value="">' . esc($pare['nom']) . '</option>';
                    echo '<option value="" disabled>Selecciona una opció</option>';
                    foreach ($fills[$pare['ordre']] as $fill) {
                        echo '<option value="' . base_url($fill['valor']) . '">' . esc($fill['nom']) . '</option>';
                    }
                    echo '</select></li>';
                } else {
                    echo '<li><a href="' . $url . '">' . esc($pare['nom']) . '</a></li>';
                }
            }
            ?>
        </ul>
    </div>
</nav>

<script>
    function toggleMenu() {
        document.querySelector(".menu-items").classList.toggle("show");
    }
</script>