<?php

$price = $_SESSION['totalPrice'];
$directions = $_SESSION['directions'];
$directionSelected = $_POST['direction'];

?>

<h5>Resumen de la compra</h5>
<div class="cart_resume_container">
        <div class="div_card_resume">
            <?php foreach($_SESSION['cart'] as $product){ ?>
            <div class='border cart_resume m-4'>
                <img src='/Views/images/<?=$product['product']->getImage()?>' class='' alt='...' height="100px" width="100px">
                <p><?=$product['product']->getName()?></p>
                <div class='cart_buttons'>
                    <h5>Cantidad <?=$product['cuantity']?></h5>
                </div>
                <div>
                    <p><?= $product['cuantity'] * $product['price']?>€</p>
                </div>
            </div>
            <?php } ?>
        </div>

        <div>
            <h5>Direccion de envio</h5>
            <?php foreach ($directions as $direction) { 
                if ($direction['direccion_ID'] == $directionSelected) { ?>
                    <div>
                        <p><?= $direction['nombre'] . ' ' . $direction['apellido'] ?></p>
                        <p><?= $direction['calle'] ?></p>
                        <p><?= $direction['ciudad'] . ' ' . $direction['codigo_postal'] ?></p>
                        <p><?= $direction['estado_provincia'] . ' ' . $direction['pais'] ?></p>
                    </div>
                <?php }
            } ?>

            <div class="border">
                <p>Subtotal artículos <strong><?= $price ?>€</strong></p>
                <p>Envio estimado PcComestible <strong>Gratis</strong></p>
                <p>Metodo de pago <strong>Efectivo</strong></p>
                <p>-----------------------------------------------</p>
                <div>
                    <p>Total (Con impuestos incluidos) <strong> <?= $price ?>€</strong></p>
                </div>
                <form action="makeOrder" method="POST">
                    <input type="hidden" name="direction_ID" value=<?= $directionSelected ?>>
                    <button class="promo-button">Confirmar Compra</button>
                </form>
            </div>
        </div>
</div>