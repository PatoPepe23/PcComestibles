<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location: /');
}
?>

<form action="/register/register" method="POST">
    <?php
    if (isset($found)) {
        if ($found == True) {
            echo '<p>El usuario ya existe</p>';
        }
    }
    ?>
    <div>
        <label for="user">usuario</label>
        <input type="text" name="user" id="user" required>
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
    </div>
    <?php
    if (isset($no_match)) {
        if ($no_match == True) {
            echo '<p>Las contraseñas no coinciden</p>';
        }
    }
    ?>
    <div>
        <label for="password-verify">Repite la Contraseña</label>
        <input type="password" name="password-verify" id="password-verify" required>
    </div>
    <div>
        <input type="submit" name="" id="">
    </div>
</form>

<div>
    <p>Ya tienes una cuenta?</p>
    <a href="/login">Iniciar Sesion</a>
</div>