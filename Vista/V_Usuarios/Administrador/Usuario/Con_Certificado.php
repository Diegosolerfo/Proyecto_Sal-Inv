<?php
    $objeto = new usuario(id_usuario_f: $_GET["id_usuario"]);
    $respuesta = $objeto->consultar_certificado();
?>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    input[type="text"], input[type="number"], input[type="file"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }
</style>
<section>
    <form action="Usuario_adm.php?accion=act_cert" method="POST" enctype="multipart/form-data">
  <table>
    <tr>
      <th>ID_Usuario</th>
      <th>Certificado</th>
      <th>Organización</th>
      <th>Fecha</th>
      <th>Imagen</th>
    </tr>
    <?php
    $i = 0;
    foreach ($respuesta as $valor) {
        // Escapar para seguridad
        $nombre       = htmlspecialchars($valor['Nombre_Certificado']);
        $organizacion = htmlspecialchars($valor['Organizacion_Emisora']);
        $fecha        = htmlspecialchars($valor['Fecha_Expedicion']);
        $base64img    = base64_encode($valor['Certificacion']);
        $valor_2 = $base64img;
        // 1) Nombre
        echo "<tr>";
        echo "
        <td><input type='text' name='n{$i}' readonly value='{$valor['Codigo_Usuario']}'></td> ". $i++ ."
        <td><input type='text' name='n{$i}' value='{$nombre}'></td>";
        $i++;
        // 2) Organización
        echo "<td><input type='text' name='n{$i}' value='{$organizacion}'></td>";
        $i++;
        // 3) Fecha
        echo "<td><input type='date' name='n{$i}' value='{$fecha}'></td>";
        $i++;
        // 4) Imagen actual + subida de nueva + hidden con actual en base64
        echo "<td>
                <p>Imagen actual:</p>
                <img height='120' src='data:image/png;base64,{$base64img}'>
                <br>
                <label>Subir nueva:</label>
                <input type='file' name='n{$i}' accept='image/*'>
                <input type='hidden' name='n{$i}' value='{$base64img}'>
            </td>";
        $i++;
        echo "</tr>";
    }
    ?>
  </table>
  <button type="submit">Guardar cambios</button>
</form>
</section>