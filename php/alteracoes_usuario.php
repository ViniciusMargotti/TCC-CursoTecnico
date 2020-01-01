
<?php
session_start();

require_once('db.class.php');

$nome_usuario = $_POST['usuario'];
$num_casa_usuario = ($_POST['numerocasa']);
$nome_endereco = $_POST['nomeendereco'];
$referencia_usuario = $_POST['referencia'];
$id_bairro = $_POST['select_bairros'];
$contato_usuario = $_POST['contato'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$usuario_existe = false;
$email_existe = false;

      $sql = " update  usuarios
	  set nome_usuario ='$nome_usuario',
	      num_casa_usuario='$num_casa_usuario',           
	      referencia_usuario='$referencia_usuario',
	      id_bairro='$id_bairro',
          nome_endereco='$nome_endereco',
          contato_usuario='$contato_usuario'
          where usuarios.id_usuario= ".$_SESSION['id_usuario'] ; 

//executar a query
if(mysqli_query($link, $sql)){
        echo "Salvo com Sucesso";
} else {
		echo 'Erro ao registrar o usuário!';
	}
?>