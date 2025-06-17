<?php
    include "../../../../Modelos/Mod_Inv_Mat.php";
    #var_dump($_POST);
    $posiciones = array();
    $id_mat = array();
    $salida = array();
    $cantidad = array();
    $nombre_mat = array();
    for ($i = 0; $i < count($_POST['id_mat']); $i++) {
        if(!empty($_POST['salida']['ID_SALIDA_'.$i.''])){
            $id_mat[$i] = $_POST['id_mat']['ID_MATERIAL_'.$i.''];
            $salida[$i] = $_POST['salida']['ID_SALIDA_'.$i.''];
            $cantidad[$i] = $_POST['cantidad']['ID_CANTIDAD_'.$i.''];
            $nombre_mat[$i] = $_POST['nombre']['nombre_'.$i.''];
            $posiciones[$i] = $i;
        }
        #echo $i;
    }
    #var_dump($salida);
    #var_dump($nombre_mat);
    #var_dump($posiciones);
    #Guardando los datos en indices correctos desde el 0
    
    echo "<h1>Al producto {$_POST['nom']} se le asignaran los siguientes materiales: </h1>
    <p>Solo falta elegir a el operario que se le daran estos materiales: </p>
    ";
        ?>
        <table>
            <form action="Material_adm.php?accion_mat=guardar_2" method="POST">
                <tr>
                    <th>Nombre Material</th>
                    <th>Salida</th>
                    <th>Cantidad</th>
                    <th>Operador</th>
                </tr>
                <?php
                $objeto2 = new usuario();
                            $respuesta2 = $objeto2->todos_operadores();
                            //var_dump($respuesta2);
                            $i = 0;
                            //echo $nombre_mat[5];
                for ($j = 0; $j<count($_POST['id_mat']); $j++){
                    if(isset($posiciones[$j])){
                        ?>
                        <tr>
                        <td><input type="text"  name="nombre_mat[]" readonly value="<?php echo $nombre_mat[$j]; ?>"></td>
                        <td><input type="number" name="salida[]"     readonly value="<?php echo $salida[$j];     ?>"></td>
                        <td><input type="number" name="cantidad[]"   readonly value="<?php echo $cantidad[$j];   ?>"></td>
                        <td>
                        <select name="operador[]" type="text" required>
                            <option value="" disabled selected>Seleccione un operador</option>
                            <?php
                            foreach ($respuesta2 as $valor) {
                                echo "<option value='{$valor['id_usuario']}'>{$valor['nombre']} {$valor['apellido']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr><input type="text" name="id_mat[]" value="<?php echo $id_mat[$j]; ?>" hidden>
                <?php

                }}
                //var_dump($_POST);
                ?>
                    
                    <input type="hidden" name="id_pro" value="<?php echo $_POST['id_pro']; ?>">
                <button type="submit">Asignar</button>
            </form>
        </table>

        <?php
    
?>