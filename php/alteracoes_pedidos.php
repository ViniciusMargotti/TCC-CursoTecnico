<?php 

require_once('db.class.php');
$id = $_POST['id_pedido'];
$objDb = new db();
$link = $objDb->conecta_mysql();

$acao = $_POST['acao'];

if ($acao=='andamento') {
	
  $sql = " update  pedidos
	  set 	     
	      status = 'Andamento'

          where pedidos.id_pedido = ".$id;

   if(mysqli_query($link, $sql)){
		   echo "Alterado com Sucesso";
          } else { 
          	echo 'Erro ao alterar o Pedido!';
          }
    die();
} 

if ($acao=='finalizado') {
  
  $sql = " update  pedidos
    set        
        status = 'Finalizado'

          where pedidos.id_pedido = ".$id;

   if(mysqli_query($link, $sql)){
       echo "Alterado com Sucesso";
          } else { 
            echo 'Erro ao alterar o Pedido!';
          }
    die();
} 

if ($acao=='arquivado') {
  
  $sql = " update  pedidos
    set        
        status = 'Arquivado'

          where pedidos.id_pedido = ".$id;

   if(mysqli_query($link, $sql)){
       echo "Alterado com Sucesso";
          } else { 
            echo 'Erro ao alterar o Pedido!';
          }
    die();
} 

if ($acao=="delete") {

	 $sql_primary = " delete from itens_pedidos where id_pedido = ".$id; 

   $sql_secondary="delete from pedidos where pedidos.id_pedido = ".$id;

   mysqli_query($link, $sql_primary);
   mysqli_query($link,$sql_secondary);


    die();
	
}


                 










 ?>