<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../funcoes/bancoDeDados.php';
$conn = conectar();

$cod_prof = filter_input(INPUT_GET, "cod_prof", FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_GET, "rg", FILTER_SANITIZE_STRING);
$nascimento = filter_input(INPUT_GET, "nascimento", FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_GET, "cpf", FILTER_SANITIZE_STRING);
$salario = filter_input(INPUT_GET, "salario");
$sexo = filter_input(INPUT_GET, "sexo", FILTER_SANITIZE_STRING);

$sql = "Insert into professores (Cod_prof, Nome, Sexo, RG, Nascimento, CPF, Salario)"
        . " value ('$cod_prof','$nome','$sexo','$rg', '$nascimento', '$cpf', $salario);";
try {
    $conn->beginTransaction();
    $retorno = $conn->exec($sql);
   

        if($retorno == 1) {
            $conn->commit();
            header ("location:listar.php");
             
        }
        
        else {
            $conn->rollBack();
            echo "Erro no processamento de inclusão";
            
        }
        
} catch(Exception $exc){
    $conn->rollBack();
    $mensagem = $exc->getMessage();
    
    if(str_contains("Duplicate entry",$mensagem)!= -1){
        
        $mensagemErro = "O código do professor já está em uso.";
        header("location:novoProfessor.php?"
                . "cod_prof=$cod_prof"
                . "&nome = $nome"
                . "&rg=$rg"
                . "&nascimento=$nascimento"
                . "&cpf=$cpf"
                . "&salario=$salario"
                . "&sexo=$sexo"
                . "&mensagem=$mensagemErro");
    }
}

