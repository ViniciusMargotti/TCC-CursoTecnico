<?php

require_once('db.class.php');

$tipo=$_POST['tipo'];

$sql = "SELECT * FROM produtos where produtos.id_categoria=".$tipo." and upper(nome_produto) LIKE '%". trim(strtoupper($_POST['like'])) ."%' ORDER by produtos.nome_produto ASC  ";

$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
$classe = "btn btn-produtos";



echo"<thead style='background: rgba(0,0,0,0.1);color:white;' >";
echo "<tr>";
echo "<th style='color:white;' width='20%' >Nome </th>";
echo "<th style='color:white;' width='25%'>Preço </th>";
echo "<th style='color:white;' width='33%' >Status </th>";
echo "<th style='color:white;' width='50%' >Editar </th>";
echo "<th style='color:white;' width='100%' >Apagar </th>";
echo "</tr>";
echo"</thead>";
echo"<tbody>";
$categoria=0;


while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){


   

	echo "<tr>";
	echo "<td  style=' color:text-transform: uppercase;'  value='" . $registro['id_produto'] . "' >" . $registro['nome_produto'] . "</td>"; 
	echo "<td  style=' color:text-transform: uppercase;'  value='" . $registro['id_produto'] . "' >" ."R$ ". number_format($registro['preco_produto'], 2 ) . "</td>"; 
	echo "<td >". $registro['status']   ."</td>";
	echo"<td   >";
	echo "<button  onclick='BuscaInformacoesProduto(". $registro['id_produto'].") ;' data-toggle='modal' href='#myModalEdit' class='btn btn-info ' name='".$registro['id_categoria'] ."'>  <i class='material-icons'>edit</i></button>";
	echo"<td   >";
	echo "<button  onclick='DeletaProduto(". $registro['id_produto'].") ;'class='btn btn-danger '>  <i class='material-icons'>delete</i></button>";
	echo"</td>";
	echo"</td>";	
	echo "</tr>";

	echo"</tbody>";
	

}              

?>

