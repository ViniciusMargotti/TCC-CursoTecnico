
<?php
session_start();

require_once('db.class.php');

$acao = $_POST['acao'];
$id= $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();



      if ($acao=="update") {
         $id_item_carrinho = $_POST['id_item_carrinho'];
         $observacao = $_POST['observacao'];
         
          $sql = " update  carrinho
	  set observacao ='$observacao'
          where carrinho.id_item_carrinho= ".$id_item_carrinho." and carrinho.idusuario=".$id;

        //executar a query
       if(mysqli_query($link, $sql)){
		 echo "Salvo com Sucesso";
       } else {
		echo 'Erro ao registrar A observacao!';
	   }


      }else{

       $categoria = $_POST['categoria'];

       if ($acao=="delete" and $categoria<>3) {
         $seq_interno = $_POST['id_item_carrinho']; // Id_item_Carrinho = Seq interno (Apagará todos os produtos com o mesmo sequencial)
         
          $sql_delete = " delete  from  carrinho
	 where carrinho.seq_interno = ".$seq_interno." and carrinho.idusuario=".$id;

        //executar a query
       if(mysqli_query($link, $sql_delete)){
		 echo "Deletado com Sucesso";
       } else {
		echo 'Erro ao Deletar o produto!';
	   }


      }else{

         $id_bebida = $_POST['id_item_carrinho']; // Id_item_Carrinho = Para Bebidas 
         
          $sql_delete = " delete  from  carrinho
   where carrinho.id_item_carrinho = ".$id_bebida." and carrinho.idusuario=".$id;

        //executar a query
       if(mysqli_query($link, $sql_delete)){
     echo "Deletado com Sucesso";
       } else {
    echo 'Erro ao Deletar o produto!';
     }
     
      }

      
      }


     
?>