<?php

require_once('db.class.php');

//Controller para receber via GET o valor do id do estado
     
$sql = " select * from produtos where id_categoria= 4 and status='Ativo' order by nome_produto asc";

  
  



$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
$classe = "btn btn-primary";
  
         echo"<thead>";
	     echo "<tr>";
	     echo "<th width='10%'>Adicional </th>";
	     echo "<th width='33%' style='text-align:center;'>Descrição </th>";
	     echo "<th width='34%' style='text-align:center;'>Preço </th>";
	     echo "</tr>";
	     echo"</thead>";
	     echo"<tbody>";
	    

         while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
        	echo "<tr>";
		echo"<td style='border-left: 8px solid #ffa500;'>";
         echo "<button class='btn-prod' name='".$registro['id_categoria'] ."' onclick='adicionaProdutoLista(".$registro['id_produto'].",". $registro['id_categoria'] .") ;'  id='".$registro['id_produto']  . "' >" . $registro['nome_produto']  . "</button>";
		echo"</td>";
		echo "<td  style='text-align:center;'   value='" . $registro['id_produto'] . "' >" . $registro['descricao_produto'] . "</td>";
              
			echo "<td style='text-align:center;'  value='" . $registro['preco_produto'] . "' >" ."R$". number_format($registro['preco_produto'],2). "</td>";
			
			
         echo "</tr>";
        }
         echo"</tbody>";
	
    
               
               
?>

