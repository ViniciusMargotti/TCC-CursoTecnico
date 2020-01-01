<?php

require_once('db.class.php');

if (isset($_POST['like'])) {

	$aux=  " upper(nome_usuario)  LIKE '%".strtoupper($_POST['like'])."%' and bairros.id_bairro = usuarios.id_bairro and bairros.id_cidade  LIKE'%".$_POST['cidade']."%' and bairros.id_bairro  LIKE'%".$_POST['bairro']."%'  order by nome_usuario asc";
	$sql = " select * from usuarios,bairros where ".$aux;
	
	
}else{
	$sql = " select * from usuarios,bairros order by nome_usuario asc";
}

$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
$classe = "btn btn-primary";

if (mysqli_num_rows($resultado_id)<=0) {
	echo "<tr   >";
	echo"<td style='align='center'>"; 
	echo " Nenhum usuário encontrado.." ;
	echo"</td>";
	echo "</tr   >";
	die();
}

echo"<thead width='100%' >";

;
echo "<tr  width='100%' >";
echo "<th  width='12%' style='text-align:left;' >Nome </th>";
echo "<th  width='14%' style='text-align:left;' >Email </th>";
echo "<th  width='16%' style='text-align:left;' >Endereço </th>";
echo "<th  width='20%' style='text-align:left;' >Cidade </th>";
echo "<th  width='25%' style='text-align:left;' >Bairro </th>";
echo "<th  width='33%' style='text-align:left;'  >Número</th>";
echo "<th  width='50%' style='text-align:left;' >Contato </th>";
echo "<th  width='100%' style='text-align:left;' >Status </th>";


echo "</tr>";
echo"</thead>";
echo"<tbody  >";




while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
	echo "<tr   >";
	echo"<td style='align='center'>"; 
	echo $registro['nome_usuario'];
	echo"</td>";
	echo"<td style='align='center'>"; 
	echo $registro['email_usuario'];
	echo"</td>";
	echo"<td style='align='center'>"; 
	echo $registro['nome_endereco'];
	echo"</td>";

    $sql_cidade = " select * from cidades,bairros where id_bairro =".$registro['id_bairro']." and bairros.id_cidade= cidades.id_cidade";
    $resultado_id_enderecos = mysqli_query($link, $sql_cidade);
     $registroEnderecos=mysqli_fetch_array($resultado_id_enderecos);

	echo"<td style='align='center'>"; 
	echo $registroEnderecos['nome_cidade'];
	echo"</td>";

	echo"<td style='align='center'>"; 
	echo $registroEnderecos['nome_bairro'];
	echo"</td>";


	echo"<td style='text-align='center';>"; 
	echo $registro['num_casa_usuario'];
	echo"</td>";
    

	echo"<td style='text-align='center'>"; 
	echo $registro['contato_usuario'];
	echo"</td>";
	echo"<td style='text-align='center'>"; 
	 if ( $registro['status']=='A') {
	 echo "<select onchange='AlteraUsuario(this.value,".$registro['id_usuario'].");' class='form-control'  style='color:white;' >
               <option  style='color:black;' value='A' > Ativo  </option>    
                <option  style='color:black;' value='I' > Inativo  </option>                          
           </select>";
	 }else{
          echo "<select onchange='AlteraUsuario(this.value,".$registro['id_usuario'].");' class='form-control' style='color:white;'>
               <option style='color:black;'value='inativo' > Inativo  </option> 
                 <option style='color:black;' value='ativo' > Ativo  </option>                          
           </select>";
	 }
	echo"</td>";
	
	
	
	
	
	echo "</tr>";
}

echo"</tbody>";




?>

