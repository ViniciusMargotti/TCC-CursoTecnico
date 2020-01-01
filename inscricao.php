<?php
require_once('php/db.class.php');

$sql = " select * from cidades where status_cidade= 'ativo' order by nome_cidade asc ";
$objDb = new db();
$link = $objDb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);
?>


<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>

<?php

$erro_email   = isset($_GET['erro_email'])  ? $_GET['erro_email'] : 0;
$erro_cpf   = isset($_GET['erro_cpf'])  ? $_GET['erro_cpf'] : 0;


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
  <title>Sua Pizza Online</title>

  <script src="Jquery/Jquery.js"></script>
  
  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css" rel="stylesheet">
  
  <script type="text/javascript">
    function somenteNumeros(num) {
      var er = /[^0-9.]/;
      er.lastIndex = 0;
      var campo = num;
      if (er.test(campo.value)) {
        campo.value = "";
      }
    }

    function mascara(t, mask)
    {
      var i = t.value.length;
      var saida = mask.substring(1,0);
      var texto = mask.substring(i)
      if (texto.substring(0,1) != saida)
      {
       t.value += texto.substring(0,1);
     }
   }
   $(document).ready( function(){

        //verificar se os campos de Inscricao  foram devidamente preenchidos
        $('#btn-inscricao').click(function(){

          var campo_vazio = false;

          if($('#select_cidades').val() == '0'){
            $('#select_cidades').css({'border-color': '#A94442'});
            campo_vazio = true;
          } else {
            $('#select_cidades').css({'border-color': '#CCC'});
          }

          if($('#select_bairros').val() == '0'){
            $('#select_bairros').css({'border-color': '#A94442'});
            campo_vazio = true;
          } else {
            $('#select_bairros').css({'border-color': '#CCC'});

          }

          if(campo_vazio) return false;
        });
      });
   
   
       //verificar bairros conforme cidade selecionada
       $(document).ready( function(){

        $('#select_cidades').change(function(){

          var e = document.getElementById("select_cidades");
          var itemSelecionado = e.options[e.selectedIndex].value;

          //chamada da controller e passando o ID estado via GET
          $.get('php/consulta_bairros.php?search=' +itemSelecionado, function (data) {
    //procurando a tag OPTION com id do bairro e removendo 
    $('#select_bairros').find("option").remove();
      //motando a combo do bairro
      $('#select_bairros').append(data);
      
    });
          

        });
      });    
         //---------------------Fim------------

         

         
       </script>

     </head>

     <body class="body-inscricao" >

      <nav class="navbar navbar-fixed-top navbar-inverse navbar-transparente">
        <div class="container">
          
          <!-- header -->
          <div class="navbar-header">
           <!-- botao toggle -->
           <button type="button" class="navbar-toggle collapsed"
           data-toggle="collapse" data-target="#barra-navegacao">
           <span class="sr-only">alternar navegação</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>

         </button>
       </div>
       
       <!-- navbar -->
       <div class="collapse navbar-collapse" id="barra-navegacao" >
        <ul class="nav navbar-nav navbar-right"  margin:3px;">
          <li><a href="index.php">Home</a></li>
          <li><a href="quemsomos.php">Quem somos</a></li>
        </ul>
      </div>
    </div><!-- /container -->
  </nav><!-- /nav -->


  


  <section   >


   
   <div class="container capa-inscricao"  >
    
    <div class="row ">
     <center> <h3>Inscreva-se</h3></center>
     <form method="post" action="php/registra_usuario.php" autocomplete="off" id="formCadastrarse" >
      <div class="form-group">
        <label for="exampleInputEmail1">Nome:</label>
        <input type="text" class="form-control"  id="usuario" name="usuario" placeholder="Usuário" required="requiored" maxlength="50">
        
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">CPF:</label>
        <input type="text" class="form-control" maxlength="14"  id="cpf" name="cpf" placeholder="CPF" required="requiored" onkeyup="somenteNumeros(this);" onkeypress=" mascara(this, '###.###.###.##')"  >
        <?php
        if($erro_cpf){
         echo '<font style="color:#FF0000">CPF Invalido</font>';
         
       }
       ?>

     </div>

     <div class="form-group">
      <label for="exampleInputPassword1">Contato:</label>
      <input type="text" class="form-control" autocomplete="off" id="contato" name="contato" placeholder="Contato" required="requiored" onkeyup="somenteNumeros(this);" onkeypress=" mascara(this, '#####.####')"  maxlength="10">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Email:</label>
      <input type="email" class="form-control" autocomplete="off" id="email" name="email" placeholder="Email" required="requiored" maxlength="100">
      <?php
      if($erro_email){
       echo '<font style="color:#FF0000">E-mail já existe</font>';
       
     }
     ?>
   </div>

   <div class="form-group">
     
    <select id="select_cidades" class="form-control">
      <option value="0">Selecione uma Cidade</option>
      <
      <?php while($dados_cidade = mysqli_fetch_array($resultado_id)) { ?>
        <option value="<?php echo $dados_cidade['id_cidade'] ?>"><?php echo $dados_cidade['nome_cidade'] ?></option>
      <?php } ?>
      
    </select>

    
    <select class="form-control" name="select_bairros" id="select_bairros" style="margin-top: 5px;">
      <option value="0">Selecione um Bairro</option>
    </select>
  </div>

  
  
  <div class="form-group">
    <label for="exampleInputPassword1">Nome do endereço:</label>
    <input type="text" class="form-control " autocomplete="off" id="nomerua" name="nomeendereco" placeholder="Nome da rua:" required="requiored" maxlength="60">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Número da Casa:</label>
    <input type="text" class="form-control" onkeyup="somenteNumeros(this);" autocomplete="off" id="numerocasa" name="numerocasa" placeholder="Número:" maxlength="4" required="requiored">
  </div>
  

  <div class="form-group">
    <label for="exampleInputPassword1">Referência: (Opcional)</label>
    <input type="text" class="form-control" autocomplete="off"  id="referencia" name="referencia" placeholder="Referência:" maxlength="100">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Senha:</label>
    <input type="password" class="form-control" autocomplete="off" id="senha" name="senha" placeholder="Senha" required="requiored" maxlength="32">
  </div>
  
  <button style="width: 100%;" id="btn-inscricao" type="submit" class="btn btn-primary">Inscrever-se</button>
</form>

</div >
</div>

</section> 


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="Ajax/ajax.js"> </script> 

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>