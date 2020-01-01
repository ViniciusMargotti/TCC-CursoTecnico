
<?php
session_start();

require_once('db.class.php');

$status = $_POST['status'];
$id_usuario = $_POST['id_usuario'];


$objDb = new db();
$link = $objDb->conecta_mysql();

  if ($status=='I' ) {
    $sql = " update  usuarios
	  set status = 'I'
	     
          where usuarios.id_usuario= ".$id_usuario ; 
  }else{
  	  $sql = " update  usuarios
	  set status ='A'
	     
          where usuarios.id_usuario= ".$id_usuario ; 
  }

    

//executar a query
if(mysqli_query($link, $sql)){
        echo "Alterado com Sucesso";
} else {
		echo 'Erro ao alterar o usuário!';
	}
?>