<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: /');
} else {
    if ($_SESSION['range'] != 1) {
        header('location: /');
    }
}
?>

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div id="div1">
            <h2>Users</h2>
            <table id="usersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>UserName</th>
                        <th>Range</th>
                    </tr>
                </thead>
                <tbody>
                    <!--<script src="Views/JS/adminPanel.js"></script>-->
                </tbody>
            </table>
        </div>
    </div>
    <div class="carousel-item">
        <button data-modal-target="#modal-parent">Crear</button>
        <div class="modal-parent" id="modal-parent">
            <div class="modal-header">
                <div class="title">Crear Producto</div>
                <button data-close-button class="close-button">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" class="createProductForm">
                    <input type="text" name="name" id="name" placeholder="Nombre">
                    <input type="number" name="price" id="price" placeholder="Precio">
                    <input type="number" name="last-price" id="last_price" placeholder="Precio anterior">
                    <input type="text" name="image" id="image" placeholder="Imagen">
                    <input type="text" name="type" id="type" placeholder="Tipo">
                    <input type="number" name="promo" id="promo" placeholder="Promocion">
                    <button id="createProductButton" type="submit">Crear</button>
                </form>
            </div>
        </div>
        <div id="overlay"></div>


        <div id="div2">
            <table id="productsTable">
            <h2>Products</h2>
            <thead>
                <tr>
                    <th>Product_ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Old_Price</th>
                    <th>image</th>
                    <th>Type</th>
                    <th>Promo</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        </div>
    </div>
    <div class="carousel-item">
        <table id="cartTable">
            <h2>Pedidos</h2>
            <thead>
                <tr>
                    <th>User_ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
  </div>
  <button class="carousel-control-prev admin_buton_left" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next admin_buton_right" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<script src="Views/JS/adminPanel.js"></script>
<script src="Views/JS/adminPanelProducts.js"></script>
<script src="Views/JS/adminPanelCarts.js"></script>