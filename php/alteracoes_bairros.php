<?php 

require_once('db.class.php');
$id = $_POST['id_bairro'];
$objDb = new db();
$link = $objDb->conecta_mysql();

$acao = $_POST['acao'];

if ($acao=="update") {
	//Dados produto
  
  $taxa = $_POST['taxa'];
  $nome = $_POST['nome'];
  $id_cidade = $_POST['id_cidade'];
  
  $sql = " update  bairros
  set 
  nome_bairro ='$nome',
  taxa_entrega ='$taxa',
  id_cidade ='$id_cidade'
  

  where bairros.id_bairro = ".$id;

  if(mysqli_query($link, $sql)){
   echo "Alterado com Sucesso";
 } else { 
   echo 'Erro ao alterar o Bairro!';
 }
 die();
}














?>