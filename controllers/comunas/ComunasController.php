<?php
include "../../modelos/Comunas/Comunas.php";
$id_region = $_POST['id_region'];
echo "<select class='form-control' name='guardarComuna' id='guardarComuna'>";
echo "<option value='-1'>Seleccione Comuna...</option>";
foreach (Comunas::getComunasByRegion($id_region) as $objComuna){
    echo "<option value='".$objComuna->getId()."'>".utf8_encode($objComuna->getNombre())."</option>";
}
echo "</select>";

