<form action="Usuario_adm.php?accion=Expe&numero_doc={<?php echo $_GET['numero_doc']; ?>}" method="post">
        <h2>Registro de usuario existoso, ¿quiere agregar experiencias?</h2>
            <table id="tabla_expe">
                <tr>
                    <!-- Nombre empresa -->
                    <td><label for="nombre_empresa" class="form_multi_l">Nombre empresa</label></td> 
                    <!-- Cargo -->
                    <td><label for="cargo_en_la_empresa" class="form_multi_l">Cargo</label></td> 
                    <!-- Fecha Inicio -->
                    <td><label for="fecha_inicio_expe" class="form_multi_l">Fecha Inicio</label></td> 
                    <!-- Fecha Fin -->
                    <td><label for="fecha_fin_expe" class="form_multi_l">Fecha Fin</label></td> 
                    <!-- Observaciones -->
                    <td><label for="observaciones" class="form_multi_l">Observaciones</label></td>
                    <!-- telefono de contacto -->
                    <td><label for="telefono_de_contacto" class="form_multi_l">Telefono</label></td> 
                    <!-- Nombre de contacto -->
                    <td><label for="nombre_de_cantacto" class="form_multi_l">Nombre de contacto</label></td> 
                </tr>
                <tr>
                    <!-- Nombre empresa -->
                    <td><input type="text" name="n1" id="nombre_empresa" minlength="3" class="form_multi-i"></td> 
                    <!-- Cargo -->
                    <td><input type="text" name="n2" id="cargo_en_la_empresa" minlength="3" class="form_multi-i"></td> 
                    <!-- Fecha Incio -->
                    <td><input type="date" name="n3" id="fecha_inicio_expe" min="1950-01-01" max="2024-12-31" class="form_multi-i"></td> 
                    <!-- Fecha Fin -->
                    <td><input type="date" name="n4" id="fecha_fin_expe" min="1950-01-01" max="2024-12-31" class="form_multi-i"></td> 
                    <!-- Observaciones -->
                    <td><textarea name="n5" id="observaciones" cols="10" rows="1" class="form_multi-i"></textarea></td>
                    <!-- Telefono -->
                    <td><input type="number" name="n6" id="telefono_de_contacto" min="3000000000" max="6999999999" class="form_multi-i"></td>
                    <!-- Nombre de contacto -->
                    <td><input type="text" name="n7" id="nombre_de_cantacto" minlength="3" class="form_multi-i"></td> 
                </tr>
            </table>
        <div>
            <button type="button" onclick="AgregarExpe();">Agregar experiencia de trabajo</button>
            <button type="button" onclick="eliminar_expe();">Eliminar una experiencia</button>
        </div>
        <div>
            <button type="submit">Registrar la experiencia</button>
            <button type="submit" name="Reg_Usu" value="Sin_Exp">No tiene experiencia</button>
        </div>
    </form>
    <script src="com_adm.js"></script>