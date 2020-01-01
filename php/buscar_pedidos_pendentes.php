<?php 
require_once('db.class.php');

$sql = "SELECT * FROM pedidos where pedidos.status= 'Pendente' and id_pedido LIKE '%".strtoupper($_POST['like'])."%'  ";

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
echo "<th width='16%' >Cód</th>";
echo "<th width='20%' >Data </th>";
echo "<th width='20%' >Hora </th>";
echo "<th width='25%' style='text-align:left;' > Pagamento </th>";
echo "<th width='33%' >Valor total </th>";

echo "<th width='50%' style='text-align:center;' >Detalhes </th>";
echo "<th width='100%'  style='text-align:center;'>Andamento </th>";
echo "</tr>";
echo"</thead>";
echo"<tbody>";

$teste="'andamento'";

while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){


	echo "<tr>";
	echo "<td  style='  text-transform: uppercase; font-size:17px; font-weight:600;'  value='" . $registro['id_pedido'] . "' >#" . $registro['id_pedido']  . "</td>"; 
	echo "<td  style='  text-transform: uppercase;'  value='" . $registro['id_pedido'] . "' >" . date('d/m/Y', strtotime($registro['hora_pedido']))    . "</td>"; 
	echo "<td  style=' color:orange;  text-transform: uppercase;'  value='" . $registro['id_pedido'] . "' >" . date('H:i:s', strtotime($registro['hora_pedido']))    . "</td>"; 
	
	echo "<td >". $registro['forma_pagamento']   ."</td>";
	echo "<td  style='color: text-transform: uppercase;'>" ."R$ ". number_format($registro['valor_total_pedido'], 2 ) . "</td>"; 

	echo"<td   >";
	echo "<button style='width:100%;' title='Detalhes' id='btn-detalhes-pedido' onclick='DetalhesPedido(". $registro['id_pedido'].") ;'class='btn btn-info'>  <i class='material-icons'>assignment</i></button>";
	echo"</td>";

	echo"<td width='100%;'  >";
	echo "<button style='width:100%; ' title='Pedidos em Andamento' onclick='AlteracaoPedido(". $registro['id_pedido']." , 1) ';  class='btn btn-success'>  <i class='material-icons'>done</i></button>";
	echo"</td>";



	echo "</tr>";

	echo"</tbody>";



}              








?>