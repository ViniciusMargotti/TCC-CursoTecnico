	
  <?php
  //LOGIN DO CLIENTE

  session_start();

  require_once('db.class.php');

  $email_usuario = $_POST['campo_email'];
  $senha_usuario = md5($_POST['senha_usuario']);

  $sql = " SELECT id_usuario, nome_usuario, email_usuario, cpf_usuario, num_casa_usuario,referencia_usuario,nome_endereco, contato_usuario,status FROM usuarios WHERE email_usuario = '$email_usuario' AND senha_usuario = '$senha_usuario' ";
  
  $objDb = new db();
  $link = $objDb->conecta_mysql();

  if (isset($_POST['campo_email'])) 
  {

    $resultado_id = mysqli_query($link, $sql) or die ("Erro ao selecionar");
               
  if (mysqli_num_rows($resultado_id)<=0)
    {
    
   header('Location: ../index.php?erro=1');
    die();
  }
     else
    {
     $dados_usuario = mysqli_fetch_array($resultado_id);
     $_SESSION['id_usuario'] = $dados_usuario['id_usuario'];
     $_SESSION['usuario'] = $dados_usuario['nome_usuario'];
     $_SESSION['email'] = $dados_usuario['email_usuario'];
     $_SESSION['status'] = $dados_usuario['status'];

     if ($dados_usuario['email_usuario'] == "admin@admin") {
       header('Location: ../central.php');
       die();
     }
     
    header('Location: ../home.php');
    //direciona para página da Intranet (menu)
     
     }
}

?>