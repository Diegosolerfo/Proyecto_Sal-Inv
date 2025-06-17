<?php
    // Consulta específica del administrador y del operador que muestra las experiencias
$objeto = new usuario(id_usuario_f: $_GET["id_usuario"]);
$respuesta = $objeto->consultar_experiencia();
?>
<section>
    <form action="Usuario_adm.php" method="post">
        <table>
            <tr>
                <th>CODIGO USUARIO:</th>
                <th>NOMBRE EMPRESA:</th>
                <th>CARGO:</th>
                <th>FECHA INICIO:</th>
                <th>FECHA FIN:</th>
                <th>FECHA FIN:</th>
                <th>TELEFONO EMPRESA:</th>
                <th>NOMBRE DE CONTACTO:</th>
            </tr>
            <?php
            $i=1;
            foreach ($respuesta as $valor) {
                echo "
                    <tr>
                        <td><input type='number' readonly name='n'".$i++." value='{$valor['Codigo_Usuario']}'></td>
                        <td><input type='text' name='n'".$i++." value='{$valor['Nombre_Empresa']}'></td>
                        <td><input type='text' name='n'".$i++." value='{$valor['Cargo']}'></td>
                        <td><input type='date' name='n'".$i++." value='{$valor['Fecha_Inicio']}'></td>
                        <td><input type='date' name='n'".$i++." value='{$valor['Fecha_Fin']}'></td>
                        <td><input type='number' name='n'".$i++." value='{$valor['Telefono_empresa']}'></td>
                        <td><input type='text' name='n'".$i++." value='{$valor['Nombre_Contacto']}'></td>
                    </tr>
                    ";
            }
            ?>
        </table>
        <div>
            <button type="sumbit">Guardar cambios</button>
        </div>
    </form>
</section>