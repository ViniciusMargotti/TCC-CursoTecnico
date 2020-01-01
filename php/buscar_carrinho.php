<?php 

require_once('db.class.php');
session_start();

$id= $_SESSION['id_usuario'];

//Verifica se o Carrinho está vazio
$sql_verificacao = "SELECT * FROM `carrinho` where idusuario=".$id;
$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado = mysqli_query($link, $sql_verificacao);
$resultado = mysqli_fetch_array($resultado);
if (!isset($resultado)) {
 echo "<h2 style='text-align:center;'> Carrinho Vazio.. </h2>";
}else{


  $sql = "SELECT * FROM `carrinho` inner join `produtos` on id_produto = idproduto inner join `categorias` on `categorias`.`id_categoria` = `produtos`.`id_categoria` where `categorias`.`descricao_categoria` <> 'Adicionais' and `categorias`.`descricao_categoria` <> 'Adicional Pizzas' and `categorias`.`descricao_categoria` <> 'Adicional Lanches' and `categorias`.`descricao_categoria` <> 'bordas'  and idusuario='$id' order by `categorias`.`descricao_categoria` desc, seq_interno";

  $resultado_id = mysqli_query($link, $sql);



  $classe = "btn btn-primary";
  
  echo"<thead width='100%' >";
  echo "<tr width='100%'>";
  echo "<th  width='25%'>Nome / Sabores </th>";
  echo "<th  width='33%'>Adicionais </th>";
  echo "<th  width='50%'>Total </th>";
  echo "<th  width='100%'>Ação </th>";

  echo "</tr>";
  echo"</thead>";
  echo"<tbody>";
  $classe = " btn-success";
  $classe2 = " btn-danger";

  $aux=0;
  
  while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){



   $categoria =$registro['id_categoria']; 
   $sql_produto = " select * from produtos where id_produto= ".$registro['idproduto'] ;
   $resultado_dados_produto = mysqli_query($link, $sql_produto);
   $registro_produto = mysqli_fetch_array($resultado_dados_produto, MYSQLI_ASSOC);


   if ($categoria== 1 or $categoria==2) {

    if ($aux<>$registro['seq_interno']){

     if ($categoria==1) {
       $tamanho = $registro['tamanho'];
     }


     echo "<tr>";
     echo "<td style=' background:#2c2c2c;font-weight:600; font-size:14px;; text-align:left; color:white;'  colspan='1'  value='" . $registro['idproduto'] . "' >" . $registro['descricao_categoria'] ." ".$tamanho ."</td>";
     $tamanho="";




     
     $sql_adicionais = " select * from carrinho, produtos where seq_interno= ".$registro['seq_interno']." and carrinho.idproduto = produtos.id_produto and produtos.id_categoria = 4 and idusuario= ".$id." or seq_interno= ".$registro['seq_interno']." and carrinho.idproduto = produtos.id_produto and produtos.id_categoria = 5 and idusuario= ".$id." or seq_interno= ".$registro['seq_interno']." and carrinho.idproduto = produtos.id_produto and produtos.id_categoria = 6 and idusuario= ".$id;
     $resultado_dados_adicionais = mysqli_query($link, $sql_adicionais);



     
     echo "<td style='background:#2c2c2c; ' >" ;
     
     if ( mysqli_num_rows($resultado_dados_adicionais)>0) {



       echo "<div class='btn-group' >";
       echo " <button  type='button' class='btn btn-info dropdown-toggle'  data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>Adicionais    <span class='caret'></span></button>";

       echo " <div style='padding:5px; width:230px;' class='dropdown-menu'>";
       while($registro_adicionais = mysqli_fetch_array($resultado_dados_adicionais, MYSQLI_ASSOC)){
         echo "<li style='margin-bottom:20px'>".$registro_adicionais['nome_produto']."<span style='font-size:12px;'> R$ ".number_format($registro_adicionais['valor'],2)."</span><span> <button  onclick='removeProdutoCarrinho(".$registro_adicionais['id_item_carrinho'].", 3) ;' style='float:right; padding-bottom:5px;padding-top:5px; ' class='btn btn-danger'>  <span class='glyphicon glyphicon-trash'></span> </button> </span> "."</li>";}

         echo " </div>";
         echo "</div>";

       }

       
       echo "</td>";

        $sql_soma_produto = " select sum(valor) as valortotal from carrinho where seq_interno=".$registro['seq_interno']." and idusuario= ".$id;
     $resultado_dados_soma = mysqli_query($link, $sql_soma_produto);
     $registro_soma= mysqli_fetch_array($resultado_dados_soma) ;
     
     echo "<td style='color:white;background:#2c2c2c;'> R$ ".number_format($registro_soma['valortotal'],2)."</td>";


       echo"<td style='background:#2c2c2c; '    >";
       echo "<button   class='btn".$classe2."' onclick='removeProdutoCarrinho(".$registro['seq_interno']." ,1 ) ;'  id='".$registro['seq_interno']  . "' >Excluir </button>";
       echo"</td>";    
       

       
       echo "</tr>";

       

     } 
     echo "<tr '>";
     echo "<td style='border-left: 5px solid #4040ff; value='" . $registro['id_produto'] . "' >" . $registro_produto['nome_produto'] . "</td>";

     echo "<td colspan='2'   value='" . $registro['observacao'] . "' >"."<input  value='" . $registro['observacao'] . "' id='obs".$registro['id_item_carrinho'] ."' placeholder='Adicione uma observação' type='text'> </input> "  . "</td>";
     echo"<td    >";
     echo "<button class='btn".$classe."' onclick='atualizaProdutoCarrinho(".$registro['id_item_carrinho'].") ;'  id='".$registro['id_item_carrinho']  . "' >" . "Salvar" . "</button>";
     echo"</td>";    

     echo "</tr>"; 
   }

   $aux=$registro['seq_interno'];








 }


 
 $sql_bebidas = " select * from carrinho, produtos where  carrinho.idproduto = produtos.id_produto and produtos.id_categoria = 3 and carrinho.idusuario= ".$id ;
 $resultado_dados_bebidas = mysqli_query($link, $sql_bebidas);


 if (mysqli_num_rows($resultado_dados_bebidas)>0) {
   echo "<tr>";
   echo "<td style='text-transform:uppercase; background:#2c2c2c; font-weight:600; font-size:18px; ; text-align:center; color:white;'  colspan='4' > Bebidas </td>";
   echo "</tr>";
 }

 while($registro_bebidas = mysqli_fetch_array($resultado_dados_bebidas, MYSQLI_ASSOC)){

  echo "<tr>";
  echo "<td style='border-left: 5px solid #4040ff;' width='30%'  value='" . $registro_bebidas['idproduto'] . "' >" . $registro_bebidas['nome_produto']  . " (".$registro_bebidas['qtd'].")</td>";
   
   echo "<td> </td>";
  echo "<td    value='" . $registro_bebidas['valor'] . "' >" ."R$". number_format($registro_bebidas['valor'], 2, '.', '') 
  . "</td>";
  echo"<td    >";
  echo "<button  class='btn ".$classe2."' onclick='removeProdutoCarrinho(".$registro_bebidas['id_item_carrinho'].", 3) ;'  id='".$registro_bebidas['id_item_carrinho']  . "' > Excluir </button>";
  echo"</td>";    


  echo "</tr>";
}

echo "<tr>";

echo "<td colspan='4' style='text-align:center;'>";
echo " <button  id='btn-limpar-carrinho' onclick='LimpaCarrinho();'  class='btn btn-danger btn-block'><span class='glyphicon glyphicon-trash'></span> Limpar Carrinho</button>";

echo "<button  id='btn-finalizar-pedido' data-toggle='modal' data-target='#exampleModal'   type='button' class='btn  btn-dark-green btn-block'><span class='glyphicon glyphicon-shopping-cart'></span> Comprar</button>";


echo "</td>";

echo "</tr>";

echo"</tbody>";

}

?>