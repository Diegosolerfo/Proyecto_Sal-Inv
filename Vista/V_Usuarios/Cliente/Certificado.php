<?php
// Preparación de los certificados
$cert = [];
$i = 1;
$aux = 4;

if (!empty($_POST['d1'])) {
    while (!empty($_POST["d" . $i]) || !empty($_FILES["d" . $i]["name"])) {
        if ($i == $aux && !empty($_FILES["d" . $i]["name"])) {
            $certi_archi = file_get_contents($_FILES['d' . $i]['tmp_name']);
            $cert[$i] = $certi_archi;
            $aux += 4;
        } else {
            $cert[$i] = $_POST["d" . $i];
        }
        $i++;
    }
}
$id_del_usu = new usuario(num_doc_f: $_GET["numero_doc"]);
$rac = $id_del_usu->consultar_usuario_especifi();

if (!empty($rac)) {
    $objeto = new usuario(
        id_usuario_f: $rac[0]["ID_Usuario"],
        datos_certi_f: $cert
    );
    $objeto->Registrar_cert();
}
header("location: Usuario_adm.php");
?>
