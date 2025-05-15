<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .menu {
    background-color:rgb(8, 8, 8);
    color: white;
}

.menu-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

.menu-items {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    position: relative;
}

.menu-items li {
    position: relative;
}

.menu-items li a {
    color: white;
    text-decoration: none;
    padding: 15px 20px;
    display: block;
}

.menu-items > li > a {
    display: flex;
    align-items: center;
}

.menu-toggle {
    display: none;
    padding: 15px 20px;
    cursor: pointer;
}

.has-submenu > a > i {
    margin-left: 5px;
}

.submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color:rgb(0, 0, 0);
    min-width: 200px;
    z-index: 1000;
    list-style: none;
    padding: 0;
    margin: 0;
    box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}

.submenu.level-3 {
    left: 100%;
    top: 0;
}

.has-submenu:hover > .submenu {
    display: block;
}

/* Estilos para móvil */
@media (max-width: 768px) {
    .menu-items {
        flex-direction: column;
        display: none;
    }
    
    .menu-items.show {
        display: flex;
    }
    
    .menu-toggle {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .submenu {
        position: static;
        display: none;
        padding-left: 20px;
        background-color: rgba(0,0,0,0.2);
        box-shadow: none;
    }
    
    .submenu.level-3 {
        padding-left: 40px;
    }
    
    .has-submenu.active > .submenu {
        display: block;
    }
    
    .has-submenu > a {
        justify-content: space-between;
    }
    
    .has-submenu > a > i {
        transition: transform 0.3s;
    }
    
    .has-submenu.active > a > i.fa-caret-down {
        transform: rotate(180deg);
    }
    
    .has-submenu.active > a > i.fa-caret-right {
        transform: rotate(90deg);
    }
}
</style>
<nav class="menu">
    <div class="menu-container">
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>
        
        <ul class="menu-items">
            <?php foreach (mostrar_tree() as $menu_item): ?>
                <?php if (empty($menu_item['children'])): ?>
                    <!-- Elemento sin hijos -->
                    <li>
                        <a href="<?= base_url($menu_item['valor']) ?>"><?= $menu_item['nom'] ?></a>
                    </li>
                <?php else: ?>
                    <!-- Elemento con hijos -->
                    <li class="has-submenu">
                        <a href="<?= base_url($menu_item['valor']) ?>">
                            <?= $menu_item['nom'] ?> <i class="fa-solid fa-caret-down"></i>
                        </a>
                        <ul class="submenu">
                            <?php foreach ($menu_item['children'] as $child): ?>
                                <?php if (empty($child['children'])): ?>
                                    <!-- Hijo sin nietos -->
                                    <li>
                                        <a href="<?= base_url($child['valor']) ?>"><?= $child['nom'] ?></a>
                                    </li>
                                <?php else: ?>
                                    <!-- Hijo con nietos (tercer nivel) -->
                                    <li class="has-submenu">
                                        <a href="<?= base_url($child['valor']) ?>">
                                            <?= $child['nom'] ?> <i class="fa-solid fa-caret-right"></i>
                                        </a>
                                        <ul class="submenu level-3">
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
        </ul>
    </div>
</nav>

<script>
function toggleMenu() {
    const menu = document.querySelector(".menu-items");
    menu.classList.toggle("show");
}

document.querySelectorAll('.has-submenu > a').forEach(link => {
    link.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
            const parentItem = this.parentElement;
            const isSubmenuActive = parentItem.classList.contains('active');
            
            // Si es un enlace de submenú (tiene hijos)
            if (parentItem.querySelector('.submenu')) {
                e.preventDefault();
                parentItem.classList.toggle('active');
                
                // Cerrar otros submenús abiertos
                document.querySelectorAll('.has-submenu').forEach(item => {
                    if (item !== parentItem) {
                        item.classList.remove('active');
                    }
                });
            }
            // Si es un enlace normal dentro de un submenú ya desplegado
            else if (isSubmenuActive) {
                // Permitir el comportamiento normal del enlace
                return true;
            }
        }
    });
});

// Permitir clics en enlaces normales de submenús
document.querySelectorAll('.submenu a').forEach(subLink => {
    subLink.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
            // Si el enlace no tiene submenús hijos, permitir el clic normal
            if (!this.parentElement.classList.contains('has-submenu')) {
                return true;
            }
        }
    });
});
</script>