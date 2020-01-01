<?php 

  require_once('db.class.php');
  $objDb = new db();
  $link = $objDb->conecta_mysql();

  session_start();
  $id= $_SESSION['id_usuario'];

  $sql = " SELECT SUM(valor_total_pedido) as total FROM `pedidos` where data_pedido = date(now())"; 
  $resultado_valor = mysqli_query($link, $sql);
  $dados_produtos = mysqli_fetch_array($resultado_valor);

  echo "R$".number_format($dados_produtos['total'], 2, '.', '')   ;







 ?>