<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="incluir.php">
            Codigo: <input type="text" name="cod_prof" value="" /> </br>
           Nome: <input type="text" name="nome" value="" /> </br>
           CPF: <input type="text" name="cpf" value="" /></br>
           RG: <input type="text" name="rg" value="" /></br>
           Data de Nascimento: <input type="date" name="nascimento" value="" /></br>
           Sexo: <select name="">
               <option value ="M"> Masculino </option>
               <option value ="F"> Feminino </option>
               
           </select></br>
           Salário: <input type="text" name="salario" value="" /></br>
           
          <input type="submit" value="Enviar Dados" name="enviar"/>
            
        </form>
        <?php
        
        ?>
    </body>
</html>
