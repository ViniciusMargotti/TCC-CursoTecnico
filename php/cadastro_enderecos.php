<?php 
session_start();
require_once('db.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

$email= $_SESSION['email'];

if ($email=="admin@admin") {

  //Dados produto
  $acao = $_POST['acao'];
  $tipo = $_POST['tipo'];



  if ($tipo=="bairro") {
       
       if ($acao=="insert") {
      
    $taxa = $_POST['taxa'];
    $taxa = str_replace(",",".", $taxa);
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];

    $sql_bairro = " insert into bairros(nome_bairro,taxa_entrega,id_cidade) values ('$nome', '$taxa', '$cidade') ";
          //executar a query
    if(mysqli_query($link, $sql_bairro)){
     echo "Bairro Cadastrado com Sucesso";
   } else { echo 'Erro ao registrar o Bairro!'; }
   die();

       }
 }

 if ($tipo=="cidade") {
       
       if ($acao=="insert") {
      
    $nome = $_POST['nome'];
    $estado = $_POST['estado'];

    $sql_bairro = " insert into cidades(nome_cidade,uf) values ('$nome', '$estado') ";
          //executar a query
    if(mysqli_query($link, $sql_bairro)){
     echo "Cidade Cadastrada com Sucesso";
   } else { echo 'Erro ao registrar a Cidade!'; }
   die();

       }
 }








}else{
  header('Location: index.php?erro=1');
}



?>