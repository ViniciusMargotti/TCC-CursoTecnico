<?php 
require_once('db.class.php');

session_start();
 
$id= $_SESSION['id_usuario'];
$nome= $_SESSION['usuario'] ;
 
$objDb = new db();
$link = $objDb->conecta_mysql();

$acao = $_POST['acao'];


$id_produto = 0;
$tamanho = "";
$qtdsabores = 0;
$categoria = "";




 if ($acao=="incluir") {

$id_produto = $_POST['idproduto'];
$tamanho = $_POST['tamanho'];
$qtdsabores = $_POST['qtdsabores'];
$categoria = $_POST['categoria'];	
$seq_interno = $_POST['seq_interno']; 


$sql = " select * from produtos where id_produto = '$id_produto' "; 
$resultado_id = mysqli_query($link, $sql);
$dados_produtos = mysqli_fetch_array($resultado_id);

if ($categoria=="1") {
	if ($tamanho=="broto") {
       $valor=  floatval ($dados_produtos['preco_produto']) / floatval ($qtdsabores);  
}

if ($tamanho=="media") {
       $valor=  floatval ($dados_produtos['preco_produto'])*1.6 / floatval ($qtdsabores);  
}

if ($tamanho=="grande") {
       $valor=  floatval ($dados_produtos['preco_produto'])*2  / floatval ($qtdsabores);  
}

if ($tamanho=="gigante") {
       $valor=  floatval ($dados_produtos['preco_produto']) *2.5  / floatval ($qtdsabores);  
 }

 if ($qtdsabores=="1") {
       $qtd="1";
 }

 if ($qtdsabores=="2") {
       $qtd="0.5";
 }

  if ($qtdsabores=="3") {
      $qtd="0.25";
 }

  if ($qtdsabores=="4") {
       $qtd="0.25";
   }
    
    if ($seq_interno=="continuar_seq_interno") {
       $sql_busca_seq= " select max(seq_interno ) as maiorcodigoseq from carrinho where idusuario= '$id' "; 
       $resultado_seq = mysqli_query($link, $sql_busca_seq);
       $dados_busca_seq = mysqli_fetch_array($resultado_seq);
       $id_max_codigo_seq = $dados_busca_seq['maiorcodigoseq'];

       if ($id_max_codigo_seq==0) {
          $id_max_codigo_seq=1;
       }
    }else{
       $sql_busca_seq= " select max(seq_interno ) as maiorcodigoseq from carrinho where idusuario= '$id' "; 
       $resultado_seq = mysqli_query($link, $sql_busca_seq);
       $dados_busca_seq = mysqli_fetch_array($resultado_seq);
       $id_max_codigo_seq = $dados_busca_seq['maiorcodigoseq'];
       $id_max_codigo_seq = $id_max_codigo_seq +1;
    }

   $valor = number_format($valor,2);
    $sql_adicionar=" insert into carrinho(idusuario, idproduto,qtd, tamanho,valor,seq_interno) values ('$id', '$id_produto', '$qtd','$tamanho','$valor','$id_max_codigo_seq') ";


    if(mysqli_query($link, $sql_adicionar)){
		
	} else {
		echo 'Erro ao registrar o produto no carrinho!';
	}
  
  $sql_busca_pizza= " select max(id_item_carrinho ) as maiorcodigo from carrinho where idusuario= '$id' "; 
	$resultado_id_pizza = mysqli_query($link, $sql_busca_pizza);
	$dados_busca_pizza = mysqli_fetch_array($resultado_id_pizza);
    $id_max_codigo_pizza = $dados_busca_pizza['maiorcodigo'];
  
     echo  "<button  style='background:#4040ff;color:white; cursor: pointer; border:none' onclick='removeProdutoLista( ".$id_max_codigo_pizza.",".$dados_produtos['id_categoria'] .",". $dados_produtos['id_produto']  .")' id='". $id_max_codigo_pizza ."' class='list-group-item'>".$dados_produtos['nome_produto']." R$".number_format($valor,2)  ." <span style='float:right; width:auto;' class='glyphicon glyphicon-trash'></span> ". "</button>"; 
 
      echo "<script type='text/javascript'> 
         var total_sabores =  document.getElementById('total_sabores').value;
        total_sabores = parseFloat(total_sabores)+".number_format($valor,2) .";
        document.getElementById('total_sabores').value = total_sabores.toFixed(2); 
         </script> "; 

}else if ($categoria=="3") {

   $id_produto = $_POST['idproduto'];
  $qtd=$qtdsabores;
  $tamanho= "";
  $valor= $dados_produtos['preco_produto']*$qtd;


    if ($seq_interno=="continuar_seq_interno") {
       $sql_busca_seq= " select max(seq_interno ) as maiorcodigoseq from carrinho where idusuario= '$id' "; 
       $resultado_seq = mysqli_query($link, $sql_busca_seq);
       $dados_busca_seq = mysqli_fetch_array($resultado_seq);
       $id_max_codigo_seq = $dados_busca_seq['maiorcodigoseq'];
    }else{
       $sql_busca_seq= " select max(seq_interno ) as maiorcodigoseq from carrinho where idusuario= '$id' "; 
       $resultado_seq = mysqli_query($link, $sql_busca_seq);
       $dados_busca_seq = mysqli_fetch_array($resultado_seq);
       $id_max_codigo_seq = $dados_busca_seq['maiorcodigoseq'];
       $id_max_codigo_seq = $id_max_codigo_seq +1;
    }
     $valor = number_format($valor,2);
   $sql_adicionar_lanche=" insert into carrinho(idusuario, idproduto,qtd, tamanho,valor, seq_interno) values ('$id', '$id_produto', '$qtd','null','$valor','$id_max_codigo_seq') ";

    if(mysqli_query($link, $sql_adicionar_lanche)){
    
  } else {
    echo 'Erro ao registrar o Lanche!';
  }
 
}else{

  $id_produto = $_POST['idproduto'];
	$qtd="1";
  $tamanho= "";
  $valor= $dados_produtos['preco_produto'];


    if ($seq_interno=="continuar_seq_interno") {
       $sql_busca_seq= " select max(seq_interno ) as maiorcodigoseq from carrinho where idusuario= '$id' "; 
       $resultado_seq = mysqli_query($link, $sql_busca_seq);
       $dados_busca_seq = mysqli_fetch_array($resultado_seq);

       $id_max_codigo_seq = $dados_busca_seq['maiorcodigoseq'];
       if ($id_max_codigo_seq==0) {
          $id_max_codigo_seq=1;
       }
    }else{
       $sql_busca_seq= " select max(seq_interno ) as maiorcodigoseq from carrinho where idusuario= '$id' "; 
       $resultado_seq = mysqli_query($link, $sql_busca_seq);
       $dados_busca_seq = mysqli_fetch_array($resultado_seq);
       $id_max_codigo_seq = $dados_busca_seq['maiorcodigoseq'];
       $id_max_codigo_seq = $id_max_codigo_seq +1;
    }
     $valor = number_format($valor,2);
   $sql_adicionar_lanche=" insert into carrinho(idusuario, idproduto,qtd, tamanho,valor, seq_interno) values ('$id', '$id_produto', '$qtd','null','$valor','$id_max_codigo_seq') ";

    if(mysqli_query($link, $sql_adicionar_lanche)){
		
	} else {
		echo 'Erro ao registrar o Lanche!';
	}

	$sql_busca_lanche= " select max(id_item_carrinho) as maiorcodigo from carrinho where idusuario= '$id' "; 
	$resultado_id_lanche = mysqli_query($link, $sql_busca_lanche);
	$dados_busca_lanche = mysqli_fetch_array($resultado_id_lanche);
  $id_max_codigo_lanche = $dados_busca_lanche['maiorcodigo'];

   if ($categoria==4 or $categoria==5 or $categoria==6  ) {
     $border= "ffa500";
   }else{
    $border= "4040ff";
   }

	 echo  "<button  style='background:#".$border.";color:white; border:none; cursor: pointer;' onclick='removeProdutoLista( ".$id_max_codigo_lanche.",".$dados_produtos['id_categoria'].",". $dados_produtos['id_produto']  .")' id='". $id_max_codigo_lanche ."' class='list-group-item'>".$dados_produtos['nome_produto']." R$".number_format($dados_produtos['preco_produto'],2) ." <span style='float:right; width:auto;' class='glyphicon glyphicon-trash'></span> ". "</button>";  
    
   echo "<script type='text/javascript'> 
         var total_sabores =  document.getElementById('total_sabores').value;
        total_sabores = parseFloat(total_sabores)+".number_format($dados_produtos['preco_produto'],2) .";
        document.getElementById('total_sabores').value = total_sabores.toFixed(2); 
         </script> "; 
   
 

 } 



}


if ($acao=="excluir") {

  $id_produto = $_POST['idproduto'];
  
  // Busca valor do produto que esta na pré-lista para deletar do total;
$sql_excluir_lista = " select * from carrinho where id_item_carrinho = '$id_produto' and idusuario= '$id' "; 
$resultado_id_lista = mysqli_query($link, $sql_excluir_lista);
$dados_produtos_lista = mysqli_fetch_array($resultado_id_lista);

echo "<script type='text/javascript'> 
         var total_sabores =  document.getElementById('total_sabores').value;
        total_sabores = parseFloat(total_sabores)-".number_format($dados_produtos_lista['valor'],2) .";
        document.getElementById('total_sabores').value = total_sabores.toFixed(2);  
         </script> "; 


  $sql_deletar_lanche=" delete from carrinho where id_item_carrinho= ' $id_produto ' and idusuario= '$id' ";
  mysqli_query($link, $sql_deletar_lanche);

}

?>