<?php

require_once('db.class.php');

if (isset($_POST['like'])) {

	$aux=  " and upper(nome_produto)  LIKE '%".strtoupper($_POST['like'])."%' order by nome_produto asc";
	$sql = " select * from produtos where id_categoria= 2".$aux;
	
	
}else{
	$sql = " select * from produtos where id_categoria= 2 order by nome_produto asc";
}
  
$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
$classe = "btn btn-primary";
  
         echo"<thead>";
	     echo "<tr>";
	     echo "<th style='text-align:left;' width='50%;'>Nome  </th>";
	     echo "<th width='100%;'>Preço </th>";
	
	    
	     echo "</tr>";
	     echo"</thead>";
	     echo"<tbody>";
	    

        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
        	echo "<tr width='100%;' >";
				echo"<td style='border-left:8px solid #4040ff' align='left'   >";
            echo "<button class='btn-prod' name='".$registro['id_categoria'] ."' onclick='adicionaProdutoLista(".$registro['id_produto'].",". $registro['id_categoria'] .") ;'  id='".$registro['id_produto']  . "' >" .$registro['nome_produto'] . "</button>";
			echo"</td>";	
			echo "<td  value='" . $registro['preco_produto'] . "' >" ."R$". number_format($registro['preco_produto'],2) . "</td>";
		
            echo "</tr>";
            
             echo "<tr width='100%;' >";
            echo "<td  colspan='2' style='font-size:12px;'  value='" ."<span>". $registro['id_produto'] ."</span>". "' >" ."Ingredientes: ". $registro['descricao_produto']  . "</p>";
            echo "</td>";
             echo "</tr>";
		}
            echo"</tbody>";
?>

