<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location: /');
}
?>

<div class="login-form">
    <form class="border" action="/login/revision" method="POST">
    <?php
    if (isset($found)) {
        if ($found == True) {
            echo '<p>Usuario o contraseña no validos</p>';
        }
    }
    ?>
        <div class="login-info">
            <input type="text" name="user" id="user" placeholder="Usuario" required>
        </div>
        <div class="login-info">
            <input type="password" name="password" id="password" placeholder="Contraseña" required>
        </div>
        <div>
            <input type="submit" name="" id="">
        </div>
    </form>

    <div>
        <p>No tienes cuenta?</p>
        <a href="/register">Registrarse</a>
    </div>
</div>