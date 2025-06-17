<section>
    <form action="Usuario_adm.php?accion=Cert&numero_doc=<?php echo $_GET['numero_doc']?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <h5>Datos de los certificados</h5>
            <table id="tabla_certi">
                <tr>
                    <!-- Nombre del certificado -->
                    <td><label for="Nombre_de_cer" class="form_multi_l">Nombre</label></td> 
                    <!-- Organizacion -->
                    <td><label for="Organizacion" class="form_multi_l">Organizacion</label></td> 
                    <!-- Fecha Expedicion -->
                    <td><label for="Fecha_Expedicion" class="form_multi_l">Fecha Expedicion</label></td> 
                    <!-- Certificado archivo -->
                    <td><label for="Certificado" class="form_multi_l">Certificado</label></td>  
                </tr>
                <tr>
                    <!-- Nombre del certificado -->
                    <td><input type="text" name="d1" id="Nombre_de_cer" minlength="3"></td> 
                    <!-- Organizacion -->
                    <td><input type="text" name="d2" id="Organizacion" minlength="3"></td> 
                    <!-- Fecha Expedicion -->
                    <td><input type="date" name="d3" id="Fecha_Expedicion" min="1950-01-01" max="2024-12-31"></td> 
                    <!-- Certificado archivo -->
                    <td><input type="file" name="d4" id="Certificado"></td> 
                </tr>
            </table>
        </fieldset>
        <div>
            <button type="button" onclick="AgregarCerti();" >Agregar certificado</button>
            <button type="button" onclick="eliminar_cert();">Eliminar certificado</button>
        </div>
        </article>
            <!-- El boton de registro -->
            <div class="btn_ing">
                <label for="boton" class="botoncito">
                    <button type="submit">Registrar Certificado</button>
                    <button type="submit" name="Reg_Usu" value="Sin_Cer">No tiene certificados</button>
                </label>
            </div>
    </form>
<script src="com_adm_c.js"></script>