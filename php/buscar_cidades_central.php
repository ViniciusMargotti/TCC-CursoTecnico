<?php

require_once('db.class.php');

$sql = "SELECT * FROM cidades  ORDER BY cidades.nome_cidade ASC ";

$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
$classe = "btn btn-produtos";



echo"<thead >";
echo "<tr>";
echo "<th width='25%'>Cidade </th>";
echo "<th style='text-align:center;'  width='33%'>uf </th>";
echo "<th style='text-align:center;' width='50%'>Editar </th>";
echo "<th style='text-align:center;' width='100%'>Bairros </th>";


echo "<th width='100%' >On/Off </th>";

echo "</tr>";
echo"</thead>";
echo"<tbody>";
$teste='cidade';


while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

	echo "<tr>";
	echo "<td  style=' color:text-transform: uppercase;'  value='" . $registro['id_cidade'] . "' >" . $registro['nome_cidade'] . "</td>"; 
	echo "<td style='text-align:center;' >". $registro['uf']   ."</td>";

	echo"<td   >";
	echo "<button style='width:100%;' data-toggle='modal' href='#myModalEdit' onclick='BuscaInformacoesCidade(".$registro['id_cidade'].") ;'class='btn btn-info'>  <i class='material-icons'>edit</i></button>";
	echo"</td>";

	echo"<td   >";
	echo "<button style='width:100%;' onclick='BuscaBairros(". $registro['id_cidade'].") ;'class='btn btn-success'>  <i class='material-icons'>assignment</i></button>";
	echo"</td>";

	if ($registro['status_cidade']=='ativo') {

		echo "<td style='padding-top:25px;' > 
		<!-- Rounded switch -->
		<label class='switch'>
		<input   type='checkbox' checked='checked' value='ativo' onchange=\"AlteracaoEnderecos({$registro['id_cidade']}, 'cidade');\" >
		<span class='slider round'></span>
		</label>  </td>";
	}else{
		echo"</td>";
		echo "<td style='padding-top:25px;' > 
		<!-- Rounded switch -->
		<label class='switch'>
		<input    onchange=\"AlteracaoEnderecos({$registro['id_cidade']}, 'cidade');\" type='checkbox' >
		<span class='slider round'></span>
		</label>  </td>";
	}



	echo "</tr>";

	echo"</tbody>";
	

}              

?>

