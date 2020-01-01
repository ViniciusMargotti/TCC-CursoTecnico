<?php 

require_once('db.class.php');
$id = $_POST['id'];

$objDb = new db();
$link = $objDb->conecta_mysql();
 
 $tipo= $_POST['tipo'];

 if ($tipo=="cidade") {
   $id= $_POST['id'];
   $sql_busca_status_cidade = "select status_cidade from cidades where cidades.id_cidade =".$id;
   $resultado_cidade= mysqli_query($link, $sql_busca_status_cidade);
   $registro_cidade = mysqli_fetch_array($resultado_cidade);

   if ($registro_cidade['status_cidade']=="ativo") {
   
   $sql_update_status_cidade = "update cidades 
   set status_cidade = 'inativo'
    where cidades.id_cidade ='$id'"; 

    //executar a query
       if(mysqli_query($link, $sql_update_status_cidade)){
		 
       } else {
		echo 'Erro ao Alterar o Status do endereco (Avise o Suporte)!'.$sql_update_status_cidade;
	   }

	   $sql_update_status_cidade = "update bairros 
   set status_bairro = 'inativo'
    where id_cidade ='$id'"; 

    //executar a query
       if(mysqli_query($link, $sql_update_status_cidade)){
		 echo $id;
       } else {
		echo 'Erro ao Alterar o Status do endereco(Bairro) (Avise o Suporte)!'.$sql_update_status_cidade;
	   }
   
    }else{

    	  $sql_update_status_cidade = "update cidades 
   set status_cidade = 'ativo'
    where cidades.id_cidade ='$id'"; 

    //executar a query
       if(mysqli_query($link, $sql_update_status_cidade)){
		 
       } else {
		echo 'Erro ao Alterar o Status do endereco (Avise o Suporte)!'.$sql_update_status_cidade;
	   }

	   $sql_update_status_cidade = "update bairros 
   set status_bairro = 'ativo'
    where id_cidade ='$id'"; 

    //executar a query
       if(mysqli_query($link, $sql_update_status_cidade)){
		 echo $id;
       } else {
		echo 'Erro ao Alterar o Status do endereco(Bairro) (Avise o Suporte)!'.$sql_update_status_cidade;
	   }
   

   }
  die();  
}

if ($tipo=="bairro") {
   $id= $_POST['id'];
   $sql_busca_status_bairro = "select status_bairro,id_cidade from bairros where bairros.id_bairro =".$id;
   $resultado_bairro= mysqli_query($link, $sql_busca_status_bairro);
   $registro_bairro= mysqli_fetch_array($resultado_bairro);
    
  if ($registro_bairro['status_bairro']=="ativo") {
   
   $sql_update_status_bairro = "update bairros 
   set status_bairro = 'inativo'
    where bairros.id_bairro='$id'"; 

    //executar a query
       if(mysqli_query($link, $sql_update_status_bairro)){
		 echo $registro_bairro['id_cidade'];
       } else {
		echo 'Erro ao Alterar o Status do endereco (Avise o Suporte)!'.$sql_update_status_bairro;
	   }
   }else{

    	  $sql_update_status_bairro = "update bairros 
   set status_bairro = 'ativo'
    where bairros.id_bairro ='$id'"; 

        //executar a query
       if(mysqli_query($link, $sql_update_status_bairro)){
			 echo $registro_bairro['id_cidade'];
       } else {
		echo 'Erro ao Alterar o Status do endereco (Avise o Suporte)!'.$sql_update_status_bairro;
	   }

   }
  die();   

}
      

  
	



                 










 ?>