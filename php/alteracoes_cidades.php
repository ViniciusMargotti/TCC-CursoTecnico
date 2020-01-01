<?php 

require_once('db.class.php');
$id = $_POST['id_cidade'];
$objDb = new db();
$link = $objDb->conecta_mysql();

$acao = $_POST['acao'];

if ($acao=="update") {
	//Dados produto
  
  $uf = $_POST['uf'];
  $nome = $_POST['nome'];
  
  $sql = " update  cidades
  set 
  nome_cidade ='$nome',
  uf ='$uf'
  

  where cidades.id_cidade = ".$id;

  if(mysqli_query($link, $sql)){
   echo "Alterado com Sucesso";
 } else { 
   echo 'Erro ao alterar a cidade!';
 }
 die();
}














?>