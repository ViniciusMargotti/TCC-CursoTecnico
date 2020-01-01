<?php

session_start();

if(!isset($_SESSION['usuario'])){
  $url = "index.php";
  
}else{
  $url ="home.php";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sua Pizza Online</title>
  

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo.css" rel="stylesheet">
  <link href="css/estilo-quemsomos.css" rel="stylesheet">
  <script src="Jquery/Jquery.js"></script>
  <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">

      window.onload = function(){

       $('#div2').fadeIn(4000);
       $('#imgchamada').fadeIn(2000);
       $('#historia').fadeIn(2000);  
       $('#imghistoria').fadeIn(2000);  



     }

   </script>

 </head>

 <body>

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
    <div class="collapse navbar-collapse" id="barra-navegacao">
      <ul class="nav navbar-nav navbar-right" >
        <li><a href="<?php echo "$url"?>">Home</a></li>
        <li><a href="">Quem somos</a></li>

      </ul>
    </div>



  </nav><!-- /nav -->












  <section class="informacoes-quemsomos">

    <div class="container-fluid ">

      <div class="row ">
        <!-- informaçoes-->
        <div class="col-md-12" id="capa">

          <div class="col-md-6" id="historia" style="display: none;">
           <h3 > História</h3>
           <p>A Pizza Online foi idealizada a partir de seu fundador, um grande apreciador do prato mais consumido no mundo inteiro, que sempre sonhou em adequar todos os sabores que havia conhecido para criar a melhor pizza da cidade de Cricíuma</p>
           <p>
           Inaugurada em 2007, a Pizza Online  tem como missão propor, além do melhor sabor, um ambiente agradável, aconchegante e familiar, dispondo de muita qualidade na preparação das pizzas e no excelente atendimento.</p>
         </div>



         <div class="col-md-6" id="imghistoria" style="display: none;">
          <img src="imagens/pizza9.jpg" class="img-responsive img-historia"  ">
        </div>


      </div>
    </div >

    <div class="row ">
      <!-- informaçoes-->
      <div class="col-md-12" id="capa">

        <div class="col-md-6">
         <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8819.83237945585!2d-49.42563564055098!3d-28.68508702352637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x952181e2d391d045%3A0x5333d655f0ed7675!2zQ3JpY2nDum1hLCBTQw!5e0!3m2!1spt-BR!2sbr!4v1543188393659" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="col-md-6" id="div2" style="margin-top: 70px;display: none;">

         <h3>Venha nos conhecer, teremos grande prazer em recebê-lo!</h3>
         <br>
         <center><h4 >Telefone:(48) 3445-4523 </h4></center>

         <br>
         <center><h4 >Horário Atendimento:19h as 2h </h4></center>


         
       </div>

     </div>
   </div >

 </div>

</section> 


</div><!-- /container -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="Ajax/ajax.js"> </script> 

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>