<?php 

require_once('db.class.php');

$id = $_POST['id_cidade'];


$sql = "SELECT * FROM cidades  where id_cidade= ".$id;

$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
                  echo"<div class='modal-header'>
       <center> <h3>Editar Cidade</h3></center> 
     </div>";
                   echo " <form >";
                   echo "<span style='color:black; font-weight:600;'>Nome:</span>";
                  echo " <input value='".$registro['nome_cidade']."' id='nome-editar' class='form-control' type='text' placeholder='Nome'>";
                   echo "<span style='color:black;  font-weight:600;'>Uf:</span>";
                   echo "<input value='".$registro['uf']."'  id='descricao-editar' class='form-control' type='text'  placeholder='uf'>";
                   
                 echo " </form>";
               

               echo"  <div class='modal-footer'>";
                    echo"   <div class='btn-group'>";
                     echo"      <button id='btn-cancelar-alteracao' class='btn btn-danger' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Cancelar</button>";
                       echo"    <button onclick='SalvaInformacoesCidade(".$registro['id_cidade'].") ;'  class='btn btn-success'><span class='glyphicon glyphicon-check'></span> Salvar</button>";
                   echo"    </div>";


?>