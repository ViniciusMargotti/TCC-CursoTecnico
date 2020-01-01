<?php 

require_once('db.class.php');
$id = $_POST['id_item'];
$objDb = new db();
$link = $objDb->conecta_mysql();

$acao = $_POST['acao'];

if ($acao=="update") {
	//Dados produto
  $categoria = $_POST['categoria'];
  $preco = $_POST['preco'];
  $descricao = $_POST['descricao'];
  $nome = $_POST['nome'];
  $status = $_POST['status'];

  
  $sql = " update  produtos
  set 
  preco_produto ='$preco',
  descricao_produto ='$descricao',
  nome_produto ='$nome',
  status ='$status'

  where produtos.id_produto = ".$id;

  if(mysqli_query($link, $sql)){
   echo "Alterado com Sucesso";
 } else { 
   echo 'Erro ao alterar o produto!';
 }
 die();
}

if ($acao=="delete") {

  $sql = " delete from produtos where produtos.id_produto = ".$id;

  if(mysqli_query($link, $sql)){
   echo "Deletado com Sucesso";
 } else { 
   echo 'Já foram realizados pedidos com este produto, é possível apenas desativalo';
 }
 die();
 
}













?>