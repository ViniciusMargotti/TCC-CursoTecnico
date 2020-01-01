<?php

require_once('db.class.php');

if (isset($_GET['search'])) {

       $cod_cidades = $_GET['search'];
     
       $sql = " select * from bairros where id_cidade= ".$cod_cidades." and status_bairro = 'ativo' order by nome_bairro asc ";

       $objDb = new db();
       $link = $objDb->conecta_mysql();
       $resultado_id = mysqli_query($link, $sql);

    while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
         echo "<option value='" . $registro['id_bairro'] . "' >" . $registro['nome_bairro'] . "</option>";
	}
}     
               
               
?>

