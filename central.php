<?php 
require_once('php/db.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();
$sql_sistema = " select * from sistema where id_sistema=1";
$resultado_sistema = mysqli_query($link, $sql_sistema);
$registro_sistema= mysqli_fetch_array($resultado_sistema); 


$sql_cidades = " select * from cidades";
$resultado_cidades = mysqli_query($link, $sql_cidades);

?>

<!DOCTYPE html>
<html>
<head>
  <title> Central</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="imagens/icone.png" type="image/x-icon" />
  <script src="Jquery/Jquery.js"></script>

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilo-central.css" rel="stylesheet">
  <link href="bootstrap/css/bootbox.min.js">
  <link href="bootstrap/fonts/icons.css" rel="stylesheet">  
  <script type="text/javascript" src="Chart/Chart.min.js" ></script>
  <script type="text/javascript" src="Script/central.js" ></script>


</head>

<body >

  <div class="container-fluid" >
    <div class="row" style="height: 100%;" >
      <!-- Side navigation -->
      <div class="col-md-2 col-sm-12 col-xs-12 sidenav"  >

       <a class="glyphicon glyphicon-dashboard" href="central.php"> CENTRAL</a> <br>
       <a href="faca_seu_pedido.php">Novo Pedido</a>
       <a  href="#" id="btn-pedidos-pendentes"> <span>Pedidos Pendentes</span></a>
       <a href="#"   id="btn-pedidos-andamento" >Pedidos em Andamento</a>
       <a href="#"  id="btn-pedidos-finalizados">Pedidos Finalizados</a>
       <a href="#"  id="btn-pedidos-arquivados">Pedidos Arquivados</a>
       <a href="#" id="btn-graficos">Gráficos e Estatisticas</a>
       <a href="#" id="btn-enderecos-entrega">Endereços de Entrega</a>
       <a href="#" id="btn-usuarios">Clientes</a>
       <a href="#" id="btn-produtos">Produtos</a>
       <a href="php/sair.php">Sair</a>


       <div class="alert alert-warning" id="alertapedidos" style="font-size: 12px; display: none;">
        Alterado com Sucesso!!!
      </div>



    </div>

    <!-- Page content -->

    <div class="main  " class="col-md-9 col-sm-12 col-xs-12 ">

      <div id="div-produtos" class="col-md-12" style="display: none; ">

        <button style="width: 100%;" type="button"   title="Adicionar Produto" data-toggle="modal" href="#myModal" class="btn btn-primary "> <i class="material-icons">add_shopping_cart</i></button>
        <!-- Tabela com todos os Produtos  -->

        

        <div style="display: none; padding: 5px; overflow-x: hidden;  "  id="tabela_produtos" >



          <div class="container">

            <div class="row">
              <div class="col-md-12 ">
                <nav>
                  <ul class="nav nav-tabs" >
                    <li role="presentation" class="tabs-produtos"   > <a  role="tab" data-toggle="tab"  id="nav-pizzas-tab" >Pizzas</a></li>
                    <li role="presentation" class="tabs-produtos" ><a  role="tab" data-toggle="tab"  id="nav-lanches-tab" >Lanches</a></li>
                    <li role="presentation" class="tabs-produtos" ><a  role="tab" data-toggle="tab"  id="nav-bebidas-tab" >Bebidas</a></li>
                    <li role="presentation" class="tabs-produtos" ><a  role="tab" data-toggle="tab"  id="nav-adicionaispizzas-tab" >Adicionais Pizzas</a></li>
                    <li role="presentation" class="tabs-produtos" ><a  role="tab" data-toggle="tab" id="nav-adicionaislanches-tab" >Adicionais Lanches</a></li>
                    <li role="presentation" class="tabs-produtos" ><a  role="tab" data-toggle="tab" id="nav-bordas-tab" >Bordas</a></li>
                    <li>
                      <input id="input-pizzas" type='text' style="display: none; margin: 5px;width:500px;" onkeyUp="BuscaPizzas(1,this.value)" class="input-pesquisa"  placeholder="Buscar pizzas.." />
                      
                      <input id="input-lanches" style="display: none; margin: 5px;width:500px;" type='text' onkeyUp="BuscaLanches(2,this.value)"   placeholder="Buscar Lanches.." />

                      <input id="input-bebidas" style="display: none; margin: 5px;width:500px;" type='text' onkeyUp="BuscaBebidas(3,this.value)"   placeholder="Buscar Bebidas.." />

                      <input id="input-adicionais-pizzas" style="display: none; margin: 5px;width:500px;" type='text' onkeyUp="BuscaAdicionaisPizzas(4,this.value)"   placeholder="Buscar adicionais de pizzas.." />

                      <input id="input-adicionais-lanches" style="display: none; margin: 5px;width:500px;" type='text' onkeyUp="BuscaAdicionaisLanches(5,this.value)"  placeholder="Buscar adicionais de lanches.." />

                      <input id="input-bordas" style="display: none; margin: 5px; width:500px; " type='text' onkeyUp="BuscaBordas(6,this.value)"   placeholder="Buscar Bordas.." /></li>
                    </ul >
                  </nav>

                  <div style="margin-top: 20px;" id="nav-tabContent">


                    <div style="display: none; width: 90%; "   id="nav-pizzas" > 
                     pizzas
                   </div>
                   <div style="display: none; width: 90%; "  id="nav-lanches">
                     lanches
                   </div>
                   <div style="display: none;width: 90%; "  id="nav-bebidas" >
                     bebidas
                   </div>
                   <div style="display: none;width: 90%; "  id="nav-adicionais-pizzas" >
                    adicionais pizzas
                  </div>
                  <div style="display: none;width: 90%; "  id="nav-adicionais-lanches" >
                    adicionais lanches
                  </div>


                  <div style="display: none;width: 90%; "  class="table" id="nav-bordas" >
                    bordas
                  </div>
                </div>
              </div>
              
              
            </div>
          </div>
        </div>



        



      </div>

      <div id="div-produtos" class="col-md-12" style="display: none; ">

        <button style="width: 100%;" type="button"   title="Adicionar Produto" data-toggle="modal" href="#myModal" class="btn btn-primary "> <i class="material-icons">add_shopping_cart</i></button>
        <!-- Tabela com todos os Produtos  -->

        

        <div style="display: none; padding: 5px; overflow-x: hidden;  "  id="tabela_produtos" >



          <div class="container">

            <div class="row">
              <div class="col-md-12 ">
                <nav>
                  <ul class="nav nav-tabs" >
                    <li role="presentation" class="tabs-produtos"   > <a  role="tab" data-toggle="tab"  id="nav-pizzas-tab" >Pizzas</a></li>
                    <li role="presentation" class="tabs-produtos" ><a  role="tab" data-toggle="tab"  id="nav-lanches-tab" >Lanches</a></li>
                    <li role="presentation" class="tabs-produtos" ><a  role="tab" data-toggle="tab"  id="nav-bebidas-tab" >Bebidas</a></li>
                    <li role="presentation" class="tabs-produtos" ><a  role="tab" data-toggle="tab"  id="nav-adicionaispizzas-tab" >Adicionais Pizzas</a></li>
                    <li role="presentation" class="tabs-produtos" ><a  role="tab" data-toggle="tab" id="nav-adicionaislanches-tab" >Adicionais Lanches</a></li>
                    <li role="presentation" class="tabs-produtos" ><a  role="tab" data-toggle="tab" id="nav-bordas-tab" >Bordas</a></li>
                    <li>
                      <input id="input-pizzas" type='text' style="display: none; margin: 5px;width:500px;" onkeyUp="BuscaPizzas(1,this.value)" class="input-pesquisa"  placeholder="Buscar pizzas.." />
                      
                      <input id="input-lanches" style="display: none; margin: 5px;width:500px;" type='text' onkeyUp="BuscaLanches(2,this.value)"   placeholder="Buscar Lanches.." />

                      <input id="input-bebidas" style="display: none; margin: 5px;width:500px;" type='text' onkeyUp="BuscaBebidas(3,this.value)"   placeholder="Buscar Bebidas.." />

                      <input id="input-adicionais-pizzas" style="display: none; margin: 5px;width:500px;" type='text' onkeyUp="BuscaAdicionaisPizzas(4,this.value)"   placeholder="Buscar adicionais de pizzas.." />

                      <input id="input-adicionais-lanches" style="display: none; margin: 5px;width:500px;" type='text' onkeyUp="BuscaAdicionaisLanches(5,this.value)"  placeholder="Buscar adicionais de lanches.." />

                      <input id="input-bordas" style="display: none; margin: 5px; width:500px; " type='text' onkeyUp="BuscaBordas(6,this.value)"   placeholder="Buscar Bordas.." /></li>
                    </ul >
                  </nav>

                  <div style="margin-top: 20px;" id="nav-tabContent">


                    <div style="display: none; width: 90%; "   id="nav-pizzas" > 
                     pizzas
                   </div>
                   <div style="display: none; width: 90%; "  id="nav-lanches">
                     lanches
                   </div>
                   <div style="display: none;width: 90%; "  id="nav-bebidas" >
                     bebidas
                   </div>
                   <div style="display: none;width: 90%; "  id="nav-adicionais-pizzas" >
                    adicionais pizzas
                  </div>
                  <div style="display: none;width: 90%; "  id="nav-adicionais-lanches" >
                    adicionais lanches
                  </div>


                  <div style="display: none;width: 90%; "  class="table" id="nav-bordas" >
                    bordas
                  </div>
                </div>
              </div>
              
              
            </div>
          </div>
        </div>



        



      </div>


      <div id="div-enderecos-entrega" class="col-md-12" style="display: none;">
        <div class="col-md-6">
          <button style="width: 100%;" type="button"   title="Adicionar Bairro" data-toggle="modal" href="#myModalCidade" class="btn btn-primary ">Adicionar Cidade</button>
        </div>
        <div class="col-md-6">
         <button style="width: 100%;" type="button"   title="Adicionar Bairro" data-toggle="modal" href="#myModalBairro" class="btn btn-primary ">Adicionar Bairro</button>
       </div>
       <div id="div-enderecos-cidades" style="height: 90%;overflow: auto;" class="col-md-6">

        <table style="display: none; padding: 5px; overflow: auto; "   id="tabela_cidades" class=" table" >
        </table>


      </div>

      <div id="div-enderecos-bairros" style="height: 90%;overflow: auto;" class="col-md-6">

       <table style="display: none; padding: 5px; overflow: auto; "   id="tabela_bairros" class=" table" >
       </table>

     </div>



   </div>

   <div id="div-clientes" class="col-md-12" style="display: none;">

     <div class="col-md-12">
   <div class="col-md-4">
       <input id="input-clientes" type='text' style="display: block;width:100%;margin-bottom: 5px;" onkeyUp="BuscaUsuarios(this.value)" class="input-pesquisa"  placeholder="Buscar clientes.." />
       
    </div>

    <div class="col-md-4">
       <select  id="select_cidades_clientes" class="form-control">
           <option value="">Todas Cidades</option>
        <?php while ($registro_cidades=mysqli_fetch_array($resultado_cidades)) {
          echo "<option value='".$registro_cidades['id_cidade']."'>".$registro_cidades['nome_cidade']."</option>";
        } ?>
      </select>
       
    </div>

     <div class="col-md-4">
      
       <select   id="select_bairros_clientes" class="form-control">
        <option value="">Todos Bairros</option>
      </select>
       
    </div>
  </div>



  <table style="display: none; padding: 5px; overflow: auto; "   id="tabela_clientes" class=" table" >
  </table>

</div>



<div id="div-pedidos" class="col-md-12" style="display: none; ">


  <div class="col-md-12" style="margin-bottom:15px; padding: 10px; background:rgba(10, 10, 30, 0.1);; border-radius: 10px; ">

    <div class="col-md-3 blocosg">
      <center>
        <?php if ($registro_sistema['status_sys']=='a') {

         echo " <label style='margin-top:16px;margin-bottom:16px;' class='switch'>

         <input  onchange=\"AlteraSistema('status');\"   checked='checked' type='checkbox'>
         <span class='slider round '></span>
         </label> <br>
         <span>Abrir para Pedidos</span>";
       }else{
         echo " <label style='margin-top:16px;margin-bottom:16px;'class='switch'>

         <input   onchange=\"AlteraSistema('status');\" type='checkbox'>
         <span class='slider round'></span>
         </label> <br>
         <span>Abrir para Pedidos</span>";

       } ?>
     </center>
   </div>
   <div class="col-md-3 blocosg"  >
    <center>
      <span>Horário de Abertura</span>

      <?php
      echo "<input id='hora_abertura' value=".$registro_sistema['hora_abertura']." type='time' style='color:white;width:auto'>";
      ?>
    </center>
    <input type="button" style="margin-top: 25px;"  title="O horário será mostrado ao cliente que entrar no site quando o estabelecimento não estiver recebendo pedidos." onclick="AlteraSistema(document.getElementById('hora_abertura').value)" class="btn btn-blue btn-block" value="Salvar" >

  </div>

  <div class="col-md-3 blocosg">
    <h4>Lucro Atual</h4>
    <?php
    echo "<input disabled='true' id='lucro_hoje' type='text' style='color:white;font-size:20px;width:auto; text-align:right;'>";
    ?>
    <?php
    echo date("d/m/Y");   ;
    ?>

  </div>

  <div class="col-md-3 blocosg">
    <h4>Quantidade Pedidos</h4>
    <?php
    echo "<input disabled='true' id='pedidos_hoje' type='text' style='color:white;font-size:20px;width:auto; text-align:right;'>";
    ?>
    <?php
    echo date("d/m/Y");   ;
    ?>

  </div>


</div>





<div style="display:none; " id="tabela_pedidos_pendentes" >
 <h3 style="color: orange;">Pedidos Pendentes</h3>
 <input style="color:white" class="form-control"  id="input-pedidos-pendentes"  type='text'  placeholder="Digite o código do pedido.." />
 <!-- Tabela com todos os pedidos Pendentes  -->
 <table style="display: block;  overflow: auto; height: 400px;  " id="pedidos-pendentes"   class=" table ">
 </table>

</div>

<div id="tabela_pedidos_andamento" style="display:none ">
  <h3 style="color: brown;">Pedidos em Andamento</h3>
  <input style="color:white" class="form-control"   id="input-pedidos-andamento"  type='text'  placeholder="Digite o código do pedido.." />
  <table style="display: block;  overflow: auto; height: 400px; "   id="pedidos-andamento" class=" table ">
  </table>
</div>

<div id="tabela_pedidos_finalizados" style="display:none ">
  <h3 style="color: green;">Pedidos Finalizados</h3>
  <input style="color:white" class="form-control"   id="input-pedidos-finalizados"  type='text'  placeholder="Digite o código do pedido.." />
  <table style="display: block;  overflow: auto; height: 400px; "   id="pedidos-finalizados" class=" table ">
  </table>
</div>
<div id="tabela_pedidos_arquivados" style="display:none ">
  <h3 style="color: white;">Pedidos Arquivados</h3>
  <div>
   <input  type="date" id="input-date-arquivados" value="<?php echo date('d/m/Y');?>" style="width: auto;float: right;">

   <input id="input-pedidos-arquivados"  type='text' style="margin-bottom: 10px;"  placeholder="Digite o código do pedido.." />

   <table style="display: block;  overflow: auto; height: 400px; "  id="pedidos-arquivados" class=" table ">
   </table>
 </div>
</div>










</div>

<div id="div-informacoes-pedidos" class="col-md-12" style="display: none; ">



 <div id="div-graficos"  style="display: none;">

  <div class="col-md-4 blocosg">
    <h4>Top Pizzas</h4>
    <canvas  width="1200" height="1000"  id="GraficoPizzas"></canvas>
   
  </div>

  <div class="col-md-4 blocosg">
    <h4>Top Bebidas</h4>
    <canvas  width="1200" height="1000"  id="GraficoBebidas"></canvas>
  </div>

  <div class="col-md-4 blocosg">
    <h4>Top Lanches</h4>
    <canvas  width="1200" height="1000" id="GraficoLanches"></canvas>
  </div>




  <div class="col-md-6 blocosg">
   <h4>Quantidade Pedidos</h4>
   <canvas width="1200" height="700" id="GraficoPedidos"></canvas>
  
 </div>
 <div class="col-md-6 blocosg">
   <h4>Lucro Mensal</h4>
   <canvas  width="1200" height="700" id="GraficoLucro"></canvas>
 </div>

 <div class="col-md-12 blocosg ">
   <h4>Top 10 Clientes</h4>
   <canvas width="1200" height="400" id="GraficoClientes"></canvas>

 </div>

  <div class="col-md-6 blocosg ">
   <h4>Top 5 Bairros</h4>
   <canvas width="1200" height="600" id="GraficoBairros"></canvas>
  </div>

  <div class="col-md-6 blocosg ">
   <h4>Top 5 Cidades</h4>
   <canvas width="1200" height="600" id="GraficoCidades"></canvas>
  </div>


</div>



<div style="background:#212020;">
 <!-- Tabela com todos os detalhes do pedido -->
 <div style="display: none;  overflow: auto; "   id="tabela_detalhes_pedidos" class=" table ">
 </div>



</div>
</div>

</div>
</div>
<!-- Modal de Cadastro  -->
<div id="myModal" class="modal fade in">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <center> <h3>Cadastrar Produtos</h3></center> 
     </div>
     <div class="modal-body">

      <form >
       <input id="nome-cadastro" required="true" class="form-control" type="text" placeholder="Nome">
       <input id="descricao-cadastro" required="true" class="form-control" type="text"  placeholder="Descrição">
       <input id="preco-cadastro" required="true" class="form-control" type="text" placeholder="Preço R$">
       <span style="color:gray;text-align: left;">Categoria</span>
       <select id="categoria-cadastro" required="true" class="form-control">
         <option>Pizza</option>   
         <option>Lanche</option>  
         <option>Bebida</option>  
         <option>Adicional Pizza</option>  
         <option>Adicional Lanche</option> 
         <option>Adicional Lanche/Pizza</option>  
         <option>Borda</option>  

       </select>
     </form>
     
   </div>

   <div class="modal-footer">
    <div class="btn-group">
      <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
      <button id="btn-cadastro-produto" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Cadastrar</button>
    </div>
  </div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dalog -->
</div><!-- /.modal -->

<!-- Modal de Edição  -->
<div id="myModalEdit" class="modal fade in">
  <div class="modal-dialog">
    <div class="modal-content">

     
     <div id="modal-body-edit" class="modal-body">

     </div>


   </div>

 </div><!-- /.modal-content -->
</div><!-- /.modal-dalog -->

<!-- Modal de Endereços  -->
<div id="myModalBairro" class="modal fade in">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <center> <h3>Novo Bairro</h3></center> 
     </div>
     <div id="modal-body-endereco" class="modal-body">
      <input id="nome_bairro" type="text" class="form-control" placeholder="Nome Bairro:" required="true"> 
      <input id="taxa_bairro"  type="text" class="form-control" placeholder="Taxa Entrega:" required="true"> 
      <span style="color: black;">Cidade:</span>
      <select id="select_cidades" class="form-control">

        <?php while ($registro_cidades=mysqli_fetch_array($resultado_cidades)) {
          echo "<option value='".$registro_cidades['id_cidade']."'>".$registro_cidades['nome_cidade']."</option>";
        } ?>

      </select>



    </div>

    <div class="modal-footer">
      <div class="btn-group">
        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        <button id="btn-cadastro-bairro" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Cadastrar</button>
      </div>
    </div>

  </div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dalog -->

<!-- Modal de Endereços  -->
<div id="myModalCidade" class="modal fade in">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <center> <h3>Nova Cidade</h3></center> 
     </div>
     <div id="modal-body-endereco" class="modal-body">
      <input id="nome_cidade" type="text" class="form-control" placeholder="Nome Cidade:" required="true"> 

      <span style="color: black;">Estado:</span>
      <select id="select_estados" class="form-control">

        <option value="AC">Acre</option>
        <option value="AL">Alagoas</option>
        <option value="AP">Amapá</option>
        <option value="AM">Amazonas</option>
        <option value="BA">Bahia</option>
        <option value="CE">Ceará</option>
        <option value="DF">Distrito Federal</option>
        <option value="ES">Espírito Santo</option>
        <option value="GO">Goiás</option>
        <option value="MA">Maranhão</option>
        <option value="MT">Mato Grosso</option>
        <option value="MS">Mato Grosso do Sul</option>
        <option value="MG">Minas Gerais</option>
        <option value="PA">Pará</option>
        <option value="PB">Paraíba</option>
        <option value="PR">Paraná</option>
        <option value="PE">Pernambuco</option>
        <option value="PI">Piauí</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="RN">Rio Grande do Norte</option>
        <option value="RS">Rio Grande do Sul</option>
        <option value="RO">Rondônia</option>
        <option value="RR">Roraima</option>
        <option value="SC">Santa Catarina</option>
        <option value="SP">São Paulo</option>
        <option value="SE">Sergipe</option>
        <option value="TO">Tocantins</option>

      </select>



    </div>

    <div class="modal-footer">
      <div class="btn-group">
        <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        <button id="btn-cadastro-cidade" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Cadastrar</button>
      </div>
    </div>

  </div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dalog -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="Ajax/ajax.js"> </script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="bootstrap/js/bootbox.min.js" ></script>


</body>




</html>

<?php 

require_once('php/graficos.php');

?>
