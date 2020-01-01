<?php 

require_once('db.class.php');

$id = $_POST['id_bairro'];


$sql = "SELECT bairros.id_bairro,bairros.nome_bairro,bairros.taxa_entrega,bairros.id_cidade,cidades.nome_cidade FROM bairros,cidades where id_bairro= ".$id." and bairros.id_cidade = cidades.id_cidade";

$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
echo"<div class='modal-header'>
<center> <h3>Editar Bairro</h3></center> 
</div>";
echo " <form >";
echo "<span style='color:black; font-weight:600;'>Nome:</span>";
echo " <input value='".$registro['nome_bairro']."' id='nome-editar' class='form-control' type='text' placeholder='Nome'>";

$sql_cidade = "SELECT * FROM cidades where id_cidade <>" .$registro['id_cidade'];
$resultado_id_cidade = mysqli_query($link, $sql_cidade);
  echo "<select id='select_cidades_editar' class='form-control' >";
   echo "<option value=".$registro['id_cidade'].">".$registro['nome_cidade']."</option>";
 while ($registro_cidade = mysqli_fetch_array($resultado_id_cidade, MYSQLI_ASSOC)) {
   echo "<option value=".$registro_cidade['id_cidade'].">".$registro_cidade['nome_cidade']."</option>";
 }
 echo "</select>";

echo "<span style='color:black;  font-weight:600;'>Taxa de Entrega:</span>";
echo "<input value='".$registro['taxa_entrega']."'  id='taxa-editar' class='form-control' type='text'  placeholder='taxa de entrega'>";

echo " </form>";



               echo"  <div class='modal-footer'>";
                    echo"   <div class='btn-group'>";
                     echo"      <button id='btn-cancelar-alteracao' class='btn btn-danger' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Cancelar</button>";
                       echo"    <button onclick='SalvaInformacoesBairro(".$registro['id_bairro'].") ;'  class='btn btn-success'><span class='glyphicon glyphicon-check'></span> Salvar</button>";
                   echo"    </div>";


?>