<?php

require_once('db.class.php');

if (isset($_POST['like'])) {

	$aux=  " and upper(nome_produto)  LIKE '%". trim( strtoupper($_POST['like']))."%' order by nome_produto asc";
	$sql = " select * from produtos where  id_categoria= 1 and status='Ativo'".$aux;
	
	
}else{
	$sql = " select * from produtos where id_categoria= 1 and status='Ativo' order by nome_produto asc";
}
  




$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
$classe = "btn btn-produtos";
         
         echo"<thead >";

	     echo "<tr>";
	     echo "<th width='20%'>Nome </th>";
	    
	     echo "<th width='25%'  >Broto </th>";
	     echo "<th width='33%' >Média </th>";
	     echo "<th width='50%'  >Grande </th>";
	     echo "<th width='100%' >Gigante </th>";
	     echo "</tr>";
	     echo"</thead>";
	     echo"<tbody>";
	  

while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

	        $valorsabor= floatval ( $registro['preco_produto'] );
	        $broto = (float) $valorsabor;

	        $valorMedia= $valorsabor*1.6; 
	        $media = (float) $valorMedia;  

	        $valorGrande= $valorsabor*2.0; 
	        $grande = (float) $valorGrande; 

	        $valorGigante= $valorsabor*2.5; 
	        $Gigante = (float) $valorGigante; 

            
              
            echo "<tr>";
	         echo"<td style='border-left:8px solid #4040ff' width='20%' >";
            echo "<button  class='btn-prod' name='".$registro['id_categoria'] ."' onclick='adicionaProdutoLista(".$registro['id_produto'].",". $registro['id_categoria'] .") ;'  id='".$registro['id_produto']  . "' >" .$registro['nome_produto'] . "</button>";
		    echo"</td>";
	        echo "<td  id='b".$registro['id_produto'] ."'  value='" . $broto . "' >" ."R$". number_format($broto,2) . "</td>";
			echo "<td  value='" . $media . "' >" ."R$". number_format($media,2). "</td>";
			echo "<td   value='" . $grande . "' >" ."R$". number_format($grande,2). "</td>";
			echo "<td  value='" . $Gigante . "' >" ."R$". number_format($Gigante,2). "</td>"; 
	        echo "</tr>";
               
            echo "<tr>";
            echo "<td colspan='5' style='font-size:12px;'       value='" ."<span>". $registro['id_produto'] ."</span>". "' > Ingredientes: " . $registro['descricao_produto']  . "</td>";
     
		    echo "</tr>";
}

            echo"</tbody>";
	
    
               
               
?>

