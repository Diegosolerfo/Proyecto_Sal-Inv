<h3>Consultar Usuarios</h3>
<form action="../../../Controladores/Usuario/Con_Usuario.php?ti_con=Con_G_U" method="post">
    <button type="submit">Todos los usuarios</button>
</form>
<form action="../../Controladores/Usuario/Con_Usuario.php?ti_con=Con_E_U" method="post">
    <h3>Consulta de un usuario</h3>
    <label for="numero de documento">
        <legend>Numero de documento</legend>
        <input type="number" name="num_doc" min="10000000" max="999999999999" required>
    </label>
    <button type="submit">Buscar</button>
</form>