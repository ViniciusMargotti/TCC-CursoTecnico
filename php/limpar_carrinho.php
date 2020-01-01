<?php 

 session_start();
 require_once('db.class.php');
 $id_usuario = $_SESSION['id_usuario'];

  $sql = "DELETE FROM carrinho WHERE idusuario = ".$id_usuario;

       $objDb = new db();
       $link = $objDb->conecta_mysql();
       $resultado_id = mysqli_query($link, $sql);
   
   echo "00.00";
   


 ?>   