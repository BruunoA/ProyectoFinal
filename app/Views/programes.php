<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/programes.css'); ?>">

    <title>Sobre Nosaltres Staff</title>
</head>
<style>
    /* @media (max-width: 768px) {
    .w3-cell-row {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 21rem;
        height: auto;
    }
} */

</style>
<body>
<?= $this->include('general/menu'); ?>

    <section id="Programes">
        <h3 id="Programes" class="w3-center">Fisioterapeuta</h3> 
        <div class="w3-cell-row w3-padding-16" style="height: 20rem;">
            <div id="IMG" class="w3-container w3-cell">
                <img src="<?= base_url('assets/img/equipo.jpg'); ?>">
            </div>
            <div class="w3-container w3-light-grey w3-cell"
                style="width: 75%; display: flex; flex-direction: column; justify-content: space-between; padding: 16px;">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis tempora iure quia magni explicabo
                    iste distinctio nesciunt ad dicta illo expedita cupiditate perspiciatis, saepe doloribus quae nisi
                    est optio fugiat nulla ullam rem. Veniam laudantium nobis, in excepturi quas ex reiciendis
                    cupiditate illo, ut ullam voluptate esse libero enim obcaecati?</p>
                <div id="Horario" class="horario">
                    <p>Lunes, miercoles, viernes</p>
                    <p>Horario: 9:00 am - 15:00 pm</p>
                </div>
            </div>
        </div>
    </section>

    <?php for ($i = 0; $i < 10; $i++): ?>  
        <section id="Programes"> 
            <h3 id="Programes" class="w3-center">Categoria : Juvenil A</h3>
            <div class="w3-cell-row w3-padding-16" style="height: 20rem;">
                <div id="IMG" class="w3-container w3-cell">
                    <img src="<?= base_url('assets/img/equipo.jpg'); ?>">
                </div>
                <div class="w3-container w3-light-grey w3-cell"
                    style="width: 75%; display: flex; flex-direction: column; justify-content: space-between; padding: 16px;">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis tempora iure quia magni explicabo
                        iste distinctio nesciunt ad dicta illo expedita cupiditate perspiciatis, saepe doloribus quae nisi
                        est optio fugiat nulla ullam rem. Veniam laudantium nobis, in excepturi quas ex reiciendis
                        cupiditate illo, ut ullam voluptate esse libero enim obcaecati?</p>
                    <div id="Horario" class="horario">
                        <p>Lunes, miercoles, viernes</p>
                        <p>Horario: 9:00 am - 15:00 pm</p>
                    </div>
                </div>
            </div>
        </section>
    <?php endfor; ?>

    <?= $this->include('general/footer'); ?>
</body>

</html>