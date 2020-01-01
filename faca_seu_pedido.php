<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: index.php?erro=1');
}
?>

<?php 

if ($_SESSION['status']<>'A') {
  header('Location: home.php?erro=1');
}


 ?>



<?php
$nome = $_SESSION['usuario'];
$email = $_SESSION['email'];
?>

<?php
require_once('php/db.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

$sql_cidade_usuario = "select cidades.nome_cidade, cidades.id_cidade, bairros.nome_bairro, bairros.id_bairro , bairros.taxa_entrega FROM `usuarios`, `cidades`, `bairros` WHERE usuarios.id_bairro= bairros.id_bairro and bairros.id_cidade=cidades.id_cidade and usuarios.id_usuario=" . $_SESSION['id_usuario'];
$resultado_cidade_usuario = mysqli_query($link, $sql_cidade_usuario);
$dados_cidade_usuario = mysqli_fetch_array($resultado_cidade_usuario);
?> 


<?php
$sql_cidades = " select * from cidades where cidades.id_cidade <>" . $dados_cidade_usuario['id_cidade'];
$resultado_id_cidades = mysqli_query($link, $sql_cidades);
?>

<?php
$sql_bordas = " select * from produtos where produtos.id_categoria= 6 and status='Ativo' order by nome_produto asc ";
$resultado_bordas = mysqli_query($link, $sql_bordas);
?>

<?php  

$sql_sistema = " select * from sistema where id_sistema=1";
$resultado_sistema = mysqli_query($link, $sql_sistema);
$registro_sistema= mysqli_fetch_array($resultado_sistema);

if ($registro_sistema['status_sys']<>'a') {
  header('Location: home.php?erro=1');
}

?>

<?php 

$sql_bairrocidade = " select cidades.status_cidade,bairros.status_bairro from cidades,usuarios,bairros where bairros.id_cidade = cidades.id_cidade 
and bairros.id_bairro = usuarios.id_bairro and usuarios.id_usuario=".$_SESSION['id_usuario'];
$resultado_bairrocidade  = mysqli_query($link, $sql_bairrocidade);
$registro_bairrocidade= mysqli_fetch_array($resultado_bairrocidade);

 if ( ($registro_bairrocidade['status_cidade']<>'ativo') or ($registro_bairrocidade['status_bairro']<>'ativo') ) {
  header('Location: home.php?erro=2');
 }

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
  <link href="bootstrap/fonts/icons.css" rel="stylesheet">   
  <script type="text/javascript" src="Script/home.js"></script>
  <script type="text/javascript" src="script/validacao_pedido.js"> </script>
  
</head>

<body class="body-pedido" >
  <!-- container -->
  <div class="container-fluid" id="informacoes-pedido">  
    <div class="row" style="height: 100%; ">
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
        <span style="float: right; color: white; "><h4><?php echo "Bem Vindo!! " . $_SESSION['usuario']?></h4></span>
        <!-- navbar -->
        <div class="collapse navbar-collapse" id="barra-navegacao">


          <ul class="nav navbar-nav navbar-left" style=" margin:3px;">

            <li><a href="home.php">Home</a></li>  
            <li><a id="btn-meus-pedidos" title="Adicionar Produto" data-toggle="modal" href="#modalpedidos" > Meus Pedidos</a></li>
            <!-- Button trigger modal -->
            
            <li> <a style="cursor: pointer;" data-toggle="modal" data-target="#modalconta" >Sua conta</a> </li>
            <li><a href="php/sair.php">Sair</a></li> </ul>

            
            
          </div>
          
        </div><!-- /container -->
      </nav><!-- /nav -->
      
      <div class=" col-md-5 col-sm-12 " id="barra-acoes" >
        <div class= "sidebar" ">
          <div class="list-group">

           <div  class="list-group-item list-group-item-total">
            Total Pedido: R$ <span id="total"> </span>
          </div>

          
          <button style=" text-align: center; " href="#" id="btn-pizza" class="list-group-item btn-opcoes "><span class="h2-opcoes">Pizzas</span></button>
          <button style=" text-align: center;  "  href="#" id="btn-lanche" class="list-group-item btn-opcoes"><span class="h2-opcoes">Lanches</span></button>
          <button   style="text-align: center; display: none;  " href="#" id="btn-adicional-pizzas" class="list-group-item">Adicionais</button>
          <button   style="text-align: center; display: none;  " href="#" id="btn-adicional-lanches" class="list-group-item">Adicionais</button>
          <button style="text-align: center;  "  href="#" id="btn-bebida" class="list-group-item btn-opcoes"><span class="h2-opcoes">Bebidas</span></button>
          <button  style=" text-align: center; " href="#" id="btn-produtos-carrinho" class="list-group-item btn-opcoes"><span class="h2-opcoes">Carrinho</span></button>
          
          <div  class="list-group-item list-group-item-total ">
            Total Produtos: R$  <input style=" width:60px; color: white;  background: rgba(0,0,0,0); border:none;font-size: 18px; " type="text" id="total_sabores" disabled="true" value="00.00">
          </div>

        </div> 


      </div>
      
      

      <div class="col-md-12" id="div-produtos-escolhidos"  >
       <div  id="produtos-escolhidos">
       </div>

       <div class="row">

         <center>
           <button  " disabled="true"  id="btn-adicionar-carrinho" class=" btn btn-green btn-carrinho"> Adicionar ao carrinho</button>

         </center> 

       </div>  



     </div>
   </div>

   <div class=" col-md-7 col-sm-12 " id="tela-pedido">
    <div id="escolha_tamanho" class="row" style="display: none; margin: 10px; text-align: left;">
      <center>
        <h4>Escolha o Tamanho</h4>
        <div class="col-md-3">   <input onchange="verificaSabores(this.value);" value="0.25" type="radio" id="r1" name="rr" />
          <label for="r1"><span></span>Gigante - até 4 sabores</label> </div>
          
          <div class="col-md-3">   <input onchange="verificaSabores(this.value);" value="0.3" type="radio" id="r2" name="rr" />
           <label for="r2"><span></span>Grande - até 3 sabores</label>
         </div>
         <div class="col-md-3"><input onchange="verificaSabores(this.value);" value="0.5" type="radio" id="r3" name="rr" /> 
          <label for="r3"><span></span>Média - até 2 sabores </label></div>
          <div class="col-md-3"><input onchange="verificaSabores(this.value);" value="1" type="radio" id="r4" name="rr" />
            <label for="r4"><span></span>Broto - até 1 sabor</label></div>
            
          </center>
          <div class="col-md-6">
           <span>Selecione a borda</span>
           <select style="width: auto;" class="form-control" id="select_borda" onchange="adicionaProdutoLista($(this).val(),6)" id="select-borda">
            <option value="0">Sem borda</option>
            <?php 

            while ($registro=mysqli_fetch_array($resultado_bordas)) {
             echo "<option value='".$registro['id_produto']."'>".$registro['nome_produto']."</option>";
           }


           ?>

         </select>


       </div>

       <div class="col-md-6">
         <span>Quantidade de Sabores</span>
         <select   class="form-control"   id="select-qtd">




         </select>
       </div>




     </div>
    
     <input id="InputPizzas" style="display: none;padding-left: 10px; margin-left: 10px;" type='text' onkeyUp="FiltroPizzas(this.value)"  alt="tabela_pizzas" class="form-control" placeholder="Buscar pizzas.." />

      
     <table style="display: none; "   id="tabela_pizzas" class=" table tabela_pizzas table-search   "  >
     </table>

     <input id="InputLanches" class="form-control" style="display: none;padding-left: 10px; margin-left: 10px;" type='text' onkeyUp="FiltroLanches(this.value)"  alt="tabela_lanches" placeholder="Buscar lanches.." />
     <table style="display: none; "   id="tabela_lanches" class=" table   "  >
     </table>


     <input id="InputBebidas" class="form-control" style="display: none;padding-left: 10px; margin-left: 10px;" type='text' onkeyUp="FiltroBebidas(this.value)"  alt="tabela_bebidas" placeholder="Buscar bebidas.." />
     <table  style="display: none; "  id="tabela_bebidas" class="table "  >
     </table>

     <table style="display: none;   "   id="tabela_adicionais_pizzas" class=" table "  >

     </table>

     <table style="display: none; "   id="tabela_adicionais_lanches" class=" table"  >
     </table>

     <div style="display: none; width: 100%;  " id="tabela_carrinho" class="table "  >

     </div>
     


     



   </div>

 </div>


</div> <!-- /container -->

<div id="modalpedidos"  class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
  <div  class="modal-dialog"  >
    <div  class="panel panel-primary"  >

      <div class="well" >
        <ul class="nav nav-tabs">
          <li class="active"><a href="#pedidos-pendentes" data-toggle="tab">Pendentes</a></li>
                <li><a href="#pedidos-andamento" data-toggle="tab">Em Andamento</a></li>
          <li><a href="#pedidos-finalizados" data-toggle="tab">Finalizados</a></li>
          <li><a style="display: none" id="btn-detalhes-pedido" href="#detalhes-pedidos" data-toggle="tab">Detalhes</a></li>
          <button type="button" class="btn btn-default close" data-dismiss="modal"> <span style="color: black; font-size: 20px;" aria-hidden="true">&times;</span></button>
        </ul>
        <div id="myTabContent" class="tab-content">

          <div class="tab-pane active in" id="pedidos-pendentes">


            <!-- Tabela com todos os pedidos Pendentes  -->
            <table style="display: block; overflow: auto; " id="tabela_meus_pedidos_pendentes" class=" table ">
            </table>


          </div>

           <div class="tab-pane fade" id="pedidos-andamento">

            <!-- Tabela com todos os pedidos Finalizados  -->
            <table style="display: block;  overflow: auto; "   id="tabela_meus_pedidos_andamento" class=" table ">
            </table>
          </div>

          <div class="tab-pane fade" id="pedidos-finalizados">

            <!-- Tabela com todos os pedidos Finalizados  -->
            <table style="display: block;  overflow: auto; "   id="tabela_meus_pedidos_finalizados" class=" table ">
            </table>
          </div>

          <div style="display: none;"  class="tab-pane fade" id="detalhes-pedidos">

            <!-- Tabela com todos os pedidos Finalizados  -->
            <table style="display: block; width: auto;  overflow: auto; "   id="tabela_detalhes_meus_pedidos" class=" table ">
            </table>
          </div>




        </div>

      </div>
    </div>
  </div>
</div>


<div id="modalconta" class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
  <div class="modal-dialog"  >
    <div class="panel panel-primary"  >

      <div class="well" >
        <ul class="nav nav-tabs">
          <li class="active"><a href="#informacoes" data-toggle="tab">Informações</a></li>
          <li><a href="#seguranca" data-toggle="tab">Segurança</a></li>
          <button type="button" class="btn btn-default close" data-dismiss="modal"> <span style="color: black; font-size: 20px;" aria-hidden="true">&times;</span></button>
        </ul>
        <div id="myTabContent" class="tab-content">

          <div class="tab-pane active in" id="informacoes">
            <form id="dados_usuario" method="post" action="php/alteracoes_usuario.php" id="formAlteracoes" >
              <h4>Dados do Usuário</h4>
              <?php
              $sql_usuario = "select * from usuarios where id_usuario =" . $_SESSION['id_usuario'];
              $resultado_id_usuario = mysqli_query($link, $sql_usuario);
              $dados_usuario = mysqli_fetch_array($resultado_id_usuario);
              ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Nome:</label>
                <input type="text" class="form-control"  id="usuario" name="usuario" placeholder="Usuário" required="requiored" maxlength="50"
                value= "<?php echo($dados_usuario['nome_usuario']) ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email:</label>
                <input type="email" class="form-control" id="email" disabled="false" name="email" placeholder="Email" required="requiored" maxlength="100" value="<?php echo($dados_usuario['email_usuario']) ?>">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">CPF:</label>
                <input type="text" class="form-control"  id="cpf" name="cpf" placeholder="CPF" required="requiored" onkeyup="somenteNumeros(this);" onkeypress=" mascara(this, '###.###.###.##')" maxlength="13" disabled="false" value= "<?php echo($dados_usuario['cpf_usuario']) ?>">
              </div>

              <div class="form-group">

                <select class="form-control" id="select_cidades">
                  <option value="<?php echo $dados_cidade_usuario['id_cidade'] ?>"><?php echo $dados_cidade_usuario['nome_cidade'] ?></option>


                  <?php while ($dados_cidade = mysqli_fetch_array($resultado_id_cidades)) { ?>
                    <option value="<?php echo $dados_cidade['id_cidade'] ?>"><?php echo $dados_cidade['nome_cidade'] ?></option>
                  <?php } ?>

                </select>


                <select class="form-control" name="select_bairros" id="select_bairros" style="margin-top: 5px;">
                  <option value="<?php echo $dados_cidade_usuario['id_bairro'] ?>"><?php echo $dados_cidade_usuario['nome_bairro'] ?>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Contato:</label>
                <input type="text" class="form-control"  id="contato" name="contato" placeholder="Contato" required="requiored" onkeyup="somenteNumeros(this);" onkeypress=" mascara(this, '#####.####')" maxlength="10" value= "<?php echo($dados_usuario['contato_usuario']) ?>">
              </div> 

              <div class="form-group">
                <label for="exampleInputPassword1">Nome do endereço:</label>
                <input type="text" class="form-control "  id="nomerua" name="nomeendereco" placeholder="Nome da rua:" required="requiored" maxlength="60" value= "<?php echo($dados_usuario['nome_endereco']) ?>">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Número da Casa:</label>
                <input onkeyup="somenteNumeros(this);" maxlength="4" type="text" class="form-control"  id="numerocasa" name="numerocasa" placeholder="Número:" required="requiored"  value= "<?php echo($dados_usuario['num_casa_usuario']) ?>">
              </div>


              <div class="form-group">
                <label for="exampleInputPassword1">Referência:</label>
                <input type="text" class="form-control"  id="referencia" name="referencia" placeholder="Referência:" required="requiored" maxlength="100" value= "<?php echo($dados_usuario['referencia_usuario']) ?>">
              </div>


              <button name="btn-alterar-usuario-pedido" id="btn-alterar-dados" style="width: 100%; margin-bottom: 10px;" class="btn btn-success">Salvar Alterações</button>
              <br>


            </form>
          </div>

          <div class="tab-pane fade" id="seguranca">

            <form id="seguranca_usuario" method="post" >
              <h4>Dados de Segurança</h4>
              <div class="form-group">
                <label for="exampleInputPassword1">Senha Antiga:</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored" maxlength="32">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nova senha:</label>
                <input type="password" class="form-control" id="nova_senha" name="nova_senha" placeholder="Nova senha" required="requiored" maxlength="32">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Repita a nova senha:</label>

                <input type="password" class="form-control" id="repetir_nova_senha" name="repetir_nova_senha" placeholder="Repita a nova senha" required="requiored" maxlength="32">
              </div>


              <button style="width: 100%;" name="btn-alterar-usuario-pedido" id="btn-alterar-senha"  type="submit" class="btn btn-success">Salvar Alterações</button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <h4>Deseja Finalizar seu pedido?</h4>

     </div>
     <div class="modal-body">
       <p>Certifique-se de:</p>
       <ul>
         <li>Revisar seus dados para entrega.</li>
         <li>Revisar os produtos no carrinho.</li>
         <li>Adicionar todas as observações.</li>
         <li>Escolher a forma de pagamento.</li>
         <li>Após a finalização não será possível adicionar ou excluir itens do pedido.</li>
         <li>O pedido não poderá ser cancelado pelo site.</li>
         <li>O pagamento será efetuado no ato da entrega.</li>
         <li>O taxa para entrega varia conforme o endereço do cliente.</li>
       </ul>

       <div class="custom-control custom-checkbox">
         <input type="checkbox" class="custom-control-input" onchange="ConfirmacaoTermos();" id="checkboxTermos">
         <label class="custom-control-label" for="customCheck1">Estou ciente e aceito os termos do pedido.</label>
       </div>
       <center>
        <span>Forma de Pagamento</span>
        <select disabled="true" style="width:50%;" id="select-pagamento" class="form-control">
         <option value="Dinheiro">Dinheiro</option>
         <option value="Cartão"> Cartão</option>
       </select>
     </center>

     <div style="float: right;">
      <span>Taxa entrega: R$ <?php echo  number_format($dados_cidade_usuario['taxa_entrega'],2); ?> </span>
    </div>



  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
    <button data-dismiss="modal" id="btn-finalizar-termos" disabled="true" type="button" onclick='FinalizaPedido();' class="btn btn-success">Finalizar Pedido</button>
  </div>
</div>
</div>
</div>






<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="Ajax/ajax.js"> </script> <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="bootstrap/js/bootbox.min.js" ></script>







</body>


</html>