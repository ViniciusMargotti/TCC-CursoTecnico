<?php 

require_once('db.class.php');
session_start();
$objDb = new db();
$link = $objDb->conecta_mysql();
$id= $_SESSION['id_usuario'];
$data = date("Y-m-d");
$forma_pagamento = $_POST['formapagamento'];

 //Taxa de Entrega;
$sql_taxa =" select bairros.taxa_entrega from bairros,usuarios where usuarios.id_bairro = bairros.id_bairro and usuarios.id_usuario= ".$id;
   //executar a query
$resultado_taxa=mysqli_query($link, $sql_taxa);
$registro_taxa= mysqli_fetch_array($resultado_taxa);
$taxa= $registro_taxa['taxa_entrega'];

     //Criar Novo pedido;
$sql_pedido = "insert into pedidos ( data_pedido, id_usuario,valor_total_pedido ,forma_pagamento, status, taxa_entrega) VALUES ( '$data', '$id','0', '$forma_pagamento', 'Pendente','$taxa')";
    //executar a query
if (mysqli_query($link, $sql_pedido)) {

}else{
 echo "Erro Ao registrar:".$forma_pagamento;
}


     //Buscar id do pedido para inserir itens;
$sql_max_pedido = "select max(id_pedido) as maiorcodigopedido from pedidos where id_usuario = '$id' ";
$resultado_id=  mysqli_query($link, $sql_max_pedido);
$dados_id = mysqli_fetch_array($resultado_id);
$id_pedido= $dados_id['maiorcodigopedido'];

     //Buscar produtos na tabela Carrinho para inserir itens;
$sql_Carrinho = "select * from carrinho,produtos where idusuario = '$id' and idproduto= produtos.id_produto ";
$resultado_carrinho=  mysqli_query($link, $sql_Carrinho);

while($carrinho = mysqli_fetch_array($resultado_carrinho)){

 $id_produto= $carrinho['idproduto'];
 $qtd= $carrinho['qtd'];
 $preco_unitario = $carrinho['preco_produto'];
 $valor_total= $carrinho['valor'];
 $observacao= $carrinho['observacao'];
 $tamanho= $carrinho['tamanho'];
 $seq_interno= $carrinho['seq_interno'];



 $sql_inserir_intem = "insert into itens_pedidos (id_pedido,id_produto,qtd_item,preco_unitario,valor_total,observacao,tamanho,seq_interno) VALUES ('$id_pedido','$id_produto','$qtd','$preco_unitario','$valor_total', '$observacao','$tamanho','$seq_interno')";

    //executar a query
 if(mysqli_query($link, $sql_inserir_intem)){

 } else {
  echo 'Erro ao registrar o item!'.$sql_inserir_intem;
}


$sql_total_pedido =" update pedidos 
set valor_total_pedido = valor_total_pedido +'$valor_total'
where id_pedido = '$id_pedido' and id_usuario = ".$id;
   //executar a query
if(mysqli_query($link, $sql_total_pedido)){
} else {
  echo 'Erro ao registrar o Total!'.$sql_inserir_intem;
}        


}

$sql_taxa_pedido =" update pedidos 
set valor_total_pedido = valor_total_pedido +'$taxa'
where id_pedido = '$id_pedido' and id_usuario = ".$id;
   //executar a query
if(mysqli_query($link, $sql_taxa_pedido)){
} else {
  echo 'Erro ao registrar a Taxa!'.$sql_taxa_pedido;
} 




echo "00.00"; 
$sql_pedido = "delete from carrinho where idusuario= '$id' ";
    //executar a query
mysqli_query($link, $sql_pedido);











?>