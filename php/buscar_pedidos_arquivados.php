<?php 
require_once('db.class.php');

$sql = "SELECT * FROM pedidos where pedidos.data_pedido=' ".$_POST['data']."' and pedidos.status= 'Arquivado' and id_pedido LIKE '%".strtoupper($_POST['like'])."%' limit 0,500   ";


$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);

if (mysqli_num_rows($resultado_id)<=0) {
	echo "<tr>";
	echo "<td>";
	echo "Nenhum pedido encontrado...";
	echo "</td>";
	echo "</tr>";
	die();
}


echo"<thead >";
echo "<tr>";
echo "<th width='16%'>Cód</th>";
echo "<th width='20%'>Data </th>";
echo "<th width='20%'>Hora </th>";
echo "<th width='25%'>Pagamento </th>";
echo "<th width='33%'>Valor total </th>";


echo "<th width='50%'> Detalhes</th>";
echo "<th width='100%'> Excluir </th>";
echo "</tr>";
echo"</thead>";
echo"<tbody>";



while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){


	echo "<tr>";
	echo "<td  style=' font-size: 17px; font-weight:600; text-transform: uppercase;'  value='" . $registro['id_pedido'] . "' >#" . $registro['id_pedido']  . "</td>"; 
	echo "<td  style='  text-transform: uppercase;'  value='" . $registro['id_pedido'] . "' >" . date('d/m/Y ', strtotime($registro['hora_pedido']))    . "</td>"; 
		echo "<td  style='color:orange;  text-transform: uppercase;'  value='" . $registro['id_pedido'] . "' >" . date(' H:i:s', strtotime($registro['hora_pedido']))    . "</td>"; 
	echo "<td  style=' text-transform: uppercase;'>" ."R$ ". number_format($registro['valor_total_pedido'], 2 ) . "</td>"; 
	echo "<td >". $registro['forma_pagamento']   ."</td>";



	echo"<td   >";
	echo "<button style='width:100%;' id='btn-detalhes-pedido' onclick='DetalhesPedido(". $registro['id_pedido'].") ;'class='btn btn-info'>  <i class='material-icons'>assignment</i></button>";
	echo"</td>";

	echo"<td   >";
	echo "<button style='width:100%;'  onclick='AlteracaoPedido(". $registro['id_pedido']." , 4) '; class='btn btn-danger'>  <i class='material-icons'>delete</i></button>";
	echo"</td>";

	echo "</tr>";

	echo"</tbody>";



}              








?>