<?php

include_once '../funcoes/bancoDeDados.php';
$conn = conectar();

$cod_prof = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);


$sql = "delete from professores "
        . "where Cod_prof = '$cod_prof'" ;
$conn->beginTransaction();
$retorno = $conn->exec($sql);

if ($retorno == 1){
    $conn->commit();
    header("location:listar.php");
}
else{
    $conn->rollBack();
    echo "Erro no processamento de exclusão";

}