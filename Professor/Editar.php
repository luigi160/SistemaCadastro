<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

include_once '../funcoes/bancoDeDados.php';

$conn = conectar();
$id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_STRING);
$sql = "select * from professores where Cod_prof='$id'";
$resultado = $conn -> query($sql);
$linhas = $resultado ->fetchAll();
$registro = $linhas[0];

        
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1> Edição de Professor </h1>
        <form action="atualizar.php">
            
            Codigo: <input type="text" name="cod_prof" readonly="" value="<?= $registro ['Cod_prof']?>" /> </br>
           Nome: <input type="text" name="nome" value="<?= $registro ['Nome']?>" /> </br>
           CPF: <input type="text" name="cpf" value="<?= $registro ['CPF']?>" /> </br>
           RG: <input type="text" name="rg" value="<?= $registro ['RG']?>" /> </br>
           Data de Nascimento: <input type="text" name="nascimento" value="<?= $registro ['Nascimento']?>" /> </br>
           Sexo: <select name="">
               <option value ="M" selected="selected"> Masculino </option>
                <?=
                        
                        $registro["Sexo"] == "M" ? "selected" : "";
                        
                ?>
               <option value ="F" selected="selected"> Feminino </option>
               
               <?=
                        
                        $registro["Sexo"] == "F" ? "selected" : "";
                        
                ?>
               
               
           </select></br>
           
           Salário: <input type="text" name="salario" value="<?= $registro ['Salario']?>" /> </br>
          <input type="submit" value="Enviar Dados" name="enviar"/>
            
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
