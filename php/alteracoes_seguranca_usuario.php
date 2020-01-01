<?php 

session_start();

$senha = md5($_POST['senha']);
$nova_senha = md5($_POST['nova_senha']);
$repetir_nova_senha = md5($_POST['repetir_nova_senha']);

require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();
$sql_senha = " select senha_usuario from usuarios where usuarios.id_usuario =".$_SESSION['id_usuario'] ;
$resultado_senha_usuario = mysqli_query($link, $sql_senha); 
$seguranca_usuario= mysqli_fetch_array($resultado_senha_usuario);

 if ($senha==$seguranca_usuario['senha_usuario'] and $nova_senha==$repetir_nova_senha  ) {
          
          $sql_alteracao_senha = " update  usuarios
	      set senha_usuario ='$nova_senha'
	      where usuarios.id_usuario= ".$_SESSION['id_usuario'] ; 
          
           //executar a query
	        if(mysqli_query($link, $sql_alteracao_senha)){
		       echo "true";
	        } else {
		      echo "Erro ao Alterar senha do usuário!";

		     
	        }

}else{
         if ($nova_senha!=$repetir_nova_senha ) {
           echo "As senhas não coincidem.. <br>";
         }
         if ($senha!=$seguranca_usuario['senha_usuario']) {
            echo("Certifique-se de digitar a senha atual da conta");
         }
      }
?>