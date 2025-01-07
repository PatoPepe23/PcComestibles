<?php
//session_start();
if (!isset($_SESSION['username'])) {
    header('location: /');
}

if (!isset($_SESSION['totalPrice'])) {
    $_SESSION['totalPrice'] = $price;
} else {
    $price = $_SESSION['totalPrice'];
}

?>
<h2>Direccion de envio</h2>
<section class="cart_global_container">
    <div>
        <div>
            <h5>Direccion de envio</h5>
        </div>
        
        <form action="makeTicket" method="POST">
            <?php foreach($_SESSION['directions'] as $direction) { ?>
                <div class="select_direction border m-2 p-2">
                    <input type="radio" name="direction" value=<?= $direction['direccion_ID'] ?> required>
                    <p><?= $direction['nombre'] . ' ' . $direction['apellido'] ?></p>
                    <p><?= $direction['calle'] ?></p>
                    <p><?= $direction['ciudad'] . ' ' . $direction['codigo_postal'] ?></p>
                    <p><?= $direction['estado_provincia'] . ' ' . $direction['pais'] ?></p>
                    <input type="hidden" name=direction_ID value=<?= $direction['direccion_ID'] ?>>
                    <a href=""><button name="delte">Eliminar</button></a>
                </div>
            <?php } ?>
            <input type="hidden" name='page' value=<?= $price ?>>
            <button class="promo-button send_cart">Guerdar y continuar</button>
        </form>
        <a href='addDirection'><button>Añadir otra direccion</button></a>
    </div>

    <div class="cart_resume border">
        
        <p>Subtotal artículos <strong><?= $price ?>€</strong></p>
        <p>Envio estimado PcComestible <strong>Gratis</strong></p>
        <p>Metodo de pago <strong>Efectivo</strong></p>

        <p>-----------------------------------------------</p>

        <div>
            <p>Total (Con impuestos incluidos) <strong> <?= $price ?>€</strong></p>
        </div>

        <form action="" method="POST">

        </form>
    </div>
</section>