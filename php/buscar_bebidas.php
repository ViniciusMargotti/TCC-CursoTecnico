<?php

require_once('db.class.php');

if (isset($_POST['like'])) {

	$aux=  " and upper(nome_produto)  LIKE '%".strtoupper($_POST['like'])."%' order by nome_produto asc";
	$sql = " select * from produtos where id_categoria= 3".$aux;
	
	
}else{
	$sql = " select * from produtos where id_categoria= 3 order by nome_produto asc";
}

$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
$classe = "btn btn-primary";

echo"<thead width='100%' >";
echo "<tr  width='100%' >";
echo "<th  width='25%' style='text-align:left;' >Nome </th>";
echo "<th  width='10%' style='text-align:center;' >Quantidade </th>";
echo "<th  width='50%' style='text-align:center;'  >Descrição </th>";
echo "<th  width='100%' style='text-align:left;' >Preço </th>";

echo "</tr>";
echo"</thead>";
echo"<tbody  >";


while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
	echo "<tr   >";
	echo"<td style='border-left: 8px solid #4040ff;' align='left'   >"; 
	echo "<button class='btn-prod' name='".$registro['id_categoria'] ."' onclick='adicionaProdutoLista(".$registro['id_produto'].",". $registro['id_categoria'] .") ;'  id='".$registro['id_produto']  . "' >" .$registro['nome_produto'] . "</button>";
	echo"</td>";
    
    echo "<td  align='center'  height='auto' overflow:hidden'   value='" . $registro['id_produto'] . "' >" ."<select class='form-control' id='qtd_b".$registro['id_produto'] ."'> <option value='1'>1</option> <option value='2'>2</option> <option value='3'>3</option> <option value='4'>4</option><option value='5'>5</option> </select>". "</td>";

	echo "<td  align='center'  height='auto' overflow:hidden'   value='" . $registro['id_produto'] . "' >" . $registro['descricao_produto'] . "</td>";
	echo "<td   value='" . $registro['preco_produto'] . "' >" ."R$". number_format($registro['preco_produto'],2) . "</td>";
	
	
	
	
	
	echo "</tr>";
}

echo"</tbody>";




?>

