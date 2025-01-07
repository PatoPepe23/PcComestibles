<form action="/addNewDirection" method="POST">
    <input type="text" name="name" placeholder="Nombre">
    <input type="text" name="surname" placeholder="Apellidos">
    <input type="text" name="address" placeholder="Calle">
    <input type="text" name="city" placeholder="Ciudad">
    <input type="text" name="postalCode" placeholder="Codigo Postal">
    <input type="text" name="state" placeholder="Estado/Provincia">
    <input type="text" name="country" placeholder="Pais">
    <input type="hidden" name='page' value=<?= $_SERVER['REQUEST_URI']; ?>>
    <button type="submit">Enviar</button>
</form>