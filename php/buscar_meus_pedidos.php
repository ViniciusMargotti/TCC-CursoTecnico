<?php 
require_once('db.class.php');
session_start();

$tipo= $_POST['tipo'];


if ($tipo=='pendentes') {
	$sql = "SELECT * FROM pedidos where id_usuario= ".$_SESSION['id_usuario']." and status='Pendente' order by hora_pedido desc";
}

if ($tipo=='andamento') {
	$sql = "SELECT * FROM pedidos where id_usuario= ".$_SESSION['id_usuario']." and status='Andamento' order by hora_pedido desc";
}

if ($tipo=='finalizados') {
	$sql = "SELECT * FROM pedidos where id_usuario= ".$_SESSION['id_usuario']." and status='Finalizado' or id_usuario= ".$_SESSION['id_usuario']." and status='Arquivado' order by hora_pedido desc";
}



$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);



if (mysqli_num_rows($resultado_id)==0) {
	echo "<h3> Nenhum Pedido.. <h3>";
	die();
}

echo"<thead >";
echo "<tr>";
echo "<th width='25%' style='text-align:center;'>Código</th>";
echo "<th width='25%'>Data/Hora </th>";
echo "<th width='25%' style='text-align:center;'>Valor total </th>";
echo "<th width='25%' style='text-align:center;'>Taxa Entrega </th>";
echo "<th width='30%' style='text-align:center;'>Detalhes </th>";

echo "</tr>";
echo"</thead>";
echo"<tbody>";

$teste="'andamento'";

while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){


	echo "<tr>";
	echo "<td   style=' text-transform: uppercase; text-align:center;'>#" . $registro['id_pedido'] . "</td>"; 
	echo "<td  style='  text-transform: uppercase;'  value='" . $registro['id_pedido'] . "'  >" . date('d/m/Y H:i:s', strtotime($registro['hora_pedido']))    . "</td>"; 
	echo "<td   style=' text-transform: uppercase; text-align:center;'>" ."R$ ". number_format($registro['valor_total_pedido'], 2 ) . "</td>"; 

	echo "<td   style=' text-transform: uppercase; text-align:center;'>" ."R$ ". number_format($registro['taxa_entrega'], 2 ) . "</td>"; 


	echo"<td>";
	echo "<button style='width:100%;' title='Detalhes' id='btn-detalhes-meus-pedidos' onclick='DetalhesMeusPedidos(". $registro['id_pedido'].") ;'class='btn btn-warning'>  <i class='material-icons'>assignment</i></button>";
	echo"</td>";




	echo "</tr>";

	echo"</tbody>";



}              








?>