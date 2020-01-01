
<?php 


session_start();

require_once('db.class.php');

$tipo = $_POST['tipo'];


$objDb = new db();
$link = $objDb->conecta_mysql();



if ($tipo=="status") {

	$sql_status="select * from sistema where id_sistema=1";
	$resultado_status= mysqli_query($link,$sql_status);
	$registro_status= mysqli_fetch_array($resultado_status);

	if ($registro_status['status_sys']=='a') {
		$sql_altera_status="update sistema 
		set status_sys = 'd' where id_sistema=1 ";
		mysqli_query($link,$sql_altera_status);
		echo "Sistema fechado para pedidos..";
	}else{
		$sql_altera_status="update sistema 
		set status_sys = 'a' where id_sistema=1  ";
		mysqli_query($link,$sql_altera_status);
		echo "Sistema aberto para pedidos..";
	}


}else{
	$sql_altera_hora="update sistema 
		set hora_abertura = '$tipo' where id_sistema=1  ";
		mysqli_query($link,$sql_altera_hora);
		echo "Hora de abertura alterada para ".$tipo;
}








?>