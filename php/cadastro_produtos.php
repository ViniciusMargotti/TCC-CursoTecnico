<?php 
session_start();
require_once('db.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

$email= $_SESSION['email'];

 if ($email=="admin@admin") {

  //Dados produto
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$nome = $_POST['nome'];


   if ($categoria=="Pizza") {
   
         $sql_pizza = " insert into produtos(nome_produto, preco_produto, descricao_produto,id_categoria) values ('$nome', '$preco', '$descricao','1') ";
          //executar a query
	     if(mysqli_query($link, $sql_pizza)){
		   echo "Pizza cadastrada com Sucesso";
          } else { echo 'Erro ao registrar o produto!'; }
          die();
    }

     if ($categoria=="Lanche") {
   
         $sql_lanche = " insert into produtos(nome_produto, preco_produto, descricao_produto,id_categoria) values ('$nome', '$preco', '$descricao','2') ";
          //executar a query
	     if(mysqli_query($link, $sql_lanche)){
		   echo " Lanche cadastrado com Sucesso";
          } else { echo 'Erro ao registrar o produto!'; }
          die();
    }
    

     if ($categoria=="Bebida") {
   
         $sql_bebida = " insert into produtos(nome_produto, preco_produto, descricao_produto,id_categoria) values ('$nome', '$preco', '$descricao','3') ";
          //executar a query
	     if(mysqli_query($link, $sql_bebida)){
		   echo "Bebida cadastrada com Sucesso";
          } else { echo 'Erro ao registrar o produto!'; }
          die();
    }

     if ($categoria=="Adicional Pizza") {
   
         $sql_adicional_pizza = " insert into produtos(nome_produto, preco_produto, descricao_produto,id_categoria) values ('$nome', '$preco', '$descricao','4') ";
          //executar a query
	     if(mysqli_query($link, $sql_adicional_pizza)){
		   echo "Adicional de pizza cadastrado com Sucesso";
          } else { echo 'Erro ao registrar o produto!'; }
          die();
    }

     if ($categoria=="Adicional Lanche") {
   
         $sql_adicional_lanche = " insert into produtos(nome_produto, preco_produto, descricao_produto,id_categoria) values ('$nome', '$preco', '$descricao','5') ";
          //executar a query
	     if(mysqli_query($link, $sql_adicional_lanche)){
		   echo "Adicional de lanche cadastrado com Sucesso";
          } else { echo 'Erro ao registrar o produto!'; }
          die();
    }

     if ($categoria=="Adicional Lanche/Pizza") {
   
         $sql_adicional_lanche_pizza = " insert into produtos(nome_produto, preco_produto, descricao_produto,id_categoria) values ('$nome', '$preco', '$descricao','4')";
          //executar a query
	     if(mysqli_query($link, $sql_adicional_lanche_pizza)){
          } else { echo 'Erro ao registrar o produto!'; }

           $sql_adicional_pizza_lanche = " insert into produtos(nome_produto, preco_produto, descricao_produto,id_categoria) values ('$nome', '$preco', '$descricao','5')";
          //executar a query
	     if(mysqli_query($link, $sql_adicional_pizza_lanche)){
		   echo "Adicional de pizza/lanche cadastrado com Sucesso";
          } else { echo 'Erro ao registrar o produto!'; }
          die();
    }

        if ($categoria=="Borda") {
   
         $sql_adicional_lanche = " insert into produtos(nome_produto, preco_produto, descricao_produto,id_categoria) values ('$nome', '$preco', '$descricao','6') ";
          //executar a query
       if(mysqli_query($link, $sql_adicional_lanche)){
       echo "Borda cadastrada com Sucesso.";
          } else { echo 'Erro ao registrar o produto!'; }
          die();
    }
    
    
    
    



  }else{
  header('Location: index.php?erro=1');
  }



 ?>