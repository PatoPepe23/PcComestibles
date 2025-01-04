<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: /');
}

?>
<h2>Direccion de envio</h2>
<section class="cart_global_container">
    <div>
        <h5>Direccion de envio</h5>
    </div>
    <div class="cart_resume border">

        <p>Subtotal artículos <strong><?= $price ?>€</strong></p>

        <p>-----------------------------------------------</p>

        <?php
        if ($type == 0) {
            $price = $price*$discount;
        } elseif ($type == 1){
            $price = $price - $discount;    
        }
        ?>

        <div>
            <p>Total (Con impuestos incluidos) <strong> <?= $price ?>€</strong></p>
        </div>

        <form action="" method="POST">
            <input type="hidden" name='page' value=<?= $price ?>>
            <button class="promo-button send_cart">Realizar pedido</button>
        </form>
    </div>
</section>