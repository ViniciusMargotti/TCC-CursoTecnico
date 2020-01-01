<?php 

require_once('db.class.php');

$id = $_POST['id_item'];


$sql = "SELECT * FROM produtos , categorias where id_produto= ".$id." and categorias.id_categoria = produtos.id_categoria" ;

$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
                  echo"<div class='modal-header'>
       <center> <h3>Editar Produto</h3></center> 
     </div>";
                   echo " <form >";
                   echo "<span style='color:black; font-weight:600;'>Nome:</span>";
                  echo " <input value='".$registro['nome_produto']."' id='nome-editar' class='form-control' type='text' placeholder='Nome'>";
                   echo "<span style='color:black;  font-weight:600;'>Descrição:</span>";
                   echo "<input value='".$registro['descricao_produto']."'  id='descricao-editar' class='form-control' type='text'  placeholder='Descrição'>";
                    echo "<span style='color:black;  font-weight:600;'>Preço:</span>";
                   echo "<input value='".$registro['preco_produto']."'  id='preco-editar' class='form-control' type='text' placeholder='Preço R$'>";
                    echo "<span style='color:black;  font-weight:600;'>Categoria:</span>";
                   echo "<select    id='categoria-editar' class='form-control'>";
                   echo "<option>".$registro['descricao_categoria']."</option>";
                     echo " </select>";
                      echo "<span style='color:black;  font-weight:600;'>Status:</span>";
                 echo "   <select id='status-editar' class='form-control'>";
                  if ($registro['status']=="Ativo") {
                     echo "<option>".$registro['status']."</option>";
                       echo "<option> Inativado </option>";
                  }else{
                      echo "<option>".$registro['status']."</option>";
                       echo "<option> Ativo </option>";
                  }
                   
                 echo " </select>";
                   
                 echo " </form>";
               

               echo"  <div class='modal-footer'>";
                    echo"   <div class='btn-group'>";
                     echo"      <button id='btn-cancelar-alteracao' class='btn btn-danger' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Cancelar</button>";
                       echo"    <button onclick='SalvaInformacoesProduto(". $registro['id_produto'].") ;'  class='btn btn-success'><span class='glyphicon glyphicon-check'></span> Salvar</button>";
                   echo"    </div>";


?>