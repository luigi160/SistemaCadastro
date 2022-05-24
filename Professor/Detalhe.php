<?php

include_once '../funcoes/bancoDeDados.php';

$conn = conectar();
$id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_STRING);
$sql = "select * from professores where Cod_prof='$id'";

$resultado = $conn -> query($sql);
$sqlDisciplinas = "select * from disciplinas"
        ." where Cod_prof = '$id'";
$resultadoDisciplinas = $conn -> query($sqlDisciplinas);

$linhasProf = $resultado->fetchAll();

$linhasDisc = $resultadoDisciplinas->fetchAll();


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
       // $linhasProf = $resultado->fetchAll();

if(count($linhasProf)==1) {
    foreach($linhasProf as $registro){
        foreach($registro as $campo=>$valor){
                echo "$campo = $valor <br>";
        }

}
echo "<hr>";

    
    foreach($linhasDisc as $registro) {
        foreach($registro as $campo=>$valor) {
            echo "$campo = $valor <br>";
        }
        echo "<br>";
    }
  }

else {
    echo "Erro de execução";
    die();
}
        
        ?>
        
        
    </body>
</html>
