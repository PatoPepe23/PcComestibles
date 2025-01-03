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
<div id="div3">
    
</div>
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
<script src="Views/JS/adminPanel.js"></script>
<script src="Views/JS/adminPanelProducts.js"></script>
<script src="Views/JS/adminPanelCarts.js"></script>