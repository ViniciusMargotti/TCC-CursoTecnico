<?php

require_once('db.class.php');

$id_cidade = $_POST['id'];

$sql = "SELECT * FROM bairros,cidades where  cidades.id_cidade= bairros.id_cidade and bairros.id_cidade='$id_cidade' ORDER BY bairros.nome_bairro ASC ";

$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
$classe = "btn btn-produtos";



echo"<thead >";
echo "<tr>";
echo "<th width='20%'>Bairro </th>";
echo "<th style='text-align:center;' width='25%'>Cidade </th>";
echo "<th style='text-align:center;' width='33%'>Taxa </th>";
echo "<th style='text-align:center;' width='50%'>Editar </th>";
echo "<th width='100%' >On/Off </th>";

echo "</tr>";
echo"</thead>";
echo"<tbody>";



while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

	echo "<tr>";
	echo "<td  value='" . $registro['id_bairro'] . "' >" . $registro['nome_bairro'] . "</td>"; 
	echo "<td style='text-align:center;' >". $registro['nome_cidade']   ."</td>";
	echo "<td style='text-align:center;' >R$". number_format($registro['taxa_entrega'],2)   ."</td>";
	echo"<td   >";
	echo "<button style='width:100%;' data-toggle='modal' href='#myModalEdit' onclick='BuscaInformacoesBairro(".$registro['id_bairro'].") ;'class='btn btn-info'>  <i class='material-icons'>edit</i></button>";
	echo"</td>";

	if ($registro['status_bairro']=='ativo') {
		echo"</td>";
		echo "<td style='padding-top:25px;' > 
		<!-- Rounded switch -->
		<label class='switch'>
		<input   type='checkbox' checked='checked' onchange=\"AlteracaoEnderecos({$registro['id_bairro']}, 'bairro');\" );'>
		<span class='slider round'></span>
		</label>  </td>";
	}else{
		echo"</td>";
		echo "<td style='padding-top:25px;' > 
		<!-- Rounded switch -->
		<label class='switch'>
		<input   type='checkbox' onchange=\"AlteracaoEnderecos({$registro['id_bairro']}, 'bairro');\" );'>
		<span class='slider round'></span>
		</label>  </td>";
	}

	echo "</tr>";

	echo"</tbody>";
	

}              

?>

