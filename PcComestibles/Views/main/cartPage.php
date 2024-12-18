<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: /');
}

$price = 0;

?>

<section class="cart_global_container">
    <div class="cart_container">
        <?php foreach($_SESSION['cart'] as $product){ 
            $price += $product['cuantity'] * $product['product']->getPrice();
            ?>
        <div class='border cart_card m-4'>
            <img src='/Views/images/<?= $product['product']->getImage()?>' alt='' height='50px' width='50px'>
            <p><?=$product['product']->getName()?></p>
            <div class='cart_buttons'>
                <form action="/cartDecrease" method="POST">
                    <input type="hidden" name='productID' value=<?= $product['product']->getID() ?>>
                    <input type="hidden" name='page' value=<?= $_SERVER['REQUEST_URI']; ?>>
                    <button id='cart_less'>-</button>
                </form>
                <h5><?=$product['cuantity']?></h5>
                <form action="/cartAdd" method="POST">    
                    <input type="hidden" name='productID' value=<?= $product['product']->getID() ?>>
                    <input type="hidden" name='page' value=<?= $_SERVER['REQUEST_URI']; ?>>
                    <button id='cart_plus'>+</button>
                </form>
            </div>
            <form action="/cartRemove" method="POST">
                <input type="hidden" name='productID' value=<?= $product['product']->getID() ?>>
                <input type="hidden" name='page' value=<?= $_SERVER['REQUEST_URI']; ?>>
                <button>borrar</button>
            </form>
            <div>
                <p><?= $product['cuantity'] * $product['product']->getPrice() ?>€</p>
            </div>
        </div>
        <?php } ?>
    </div>
    
    <div class="cart_resume border">

        <p>Subtotal artículos <strong><?= $price ?>€</strong></p>

        <p>-----------------------------------------------</p>
            
        <form action="" method="POST">
            <input type="text" name="discount" placeholder="Codigo de descuento">
            <input type="hidden" name='page' value=<?= $price; ?>>
            <input type="hidden" name='page' value=<?= $_SERVER['REQUEST_URI']; ?>>
            <button type='submid'>Enviar</button>
        </form>

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