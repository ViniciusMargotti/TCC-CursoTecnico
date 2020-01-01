<?php 

  require_once('db.class.php');
  $objDb = new db();
  $link = $objDb->conecta_mysql();

  session_start();
  $id= $_SESSION['id_usuario'];

  $sql = " select SUM(valor) as valortotal from carrinho where idusuario='$id'"; 
  $resultado_valor = mysqli_query($link, $sql);
  $dados_produtos = mysqli_fetch_array($resultado_valor);

  echo number_format($dados_produtos['valortotal'], 2, '.', '')   ;







 ?>