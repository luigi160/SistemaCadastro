<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title></title>
    </head>
    
    <body>
        <a href ="novoProfessor.php"> Adicionar novo professor </a>
    </body>   
    

    <table class ="table table-bordered border-primary">
        <thead> 
            <tr> 
                <td> Codigo </td>
                <td> Nome </td>
                <td> CPF </td>
                
                <th span ="3"> Editar </th> 
                 <th span ="3"> Detalhe </th> 
                  <th span ="3"> Excluir </th> 
            </tr>    
        </thead>  
    <tbody>
        
    
        <?php
        include_once '../funcoes/bancoDeDados.php';
        // conectara ao BD
        $conn = conectar();
        
        // listar todos os professores 
        
        $sql = "select * from professores";
        
        // ordena a execução do comando sql acima
        
        $resultado = $conn-> query($sql);
        
       
        // convertendo o resultado em um vetor 
        
        
        $linhas = $resultado ->fetchAll();
       
       foreach($linhas as $registro) {
           
           echo "<tr>";
                echo "<td>";
                echo $registro ["Cod_prof"];
                echo "</td>";
                echo "<td>";
                echo $registro ["Nome"];
                echo "</td>";
                echo "<td>";
                echo $registro ["CPF"];
                echo "</td>";
                echo "<td> <a href='Editar.php?id=".$registro['Cod_prof']."'> Editar </a> </td>";
                echo "<td> <a href='Detalhe.php?id=".$registro['Cod_prof']."'> Detalhe </a> </td>";
                echo "<td> <a href='excluir.php?id=".$registro['Cod_prof']."'> Excluir </a> </td>";
                
                
                
       echo "</tr>";
       
       
       
       }
        ?>
    </tbody>
    </table>
</html>
