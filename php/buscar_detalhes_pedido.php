<?php 
require_once('db.class.php');

$id= $_POST['id_item'];

$sql = "SELECT * FROM `itens_pedidos` inner join `produtos` on produtos.id_produto = itens_pedidos.id_produto inner join `categorias` on `categorias`.`id_categoria` = `produtos`.`id_categoria` where `categorias`.`descricao_categoria` <> 'Adicionais' and id_pedido='$id' order by `categorias`.`descricao_categoria` desc, seq_interno";
 
  
$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);


$classe = "btn btn-primary";

echo"<thead style='background:#c8c8c8;'>";
echo "<tr>";
echo "<th width='20%'>Sabores/Nome</th>";

echo "<th width='65%' style='text-align:center;' >Adicionais </th>";
echo "<th width='100%'  >Total </th>";
echo "</tr>";
echo"</thead>";
echo"<tbody style='padding:10px;'>";


$aux=0;
$precoaux= 0;
while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

  $categoria =$registro['id_categoria']; 
  $sql_produto = " select * from produtos where id_produto= ".$registro['id_produto'] ;
  $resultado_dados_produto = mysqli_query($link, $sql_produto);
  $registro_produto = mysqli_fetch_array($resultado_dados_produto, MYSQLI_ASSOC);
  
  if ($categoria== 1 or $categoria==2) {

    if ($aux<>$registro['seq_interno']){

     if ($categoria==1) {
       $tamanho = $registro['tamanho'];
     }

        //Mostra qual é o produto e o valor total do produto;
     if ($categoria==2){
      echo "<tr>";
      echo "<td style=' background:#2c2c2c; padding-left:5px; font-weight:600;text-transform:uppercase;  font-size:14px; text-align:left; color:white;'   value='" . $registro['id_produto'] . "' >" . $registro['descricao_categoria']. "</td>";

      $sql_adicionais = " select * from itens_pedidos, produtos where seq_interno= ".$registro['seq_interno']." and itens_pedidos.id_produto = produtos.id_produto and produtos.id_categoria = 4 and id_pedido= ".$id." or seq_interno= ".$registro['seq_interno']." and itens_pedidos.id_produto = produtos.id_produto and produtos.id_categoria = 5 and id_pedido= ".$id." or seq_interno= ".$registro['seq_interno']." and itens_pedidos.id_produto = produtos.id_produto and produtos.id_categoria = 6 and id_pedido= ".$id;

      $resultado_dados_adicionais = mysqli_query($link, $sql_adicionais);

      echo "<td style='background:#2c2c2c;padding:4px; text-align:center;' >" ;
    
      if (mysqli_num_rows($resultado_dados_adicionais)>0) {
        
    

    echo "<div class='btn-group' style='text-align:center; color:black;'  >";
    echo " <button style='padding:5px;' type='button' class='btn btn-info dropdown-toggle'  data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Adicionais    <span class='caret'></span></button>";

    echo " <div style='padding:5px; width:auto;' class='dropdown-menu'>";
    while($registro_adicionais = mysqli_fetch_array($resultado_dados_adicionais, MYSQLI_ASSOC)){

     echo "<li style='margin-bottom:5px'>".$registro_adicionais['nome_produto']."<span style='font-size:12px;'> R$ ".number_format($registro_adicionais['preco_produto'],2)."</li>";

   }

   echo " </div>";
   echo "</div>";


     }

     echo "</td>";

     $sql_total = "SELECT SUM(valor_total) AS total_seq FROM itens_pedidos where seq_interno=".$registro['seq_interno']." and id_pedido='$id'";
     $resultado_total = mysqli_query($link, $sql_total);
     $registro_total = mysqli_fetch_array($resultado_total, MYSQLI_ASSOC);
     echo "<td style='text-transform:uppercase; background: #2c2c2c; color:white;' >";
     echo "R$ ". number_format($registro_total['total_seq'],2);
     echo "</td>";


   }

   if ($categoria==1) {
    echo "<tr>";
    echo "<td style='text-transform:uppercase; padding-left:5px; font-weight:600; background: #2c2c2c; color:white;' value='" . $registro['id_produto'] . "' >" . $registro['descricao_categoria'] ."  ".$registro['tamanho']."</td>";

    $sql_adicionais = " select * from itens_pedidos, produtos where seq_interno= ".$registro['seq_interno']." and itens_pedidos.id_produto = produtos.id_produto and produtos.id_categoria = 4 and id_pedido= ".$id." or seq_interno= ".$registro['seq_interno']." and itens_pedidos.id_produto = produtos.id_produto and produtos.id_categoria = 5 and id_pedido= ".$id." or seq_interno= ".$registro['seq_interno']." and itens_pedidos.id_produto = produtos.id_produto and produtos.id_categoria = 6 and id_pedido= ".$id;

    $resultado_dados_adicionais = mysqli_query($link, $sql_adicionais);

    echo "<td style='background:#2c2c2c; text-align:center; padding:4px;' >" ;
    
      if (mysqli_num_rows($resultado_dados_adicionais)>0) {
        
   

    echo "<div class='btn-group' style='text-align:center; color:black;'  >";
    echo " <button style='padding:5px;' type='button' class='btn btn-info dropdown-toggle'  data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Adicionais    <span class='caret'></span></button>";

    echo " <div style='padding:5px; width:auto;' class='dropdown-menu'>";
    while($registro_adicionais = mysqli_fetch_array($resultado_dados_adicionais, MYSQLI_ASSOC)){

     echo "<li style='margin-bottom:5px'>".$registro_adicionais['nome_produto']."<span style='font-size:12px;'> R$ ".number_format($registro_adicionais['preco_produto'],2)."</li>";

   }

   echo " </div>";
   echo "</div>";
   
      }

   
   echo "</td>";

   $sql_total = "SELECT SUM(valor_total) AS total_seq FROM itens_pedidos where seq_interno=".$registro['seq_interno']." and id_pedido='$id'";
   $resultado_total = mysqli_query($link, $sql_total);
   $registro_total = mysqli_fetch_array($resultado_total, MYSQLI_ASSOC);
   echo "<td style='text-transform:uppercase; background: #2c2c2c; color:white;' >";
   echo "R$ ". number_format($registro_total['total_seq'],2);
   echo "</td>";

 }      


 echo "</tr>";
}

echo "<tr>";
echo "<td style='border-left: 5px solid #4040ff; padding-left:10px'  value='" . $registro['id_produto'] . "' >" . $registro_produto['nome_produto'] . "</td>";

echo "<td  colspan='2'  value='" . $registro['observacao'] . "' >"."<input style='color:black;'  disabled  value='" . $registro['observacao'] . "' id='obs".$registro['id_item_carrinho'] ."' placeholder='Sem Observação' type='text'> </input> "  . "</td>";
echo "</tr>"; 
}

$aux=$registro['seq_interno'];
}



$sql_bebidas = " select * from itens_pedidos, produtos where  itens_pedidos.id_produto = produtos.id_produto and produtos.id_categoria = 3 and id_pedido= ".$id ;

$resultado_dados_bebidas = mysqli_query($link, $sql_bebidas);

if (mysqli_num_rows($resultado_dados_bebidas)>0) {
 echo "<tr>";
 echo "<td style='text-transform:uppercase; background:#2c2c2c; font-weight:400; font-size:18px; text-align:left; color:white; padding-left:5px;'  colspan='4' > Bebidas </td>";
 echo "</tr>";
}

while($registro_bebidas = mysqli_fetch_array($resultado_dados_bebidas, MYSQLI_ASSOC)){
  echo "<tr>";
  echo "<td style='border-left: 5px solid #ed9121; padding-left:10px;'  value='" . $registro_bebidas['id_produto'] . "' >" . $registro_bebidas['nome_produto']. "(".$registro_bebidas['qtd_item'].")</td>";
  echo "<td ></td>";
  echo "<td  colspan='2'  value='" . $registro_bebidas['valor_total'] . "' >" ."R$". number_format($registro_bebidas['valor_total'], 2, '.', '') 
  . "</td>";
  echo "</tr>";
}

echo"</tbody>";


echo "<tr>";
echo "<td style='text-transform:uppercase; background:#2c2c2c; font-weight:400; font-size:18px; text-align:left; color:white; padding-left:5px;' width='50%' colspan='4' > Dados do Pedido </td>";
echo "</tr>";

$sql_pedido = "SELECT * FROM pedidos where id_pedido=".$id;

$resultado_pedido = mysqli_query($link, $sql_pedido);
$registro_pedido= mysqli_fetch_array($resultado_pedido, MYSQLI_ASSOC);
echo "<tr>";
echo "<td>Valor Total: </td>";
echo "<td colspan='2'>R$".number_format($registro_pedido['valor_total_pedido'],2) ."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Data/Hora: </td>";
echo "<td colspan='2'>".$registro_pedido['hora_pedido'] ."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Pagamento:</td>";
echo "<td colspan='2'>".$registro_pedido['forma_pagamento'] ."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Taxa de Entrega: </td>";
echo "<td colspan='2'>R$".number_format($registro_pedido['taxa_entrega'],2) ."</td>";
echo "</tr>";





echo "<tr>";
echo "<td style='text-transform:uppercase; background:#2c2c2c; font-weight:400; font-size:18px; text-align:left; color:white; padding-left:5px;' width='50%' colspan='4' > Dados do Cliente </td>";
echo "</tr>";

 $sql_cliente = "SELECT * FROM usuarios,bairros,cidades,pedidos where usuarios.id_usuario= pedidos.id_usuario and pedidos.id_pedido='$id' and bairros.id_bairro=usuarios.id_bairro and bairros.id_cidade=cidades.id_cidade";

$resultado_cliente = mysqli_query($link, $sql_cliente);
$registro_cliente= mysqli_fetch_array($resultado_cliente, MYSQLI_ASSOC);

echo "<tr>";
echo "<td>Nome: </td>";
echo "<td colspan='2'>".$registro_cliente['nome_usuario'] ."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Email: </td>";
echo "<td colspan='2'>".$registro_cliente['email_usuario'] ."</td>";
echo "</tr>";
echo "<td>Bairro: </td>";
echo "<td colspan='2'>".$registro_cliente['nome_bairro']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cidade: </td>";
echo "<td colspan='2'>".$registro_cliente['nome_cidade'] ."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Endereço: </td>";
echo "<td colspan='2'>".$registro_cliente['nome_endereco'] ."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Número: </td>";
echo "<td colspan='2'>".$registro_cliente['num_casa_usuario'] ."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Referência: </td>";
echo "<td colspan='2'>".$registro_cliente['referencia_usuario'] ."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Contato: </td>";
echo "<td colspan='2'>".$registro_cliente['contato_usuario'] ."</td>";
echo "</tr>";
 
 echo "<tr>";
  
   echo "<td colspan='3'>";
   echo "<form method='POST' action='php/imprimir_pedido.php' target='_blank'>";
  echo "<input type='text' name='id_item' style='display:none' value='".$id."' >"; 
  echo "<input type='submit' value='Imprimir' class='btn btn-blue btn-block '>";
 echo "</td>";
  echo "<form>";
  echo "</tr>";



       
  
 ?>