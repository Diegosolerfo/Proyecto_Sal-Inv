<form action="Inventario_op.php?accion=gua_ped" method="post">
    <h2>Diligencia este formulario para que puedas sacar las herramientas</h2>
    <div>
    <label for="id_herramienta"></label>
    <input type="hidden" name="id_her" value="<?php echo $_GET["id_her"];?>">
    </div>
    <div>
    <label for="cuanto">¿Cuantas herramientas sacaras?</label>
    <input type="number" name="canti_sali" max="<?php echo $_GET["Cantidad"];?>" min="1" required>
    </div>
    <div>
    <label for="devolucion">¿Cuando la devolveras?</label>
    <input type="date" name="fec_ent">
    </div>
    <div>
        <input type="hidden" name="cantidad" value="<?php echo $_GET["Cantidad"];?>">
    </div>
    <div>
        <button name="Pet" value="Gua">Pedir herramienta</button>
    </div>
</form>